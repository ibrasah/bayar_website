package com.example.bayars.activity

import android.content.Intent
import android.os.Bundle
import android.support.design.widget.BottomNavigationView
import android.support.v4.app.Fragment
import android.support.v7.app.AppCompatActivity
import android.view.Menu
import android.view.MenuItem
import com.example.bayars.R
import com.example.bayars.fragment.fr_beranda
import com.example.bayars.fragment.fr_keuangan
import com.google.firebase.auth.FirebaseAuth
import kotlinx.android.synthetic.main.activity_main.*

class MainActivity : AppCompatActivity() {

    lateinit var fAuth: FirebaseAuth

    private val mOnNavigationitemSelectedlistener = BottomNavigationView.OnNavigationItemSelectedListener { item ->
        when (item.itemId) {
            R.id.navigation_beranda -> {
                val fragment = fr_beranda()
                addFragment(fragment)
                return@OnNavigationItemSelectedListener true
            }
            R.id.navigation_keuangan -> {
                val fragment = fr_keuangan()
                addFragment(fragment)
                return@OnNavigationItemSelectedListener true
            }

        }
        false
    }

    private fun addFragment(fragment: Fragment) {
        supportFragmentManager
            .beginTransaction()
            .setCustomAnimations(
                R.anim.design_bottom_sheet_slide_in,
                R.anim.design_bottom_sheet_slide_out
            )
            .replace(R.id.content, fragment, fragment.javaClass.simpleName)
            .commit()
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        navigation.setOnNavigationItemSelectedListener(mOnNavigationitemSelectedlistener)
        fAuth = FirebaseAuth.getInstance()
        val fragment = fr_beranda()
        addFragment(fragment)
        //setting toolbar
        setSupportActionBar(findViewById(R.id.toolbar))
        //home navigation
        setSupportActionBar(toolbar)
        toolbar.title = ""
        toolbar.setLogo(R.mipmap.ic_logo)


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
            SignOut()
            startActivity(Intent(this, LoginActivity::class.java))
            finish()
            true
        }
        else -> {
            super.onOptionsItemSelected(item)
        }
    }

    override fun onResume() {
        super.onResume()
        val user = fAuth.currentUser
        if (user == null) {
            finish()
        }
    }

    fun SignOut() {
        fAuth.signOut()
    }
}
