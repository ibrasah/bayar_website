package com.example.bayars.activity

import android.content.Intent
import android.os.Bundle
import android.os.Handler
import android.support.v7.app.AppCompatActivity
import android.view.animation.Animation
import android.view.animation.AnimationUtils
import android.widget.Toast
import com.example.bayars.R
import com.example.bayars.helper.PrefsHelper
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.auth.FirebaseUser
import kotlinx.android.synthetic.main.splash_activity.*

class SplashActivity : AppCompatActivity() {

    lateinit var blip: Animation
    val mAuth = FirebaseAuth.getInstance()
    val user = mAuth.currentUser
    lateinit var helperPrefs: PrefsHelper

    private var mDelayHandler: Handler? = null
    private val SPLASH_DELAY: Long = 4000 //4 seconds
    internal val mRunnable: Runnable = Runnable {


        if (!isFinishing) {
            val intent = Intent(applicationContext, LoginActivity::class.java)

            startActivity(intent)

            finish()
            Toast.makeText(this, "Haii! Selamat Datang !", Toast.LENGTH_SHORT).show()
        }

    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.splash_activity)

        blip = AnimationUtils.loadAnimation(this, R.anim.transition_splash)

        logo.startAnimation(blip)
        text.startAnimation(blip)
        text2.startAnimation(blip)

        helperPrefs = PrefsHelper(this)

        mDelayHandler = Handler()

        //Navigate with delay

        if (user == null) {
            mDelayHandler!!.postDelayed(mRunnable, SPLASH_DELAY)
        } else {
            updateUI(user)
//            Toast.makeText(this, "${user}", Toast.LENGTH_SHORT).show()
        }

    }

    private fun updateUI(user: FirebaseUser?) {
        val status = helperPrefs.Status()
        if (user != null)
            if (status.toString().equals("Admin")) {
                startActivity(Intent(this, AdminActivity::class.java))
            } else if (status.toString().equals("Siswa")) {
                startActivity(Intent(this, MainActivity::class.java))
            }

        finish()
    }

    public override fun onDestroy() {

        if (mDelayHandler != null) {

            mDelayHandler!!.removeCallbacks(mRunnable)

        }

        super.onDestroy()

    }
}