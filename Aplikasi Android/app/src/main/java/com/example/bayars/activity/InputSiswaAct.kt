package com.example.bayars.activity

import android.content.Intent
import android.os.Bundle
import android.support.v7.app.AppCompatActivity
import android.view.View
import android.widget.Button
import android.widget.EditText
import android.widget.ImageView
import android.widget.Toast
import com.example.bayars.R
import com.example.bayars.model.ModelData
import com.example.bayars.utilities.ArrayData
import com.google.android.gms.tasks.OnCompleteListener
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.FirebaseDatabase

class InputSiswaAct : AppCompatActivity() {
    val mAuth = FirebaseAuth.getInstance()
    lateinit var mDatabase: DatabaseReference
    lateinit var mDatabase2: DatabaseReference

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.admin_inputsiswa)

        val regBtn = findViewById<View>(R.id.btn_regis) as Button
        val back = findViewById<View>(R.id.back_img) as ImageView

        mDatabase = FirebaseDatabase.getInstance().getReference("Akunku")
        mDatabase2 = FirebaseDatabase.getInstance().getReference("SPP")
        regBtn.setOnClickListener(View.OnClickListener {
            Register()
        })
        back.setOnClickListener {
            startActivity(Intent(this@InputSiswaAct, AdminActivity::class.java))
        }
    }

    private fun Register() {
        val emailTxt = findViewById<View>(R.id.et_email) as EditText
        val passwordTxt = findViewById<View>(R.id.et_password) as EditText
        val namaTxt = findViewById<View>(R.id.et_nama) as EditText
        val alamatTxt = findViewById<View>(R.id.et_alamat) as EditText
        val jurusanTxt = findViewById<View>(R.id.et_jurusan) as EditText
        val kelasTxt = findViewById<View>(R.id.et_kelas) as EditText
        val nisTxt = findViewById<View>(R.id.et_nis) as EditText

        val siswa = "Siswa"
        val admin = "Admin"
        val status = "B"
        val tunggakan = "4.800.000"
        val tunggakan2 = "0"
        val tunggakantotal = "4.800.000"


        val email = emailTxt.text.toString()
        val nama = namaTxt.text.toString()
        val password = passwordTxt.text.toString()
        val alamat = alamatTxt.text.toString()
        val nis = nisTxt.text.toString()
        val kelas = kelasTxt.text.toString()
        val jurusan = jurusanTxt.text.toString()

        if (!nama.isEmpty() && !email.isEmpty() && !password.isEmpty() && !alamat.isEmpty() && !jurusan.isEmpty()
            && !kelas.isEmpty() && !nis.isEmpty()
        ) {
            mAuth.createUserWithEmailAndPassword(email, password)
                .addOnCompleteListener(this, OnCompleteListener { task ->
                    if (task.isSuccessful) {
                        val user = mAuth.currentUser
                        val uid = user!!.uid
                        ////SEMESTER 1-2
//                        mDatabase2.child(uid).child("2019").setValue(ModelTahun())
                        for (bulan in ArrayData.bulan) {
                            mDatabase2.child(uid).child("2019").child(bulan).setValue(ModelData(status, "null"))
                            mDatabase2.child(uid).child("2020").child(bulan).setValue(ModelData(status, "null"))
                            mDatabase2.child(uid).child("2021").child(bulan).setValue(ModelData(status, "null"))
                        }
                        for (lainnya in ArrayData.lainnya) {
                            mDatabase2.child(uid).child("Lainnya").child(lainnya).setValue(ModelData(status, "null"))
                        }

                        mDatabase.child(uid).child("UID").setValue(uid)
                        mDatabase.child(uid).child("Nama").setValue(nama)
                        mDatabase.child(uid).child("Email").setValue(email)
                        mDatabase.child(uid).child("Alamat").setValue(alamat)
                        mDatabase.child(uid).child("Jurusan").setValue(jurusan)
                        mDatabase.child(uid).child("Password").setValue(password)
                        mDatabase.child(uid).child("Kelas").setValue(kelas)
                        mDatabase.child(uid).child("NIS").setValue(nis)
                        mDatabase.child(uid).child("Foto").setValue("null")
                        mDatabase.child(uid).child("TunggakanSPP").setValue(tunggakan)
                        mDatabase.child(uid).child("TunggakanLainnya").setValue(tunggakan2)
                        mDatabase.child(uid).child("TunggakanTotal").setValue(tunggakantotal)
                        if (email.split("@")[1].equals("admin.spp")) {
                            mDatabase.child(uid).child("Status").setValue(admin)
                            startActivity(Intent(this@InputSiswaAct, AdminActivity::class.java))
                        } else {
                            mDatabase.child(uid).child("Status").setValue(siswa)
                            startActivity(Intent(this@InputSiswaAct, AdminActivity::class.java))
                        }
                        Toast.makeText(this, "Berhasil Daftar", Toast.LENGTH_SHORT).show()
                        finish()
                    } else {
                        Toast.makeText(this, "Email Anda Sudah Terdaftar!!!", Toast.LENGTH_SHORT).show()
                    }
                })
        } else {
            Toast.makeText(this, "tolong isi dengan lengkap", Toast.LENGTH_SHORT).show()
        }
    }

}