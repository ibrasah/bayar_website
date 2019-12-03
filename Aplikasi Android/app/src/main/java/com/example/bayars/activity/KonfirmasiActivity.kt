package com.example.bayars.activity

import android.content.Intent
import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.support.v7.widget.LinearLayoutManager
import android.support.v7.widget.RecyclerView
import android.util.Log
import android.util.Log.e
import android.view.Menu
import android.view.MenuItem
import android.view.View
import android.widget.AdapterView
import android.widget.ArrayAdapter
import com.example.bayars.R
import com.example.bayars.adapter.AdminKonfirmasiAdapter
import com.example.bayars.helper.PrefsHelper
import com.example.bayars.model.ModelData
import com.example.bayars.model.UploadBuktiModel
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import kotlinx.android.synthetic.main.activity_main.toolbar
import kotlinx.android.synthetic.main.konfirmasi_pembayaran.*

class KonfirmasiActivity : AppCompatActivity() {

    private var adminkonfirmasiAdapter: AdminKonfirmasiAdapter? = null
    private var rvadminkonfirmasi: RecyclerView? = null
    private var list: MutableList<UploadBuktiModel> = ArrayList<UploadBuktiModel>()
    lateinit var dbref: DatabaseReference
    lateinit var helperPrefs: PrefsHelper
    lateinit var fAuth: FirebaseAuth

    var id_upload: String? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.konfirmasi_pembayaran)
        //setting toolbar
        setSupportActionBar(findViewById(R.id.toolbar))
        //home navigation
        setSupportActionBar(toolbar)
        toolbar.title = "Bayars Admin"
        toolbar.setLogo(R.mipmap.ic_logo)
        helperPrefs = PrefsHelper(this)
        rvadminkonfirmasi = findViewById(R.id.rvAdminkonfirmasi)
        rvadminkonfirmasi!!.layoutManager = LinearLayoutManager(this)
        rvadminkonfirmasi!!.setHasFixedSize(true)
        fAuth = FirebaseAuth.getInstance()

//        getDataAdmin()
        getDataOrder()
    }

    fun getDataOrder() {
        dbref = FirebaseDatabase.getInstance().getReference("SPP/${intent.getStringExtra("uidSiswa")}")
        dbref.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(p0: DataSnapshot) {
                list = ArrayList()
                val tahun = ArrayList<String>()
                for (dataS in p0.children) {
                    tahun.add(dataS.key.toString())
                }
                val sAdapter = ArrayAdapter(this@KonfirmasiActivity, android.R.layout.simple_spinner_item, tahun)
                sAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
                spinnerTahun.adapter = sAdapter
                spinnerTahun.onItemSelectedListener = object : AdapterView.OnItemSelectedListener {
                    override fun onItemSelected(parent: AdapterView<*>?, view: View?, position: Int, id: Long) {
                        val data = ArrayList<HashMap<String, Any>>()
                        for (dataS2 in p0.child(tahun[position]).children) {
                            val map = HashMap<String, Any>()
                            map["tahun"] = tahun[position]
                            map[dataS2.key.toString()] =
                                ModelData(
                                    dataS2.child("status").value.toString(),
                                    dataS2.child("bukti").value.toString()
                                )
                            map["bulan"] = dataS2.key.toString()
                            data.add(map)
                            e(
                                "data",
                                "${dataS2.key.toString()}/${dataS2.child("bukti").value.toString()}, " +
                                        dataS2.child("status").value.toString()
                            )
                        }

                        adminkonfirmasiAdapter =
                            AdminKonfirmasiAdapter(this@KonfirmasiActivity, data, intent.getStringExtra("uidSiswa"))
                        rvadminkonfirmasi!!.adapter = adminkonfirmasiAdapter
                    }

                    override fun onNothingSelected(parent: AdapterView<*>?) {

                    }

                }
            }

            override fun onCancelled(p0: DatabaseError) {
                Log.e("TAG_ERROR", p0.message)
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