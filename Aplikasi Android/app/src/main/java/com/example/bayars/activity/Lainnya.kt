package com.example.bayars.activity

import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.view.Menu
import android.view.MenuItem
import android.widget.Toast
import com.example.bayars.R
import kotlinx.android.synthetic.main.activity_main.*

class Lainnya : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.lainnya)

        //setting toolbar
        setSupportActionBar(findViewById(R.id.toolbar))
        //home navigation
        setSupportActionBar(toolbar)
        toolbar.title = ""
        toolbar.setLogo(R.mipmap.ic_logo)

//        gedung.setOnClickListener {
//            val mIntent = Intent(this@Lainnya, BayarLainnyaActivity::class.java)
//            mIntent.putExtra("bulan", "Uang_Gedung")
//            mIntent.putExtra("tahun", intent.getStringExtra("tahun"))
//            startActivity(mIntent)
//        }
//        zakat.setOnClickListener {
//            val mIntent = Intent(this@Lainnya, BayarLainnyaActivity::class.java)
//            mIntent.putExtra("bulan", "Zakat")
//            mIntent.putExtra("tahun", intent.getStringExtra("tahun"))
//            startActivity(mIntent)
//        }
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.menu_actionbar, menu)
        return super.onCreateOptionsMenu(menu)
    }

    override fun onOptionsItemSelected(item: MenuItem) = when (item.itemId) {
        R.id.action_chat -> {
            Toast.makeText(this, "Bisa", Toast.LENGTH_SHORT).show()
            true
        }
        R.id.action_logout -> {
            Toast.makeText(this, "Bisa", Toast.LENGTH_SHORT).show()
            true
        }

        else -> {
            super.onOptionsItemSelected(item)
        }
    }
}