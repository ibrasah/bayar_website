package com.example.bayars.activity

import android.Manifest
import android.annotation.TargetApi
import android.app.Activity
import android.app.ProgressDialog
import android.content.Intent
import android.content.pm.PackageManager
import android.graphics.Bitmap
import android.net.Uri
import android.os.Build
import android.os.Bundle
import android.provider.MediaStore
import android.support.v4.content.ContextCompat
import android.support.v7.app.AppCompatActivity
import android.util.Log
import android.view.Menu
import android.view.MenuItem
import android.view.View
import android.webkit.MimeTypeMap
import android.widget.Toast
import com.bumptech.glide.Glide
import com.example.bayars.R
import com.example.bayars.helper.PrefsHelper
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import com.google.firebase.storage.FirebaseStorage
import com.google.firebase.storage.StorageReference
import kotlinx.android.synthetic.main.activity_main.toolbar
import kotlinx.android.synthetic.main.bayar_activity.*
import java.io.IOException
import java.util.*

class BayarLainnyaActivity : AppCompatActivity() {

    lateinit var fAuth: FirebaseAuth
    lateinit var helperPrefs: PrefsHelper
    lateinit var dbRef: DatabaseReference
    lateinit var filePath: Uri
    lateinit var stoRef: StorageReference
    lateinit var fstorage: FirebaseStorage
    lateinit var helperPref: PrefsHelper

    var id_upload: Int? = null
    var bukti: Int? = null

    val mAuth = FirebaseAuth.getInstance()
    val REQUEST_IMAGE = 10002
    val PERMISSION_REQUEST_CODE = 10003
    var value = 0.0

    @TargetApi(Build.VERSION_CODES.M)
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.bayar_lainnya_activity)

        helperPref = PrefsHelper(this)

        //setting toolbar
        setSupportActionBar(findViewById(R.id.toolbar))
        //home navigation
        setSupportActionBar(toolbar)
        toolbar.title = ""
        toolbar.setLogo(R.mipmap.ic_logo)

//        e("tahun", intent.getStringExtra("tahun"))

        fAuth = FirebaseAuth.getInstance()
        helperPrefs = PrefsHelper(this)
        fstorage = FirebaseStorage.getInstance()
        stoRef = fstorage.reference



        upload_bukti.setOnClickListener {
            when {
                (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) -> {
                    if (ContextCompat.checkSelfPermission(
                            this,
                            Manifest.permission.READ_EXTERNAL_STORAGE
                        )
                        != PackageManager.PERMISSION_GRANTED
                    ) {
                        requestPermissions(
                            arrayOf(
                                Manifest.permission.READ_EXTERNAL_STORAGE
                            ),
                            PERMISSION_REQUEST_CODE
                        )
                    } else {
                        imageChooser()
                    }
                }
                else -> {
                    imageChooser()
                }
            }

        }
        val dbRefUser = FirebaseDatabase.getInstance().getReference("SPP/${helperPrefs.getUI()}")
        dbRefUser.addListenerForSingleValueEvent(object : ValueEventListener {
            override fun onCancelled(p0: DatabaseError) {

            }

            override fun onDataChange(p0: DataSnapshot) {
                Log.e("uid", helperPrefs.getUI())
                if (p0.child("/${intent.getStringExtra("tahun")}").value.toString() != "null") {
                    Glide.with(this@BayarLainnyaActivity)
                        .load(p0.child("/${intent.getStringExtra("bulan")}/bukti").value.toString())
                        .into(upload_bukti)

                }
            }
        })
        btn_upload_bukti.setOnClickListener {
            dbRef = FirebaseDatabase.getInstance().reference
            val upload_img = upload_bukti.imageAlpha.toString()

            if (upload_img.isNotEmpty()) {
                val uid = helperPrefs.getUI()
                dbRef = FirebaseDatabase.getInstance().getReference("SPP/$uid")
                dbRef.child("${intent.getStringExtra("tahun")}").child("${intent.getStringExtra("tahun")}")
                    .child("status").setValue("M")
                Toast.makeText(this, "Sukses!!", Toast.LENGTH_SHORT).show()
                finish()
            } else {
                Toast.makeText(this@BayarLainnyaActivity, "Pilih Bukti terlebih Dahulu!!", Toast.LENGTH_SHORT).show()
            }

        }
    }

    private fun imageChooser() {
        val intent = Intent().apply {
            type = "image/*"
            action = Intent.ACTION_GET_CONTENT
        }
        startActivityForResult(Intent.createChooser(intent, "select image"), REQUEST_IMAGE)
    }

    override fun onRequestPermissionsResult(requestCode: Int, permissions: Array<out String>, grantResults: IntArray) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults)
        when (requestCode) {
            PERMISSION_REQUEST_CODE -> {
                if (grantResults.isEmpty() || grantResults[0]
                    == PackageManager.PERMISSION_DENIED
                ) {
                    Toast.makeText(this@BayarLainnyaActivity, "izin ditolak!!", Toast.LENGTH_SHORT).show()
                } else {
                    imageChooser()
                }
            }
        }

    }

    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if (resultCode != Activity.RESULT_OK) {
            return
        }
        when (requestCode) {
            REQUEST_IMAGE -> {
                filePath = data!!.data
                uploadFile()
                try {
                    val bitmap: Bitmap = MediaStore.Images.Media.getBitmap(
                        this.contentResolver, filePath
                    )
                    Glide.with(this)
                        .load(bitmap)
                        .into(upload_bukti)
                } catch (x: IOException) {
                    x.printStackTrace()
                }

            }
        }
    }


    fun GetFileExtension(uri: Uri): String? {
        val contentResolverz = this.contentResolver
        val mimeTypeMap = MimeTypeMap.getSingleton()

        return mimeTypeMap.getExtensionFromMimeType(contentResolverz.getType(uri))
    }

    private fun uploadFile() {
        val progress = ProgressDialog(this).apply {
            setTitle("Uploading Picture....")
            setCancelable(false)
            setCanceledOnTouchOutside(false)
            show()
        }
        val uid = helperPrefs.getUI()
        val nameX = UUID.randomUUID().toString()
        val ref: StorageReference = stoRef
            .child("bukti_tranfer/${nameX}.${GetFileExtension(filePath)}")
//        var storage = data.reference.child("Image_Profile/$nameX").putFile(filePath)
        ref.putFile(filePath)
            .addOnProgressListener { taskSnapshot ->
                value = (100.0 * taskSnapshot.bytesTransferred / taskSnapshot.totalByteCount)
            }
            .addOnSuccessListener {
                ref.downloadUrl.addOnSuccessListener {
                    dbRef = FirebaseDatabase.getInstance().getReference("SPP/$uid")
                    dbRef.child("${intent.getStringExtra("tahun")}").child("${intent.getStringExtra("bulan")}")
                        .child("bukti").setValue(it.toString())
                }
                Toast.makeText(this@BayarLainnyaActivity, "berhasil upload", Toast.LENGTH_SHORT).show()
                progressDownload.visibility = View.GONE
                progress.hide()
            }
            .addOnFailureListener { exception ->
                exception.printStackTrace()
            }

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