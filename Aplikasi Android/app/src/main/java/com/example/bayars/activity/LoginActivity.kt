package com.example.bayars.activity

import android.content.Intent
import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.util.Log
import android.view.View
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import com.example.bayars.R
import com.example.bayars.data.SettingApi
import com.example.bayars.helper.PrefsHelper
import com.example.bayars.utilities.Const
import com.google.android.gms.tasks.OnCompleteListener
import com.google.firebase.auth.AuthResult
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.auth.FirebaseUser
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.database.ValueEventListener

class LoginActivity : AppCompatActivity() {

    val mAuth = FirebaseAuth.getInstance()
    lateinit var helperPrefs: PrefsHelper
    internal lateinit var set: SettingApi

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.login_activity)

        helperPrefs = PrefsHelper(this)
        val loginBtn = findViewById<View>(R.id.btn_login) as Button

        loginBtn.setOnClickListener(View.OnClickListener {
            login()
        })
    }

    private fun login() {
        val emailTxt = findViewById<View>(R.id.emailTxt) as EditText
        val passwordTxt = findViewById<View>(R.id.passwordTxt) as EditText

        var email = emailTxt.text.toString()
        var password = passwordTxt.text.toString()
        set = SettingApi(this)

        if (!email.isEmpty() && !password.isEmpty()) {
            this.mAuth.signInWithEmailAndPassword(email, password)
                .addOnCompleteListener(this, OnCompleteListener<AuthResult> { task ->
                    if (task.isSuccessful) {
//                        startActivity(Intent(this, MainActivity::class.java))
//                        Toast.makeText(this, "Halo !", Toast.LENGTH_LONG).show()
                        val user = mAuth.currentUser
                        helperPrefs.saveUID(user!!.uid)
                        val dbRefUser = FirebaseDatabase.getInstance().getReference("Akun/${helperPrefs.getUI()}")
                        dbRefUser.addValueEventListener((object : ValueEventListener {
                            override fun onDataChange(p0: DataSnapshot) {
                                var userid = p0.child("/UID").value.toString()
                                var nama = p0.child("/Nama").value.toString()
                                var photo = p0.child("/Foto").value.toString()

                                set.addUpdateSettings(Const.PREF_MY_ID, userid)
                                set.addUpdateSettings(Const.PREF_MY_NAME, nama)
                                set.addUpdateSettings(Const.PREF_MY_DP, photo)
                            }

                            override fun onCancelled(p0: DatabaseError) {

                            }
                        }))
                        if (email.split("@")[1].equals("admin.spp")) {
                            helperPrefs.saveUID(user.uid) //berfungsi untuk save uid ke sharedpreferences
                            helperPrefs.saveStatus("Admin")
                            startActivity(Intent(this, AdminActivity::class.java))
                            Toast.makeText(this, "Berhasil login ! Admin", Toast.LENGTH_SHORT).show()
                            finish()
                        } else {
                            updateUI(user)
                            Toast.makeText(this, "Berhasil login", Toast.LENGTH_SHORT).show()
                        }
                    } else {
                        Toast.makeText(this, "Password/Email salah", Toast.LENGTH_SHORT).show()
                    }
                })

        } else {
            Toast.makeText(this, "Please fill up the Credentials :|", Toast.LENGTH_SHORT).show()
        }
    }

    private fun updateUI(user: FirebaseUser?) {
        if (user != null) {
            helperPrefs.saveUID(user.uid) //berfungsi untuk save uid ke sharedpreferences
            helperPrefs.saveStatus("Siswa")
            startActivity(Intent(this, MainActivity::class.java))
            finish()
        } else {
            Log.e("TAG_ERROR", "Siswa tidak ada")
        }
    }


    override fun onStart() {
        super.onStart()
        val user = mAuth.currentUser
        if (user != null) {
            updateUI(user)
        }
    }
}