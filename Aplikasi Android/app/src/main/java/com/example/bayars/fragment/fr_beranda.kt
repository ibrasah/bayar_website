package com.example.bayars.fragment

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
import android.support.v4.app.Fragment
import android.support.v4.content.ContextCompat
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.webkit.MimeTypeMap
import android.widget.Toast
import com.bumptech.glide.Glide
import com.example.bayars.R
import com.example.bayars.activity.Lainnya
import com.example.bayars.helper.PrefsHelper
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import com.google.firebase.storage.FirebaseStorage
import com.google.firebase.storage.StorageReference
import kotlinx.android.synthetic.main.fr_beranda.*
import kotlinx.android.synthetic.main.fr_beranda.view.*
import java.io.IOException
import java.util.*

class fr_beranda : Fragment() {
    lateinit var fAuth: FirebaseAuth
    lateinit var helperPrefs: PrefsHelper
    lateinit var dbRef: DatabaseReference
    lateinit var filePath: Uri
    lateinit var stoRef: StorageReference
    lateinit var fstorage: FirebaseStorage

    val REQUEST_IMAGE = 10002
    val PERMISSION_REQUEST_CODE = 10003
    var value = 0.0

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?

    ): View? {
        return inflater.inflate(R.layout.fr_beranda, container, false)

    }

    @TargetApi(Build.VERSION_CODES.M)
    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        fAuth = FirebaseAuth.getInstance()
        helperPrefs = PrefsHelper(activity!!)
        fstorage = FirebaseStorage.getInstance()
        stoRef = fstorage.reference

        Glide.with(this)
            .load(R.drawable.avatar)
            .into(avatar)

        bg_totallain.setOnClickListener {
            startActivity(Intent(activity!!, Lainnya::class.java))
        }
        bg_totalspp.setOnClickListener {
            val ft = fragmentManager!!.beginTransaction()
            ft.replace(R.id.content, fr_keuangan(), "NewFragmentTag")
            ft.addToBackStack(null)
            ft.commit()
        }
        avatar.setOnClickListener {
            when {
                (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) -> {
                    if (ContextCompat.checkSelfPermission(
                            activity!!,
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

        val dbRefUser = FirebaseDatabase.getInstance().getReference("Akunku/${helperPrefs.getUI()}")
        dbRefUser.addValueEventListener(object : ValueEventListener {
            override fun onCancelled(p0: DatabaseError) {

            }

            override fun onDataChange(p0: DataSnapshot) {
                Log.e("uid", helperPrefs.getUI())
                if (p0.child("/Foto").value.toString() != "null") {
                    Glide.with(view.context)
                        .load(p0.child("/Foto").value.toString())
                        .into(view.avatar)  
                }
                view.tunggakantotal.text = p0.child("/TunggakanTotal").value.toString()
                view.tunggakanspp.text = p0.child("/TunggakanSPP").value.toString()
                view.tunggakanlainnya.text = p0.child("/TunggakanLainnya").value.toString()
                view.nama.text = p0.child("/Nama").value.toString()
                view.nis.text = p0.child("/NIS").value.toString()
                view.nama2.text = p0.child("/Nama").value.toString()
                view.jurusan.text = p0.child("/Jurusan").value.toString()
                view.kelas.text = p0.child("/Kelas").value.toString()
                view.alamat.text = p0.child("/Alamat").value.toString()
            }

        })

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
                    Toast.makeText(activity, "izin ditolak!!", Toast.LENGTH_SHORT).show()
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
                        activity!!.contentResolver, filePath
                    )
                    Glide.with(this)
                        .load(bitmap)
                        .into(avatar)
                } catch (x: IOException) {
                    x.printStackTrace()
                }

            }
        }
    }

    fun GetFileExtension(uri: Uri): String? {
        val contentResolverz = activity!!.contentResolver
        val mimeTypeMap = MimeTypeMap.getSingleton()

        return mimeTypeMap.getExtensionFromMimeType(contentResolverz.getType(uri))
    }

    private fun uploadFile() {
        val progress = ProgressDialog(activity).apply {
            setTitle("Uploading Picture....")
            setCancelable(false)
            setCanceledOnTouchOutside(false)
            show()
        }
        val uid = helperPrefs.getUI()
        val nameX = UUID.randomUUID().toString()
        val ref: StorageReference = stoRef
            .child("images/${nameX}.${GetFileExtension(filePath)}")
//        var storage = data.reference.child("Image_Profile/$nameX").putFile(filePath)
        ref.putFile(filePath)
            .addOnProgressListener { taskSnapshot ->
                value = (100.0 * taskSnapshot.bytesTransferred / taskSnapshot.totalByteCount)
            }
            .addOnSuccessListener {
                ref.downloadUrl.addOnSuccessListener {
                    dbRef = FirebaseDatabase.getInstance().getReference("Akun/$uid")
                    dbRef.child("Foto").setValue(it.toString())
                }
                Toast.makeText(activity, "berhasil upload", Toast.LENGTH_SHORT).show()
                progressDownload.visibility = View.GONE
                progress.hide()
            }
            .addOnFailureListener { exception ->
                exception.printStackTrace()
            }
    }
}