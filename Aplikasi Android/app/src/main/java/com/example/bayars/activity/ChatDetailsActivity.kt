package com.example.bayars.activity

import android.content.Context
import android.content.Intent
import android.os.Bundle
import android.support.v4.app.ActivityCompat
import android.support.v4.app.ActivityOptionsCompat
import android.support.v4.view.ViewCompat
import android.support.v7.app.ActionBar
import android.support.v7.app.AppCompatActivity
import android.support.v7.widget.Toolbar
import android.text.Editable
import android.text.TextWatcher
import android.util.Log
import android.view.MenuItem
import android.view.View
import android.view.inputmethod.InputMethodManager
import android.widget.Button
import android.widget.EditText
import android.widget.ListView
import com.example.bayars.R
import com.example.bayars.adapter.ChatDetailListAdapter
import com.example.bayars.data.ParseFirebaseData
import com.example.bayars.data.SettingApi
import com.example.bayars.model.ChatMessage
import com.example.bayars.model.Friend
import com.example.bayars.utilities.Const
import com.example.bayars.utilities.Const.Companion.NODE_IS_READ
import com.example.bayars.utilities.Const.Companion.NODE_RECEIVER_ID
import com.example.bayars.utilities.Const.Companion.NODE_RECEIVER_NAME
import com.example.bayars.utilities.Const.Companion.NODE_RECEIVER_PHOTO
import com.example.bayars.utilities.Const.Companion.NODE_SENDER_ID
import com.example.bayars.utilities.Const.Companion.NODE_SENDER_NAME
import com.example.bayars.utilities.Const.Companion.NODE_SENDER_PHOTO
import com.example.bayars.utilities.Const.Companion.NODE_TEXT
import com.example.bayars.utilities.Const.Companion.NODE_TIMESTAMP
import com.example.bayars.utilities.CustomToast
import com.google.firebase.database.*
import java.util.*


class ChatDetailsActivity : AppCompatActivity() {
    companion object {
        var KEY_FRIEND = "FRIEND"

        fun navigate(activity: AppCompatActivity, transitionImage: View, obj: Friend) {
            val intent = Intent(activity, ChatDetailsActivity::class.java)
            intent.putExtra(KEY_FRIEND, obj)
            val options = ActivityOptionsCompat.makeSceneTransitionAnimation(activity, transitionImage, KEY_FRIEND)
            ActivityCompat.startActivity(activity, intent, options.toBundle())
        }
    }

    private var btn_send: Button? = null
    private var et_content: EditText? = null
    lateinit var mAdapter: ChatDetailListAdapter

    private var listview: ListView? = null
    private var actionBar: ActionBar? = null
    private var friend: Friend? = null
    private val items = ArrayList<ChatMessage>()
    private var parent_view: View? = null
    internal lateinit var pfbd: ParseFirebaseData
    internal lateinit var set: SettingApi

    internal lateinit var chatNode: String
    internal lateinit var chatNode_1: String
    internal lateinit var chatNode_2: String

    internal lateinit var ref: DatabaseReference
    internal lateinit var valueEventListener: ValueEventListener

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_chat_details)
        parent_view = findViewById(android.R.id.content)
        pfbd = ParseFirebaseData(this)
        set = SettingApi(this)

        ViewCompat.setTransitionName(parent_view!!, KEY_FRIEND)

        val intent = intent
        friend = intent.extras!!.getSerializable(KEY_FRIEND) as Friend
        initToolbar()

        iniComponen()
        chatNode_1 = set.readSetting(Const.PREF_MY_ID) + "-" + friend!!.id
        chatNode_2 = friend!!.id + "-" + set.readSetting(Const.PREF_MY_ID)

        valueEventListener = object : ValueEventListener {
            override fun onDataChange(dataSnapshot: DataSnapshot) {
                Log.d(Const.LOG_TAG, "Data changed from activity")
                if (dataSnapshot.hasChild(chatNode_1)) {
                    chatNode = chatNode_1
                } else if (dataSnapshot.hasChild(chatNode_2)) {
                    chatNode = chatNode_2
                } else {
                    chatNode = chatNode_1
                }
                items.clear()
                items.addAll(pfbd.getMessagesForSingleUser(dataSnapshot.child(chatNode)))


                for (data in dataSnapshot.child(chatNode).children) {
                    if (data.child(NODE_RECEIVER_ID).value!!.toString() == set.readSetting(Const.PREF_MY_ID)) {
                        data.child(NODE_IS_READ).ref.runTransaction(object : Transaction.Handler {
                            override fun doTransaction(mutableData: MutableData): Transaction.Result {
                                mutableData.value = true
                                return Transaction.success(mutableData)
                            }

                            override fun onComplete(
                                databaseError: DatabaseError?,
                                b: Boolean,
                                dataSnapshot: DataSnapshot?
                            ) {

                            }
                        })
                    }
                }

                mAdapter = ChatDetailListAdapter(this@ChatDetailsActivity, items)
                listview!!.adapter = mAdapter
                listview!!.requestFocus()
                registerForContextMenu(listview)
            }

            override fun onCancelled(databaseError: DatabaseError) {
                CustomToast(this@ChatDetailsActivity).showError(getString(R.string.error_could_not_connect))
            }
        }

        ref = FirebaseDatabase.getInstance().getReference(Const.MESSAGE_CHILD)
        ref.addValueEventListener(valueEventListener)

//        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
//            Tools.systemBarLolipop(this)
//        }
    }

    fun initToolbar() {
        val toolbar = findViewById<Toolbar>(R.id.toolbar)
        setSupportActionBar(toolbar)
        actionBar = supportActionBar
        actionBar!!.title = friend!!.nama
    }

    fun iniComponen() {
        listview = findViewById<ListView>(R.id.listview)
        btn_send = findViewById<Button>(R.id.btn_send)
        et_content = findViewById<EditText>(R.id.text_content)
        btn_send!!.setOnClickListener {

            val hm = HashMap<String, Any>()
            hm.put(NODE_TEXT, et_content!!.text.toString())
            hm.put(NODE_TIMESTAMP, System.currentTimeMillis().toString())
            hm.put(NODE_RECEIVER_ID, friend!!.id)
            hm.put(NODE_RECEIVER_NAME, friend!!.nama)
            hm.put(NODE_RECEIVER_PHOTO, friend!!.bukti)
            hm.put(NODE_SENDER_ID, set.readSetting(Const.PREF_MY_ID))
            hm.put(NODE_SENDER_NAME, set.readSetting(Const.PREF_MY_NAME))
            hm.put(NODE_SENDER_PHOTO, set.readSetting(Const.PREF_MY_DP))
            hm.put(NODE_IS_READ, false)

            ref.child(chatNode).push().setValue(hm)
            et_content!!.setText("")
            hideKeyboard()
        }
        et_content!!.addTextChangedListener(contentWatcher)
        if (et_content!!.length() == 0) {
            btn_send!!.visibility = View.GONE
        }
        hideKeyboard()
    }


    private fun hideKeyboard() {
        val view = this.currentFocus
        if (view != null) {
            val imm = getSystemService(Context.INPUT_METHOD_SERVICE) as InputMethodManager
            imm.hideSoftInputFromWindow(view.windowToken, 0)
        }
    }

    private val contentWatcher = object : TextWatcher {
        override fun afterTextChanged(etd: Editable) {
            if (etd.toString().trim { it <= ' ' }.length == 0) {
                btn_send!!.visibility = View.GONE
            } else {
                btn_send!!.visibility = View.VISIBLE
            }
        }

        override fun beforeTextChanged(arg0: CharSequence, arg1: Int, arg2: Int, arg3: Int) {}

        override fun onTextChanged(arg0: CharSequence, arg1: Int, arg2: Int, arg3: Int) {}
    }

    override fun onDestroy() {
        ref.removeEventListener(valueEventListener)
        super.onDestroy()
    }

    override fun onOptionsItemSelected(item: MenuItem?): Boolean {
        when (item!!.itemId) {
            android.R.id.home -> {
                finish()
            }
        }
        return super.onOptionsItemSelected(item)
    }
}