package com.example.bayars.activity


import android.content.Intent
import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.view.Menu
import android.view.MenuItem
import android.widget.ListView
import com.example.bayars.R
import com.example.bayars.adapter.AdapterListSiswa
import com.example.bayars.model.Siswa
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import kotlinx.android.synthetic.main.activity_main.*

class ListSiswaAct : AppCompatActivity() {

    lateinit var ref: DatabaseReference
    lateinit var list: MutableList<Siswa>
    lateinit var listView: ListView
    lateinit var fAuth: FirebaseAuth


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.list_siswa)

        //setting toolbar
        setSupportActionBar(findViewById(R.id.toolbar))
        //home navigation
        setSupportActionBar(toolbar)
        toolbar.title = "Bayars Admin"
        toolbar.setLogo(R.mipmap.ic_logo)

        fAuth = FirebaseAuth.getInstance()
        ref = FirebaseDatabase.getInstance().getReference("Akunku")
        list = mutableListOf()
        listView = findViewById(R.id.listview)



        ref.addValueEventListener(object : ValueEventListener {
            override fun onCancelled(p0: DatabaseError) {

            }

            override fun onDataChange(p0: DataSnapshot) {
                if (p0.exists()) {
                    for (h in p0.children) {
                        val user = h.getValue(Siswa::class.java)
                        list.add(user!!)
                    }
                    val adapter = AdapterListSiswa(applicationContext, R.layout.siswa, list)
                    listView.adapter = adapter
                    listView.setOnItemClickListener { parent, view, position, id ->
                        val mIntent = Intent(this@ListSiswaAct, KonfirmasiActivity::class.java)
                        mIntent.putExtra("uidSiswa", list.get(position).ID)
                        startActivity(mIntent)
                    }
                }
            }
        })
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.menu_actionbar, menu)
        return super.onCreateOptionsMenu(menu)
    }

    override fun onOptionsItemSelected(item: MenuItem) = when (item.itemId) {
        R.id.action_chat -> {
            startActivity(Intent(this, ChatActivity::class.java))
            true
        }
        R.id.action_logout -> {
            signOut()
            startActivity(Intent(this, LoginActivity::class.java))
            true
        }


        else -> {
            super.onOptionsItemSelected(item)
        }
    }

    fun signOut() {
        fAuth.signOut()
    }
}