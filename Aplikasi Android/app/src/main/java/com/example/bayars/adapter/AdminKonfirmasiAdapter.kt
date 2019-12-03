package com.example.bayars.adapter

import android.app.AlertDialog
import android.content.Context
import android.support.v4.content.ContextCompat
import android.support.v7.widget.RecyclerView
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.LinearLayout
import android.widget.TextView
import com.bumptech.glide.Glide
import com.example.bayars.R
import com.example.bayars.helper.PrefsHelper
import com.example.bayars.model.ModelData
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.FirebaseDatabase

class AdminKonfirmasiAdapter(val mContext: Context, list: ArrayList<HashMap<String, Any>>, val uidSiswa: String) :
    RecyclerView.Adapter<AdminKonfirmasiAdapter.AdminKonfirmasiViewHolder>() {
    val itemKonfirmasi: ArrayList<HashMap<String, Any>> = list

    lateinit var dbref: DatabaseReference
    lateinit var helperPrefs: PrefsHelper

    init {
        helperPrefs = PrefsHelper(mContext)
    }


    override fun onCreateViewHolder(p0: ViewGroup, p1: Int): AdminKonfirmasiViewHolder {
        val view: View = LayoutInflater.from(p0.context).inflate(
            R.layout.konfirmasi_pembayaran_row, p0, false
        )
        val uploadViewHolder = AdminKonfirmasiViewHolder(view)
        return uploadViewHolder
    }

    override fun getItemCount(): Int {
        return itemKonfirmasi.size
    }

    override fun onBindViewHolder(p0: AdminKonfirmasiViewHolder, p1: Int) {

        val uploadBuktiModel: ModelData = itemKonfirmasi[p1][itemKonfirmasi[p1]["bulan"]] as ModelData
//        val iduploads = uploadBuktiModel.getId_upload().toString()
        p0.status.text = uploadBuktiModel.status
        Glide.with(mContext)
            .load(uploadBuktiModel.bukti)
            .into(p0.bukti)

        p0.bukti.setOnClickListener {
            val view = LayoutInflater.from(mContext).inflate(R.layout.dialog_image, null)
            val dialog = AlertDialog.Builder(mContext)
            val imgPopup = view.findViewById<ImageView>(R.id.dialogImage)
            imgPopup.setImageDrawable(p0.bukti.drawable)
            dialog.setView(view)
            dialog.show()
        }

        if (p0.status.text.equals("B")) {
            p0.status.text = "Belum Membayar"
            p0.status.setBackgroundColor(ContextCompat.getColor(mContext, R.color.colorAccent))
        } else if (p0.status.text.equals("M")) {
            p0.status.text = "Menunggu Konfirmasi"
            p0.status.setBackgroundColor(ContextCompat.getColor(mContext, R.color.warning))
        } else if (p0.status.text.equals("S")) {
            p0.status.text = "Lunas"
            p0.status.setBackgroundColor(ContextCompat.getColor(mContext, R.color.success))
        }

        p0.status.setOnClickListener {
            val dialog = AlertDialog.Builder(mContext)
            dialog.setTitle("Konfirmasi Pembayaran")
            dialog.setMessage("Yakin bukti Tranfer masuk rekening Sekolah?")
            dialog.setPositiveButton("Yakin") { d, i ->
                dbref = FirebaseDatabase.getInstance()
                    .getReference("SPP/$uidSiswa/${itemKonfirmasi[p1]["tahun"]}/${itemKonfirmasi[p1]["bulan"]}")
                dbref.child("status").setValue("S")
                dbref.push()
            }
            dialog.setNegativeButton("Tidak") { d2, i ->
                {

                }
            }
//            val uid = helperPrefs.getUI()
            dialog.create().show()
        }


//        val id_user = uploadBuktiModel.getId_user().toString()
//        Toast.makeText(mContext.applicationContext, id_user, Toast.LENGTH_SHORT).show()
//        val dbRefUser = FirebaseDatabase.getInstance().getReference("Akun/${id_user}")
//        dbRefUser.addValueEventListener(object : ValueEventListener {
//            override fun onCancelled(p3: DatabaseError) {
//
//            }
//
//            override fun onDataChange(p3: DataSnapshot) {
//                var nama_user = p3.child("/Nama").value.toString()
//                p0.namauser.text = nama_user
//            }
//
//        })
//
//        p0.ll_adminorder.setOnClickListener {
//
//            var idupload = iduploads.toLong()
//
//            var intent = Intent(mContext, BayarActivity::class.java)
//            intent.putExtra("idbukti", idupload)
//            intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK
//            mContext.applicationContext.startActivity(intent)
//        }


//            view.context.startActivity(Intent(view.context, OutletActivity::class.java))
    }

    inner class AdminKonfirmasiViewHolder(itemview: View) : RecyclerView.ViewHolder(itemview) {
        var ll_adminorder: LinearLayout
        //        var namauser: TextView
        var bukti: ImageView
        var status: TextView


        init {
            ll_adminorder = itemview.findViewById(R.id.ll_row_admin)
//            namauser = itemview.findViewById(R.id.mvUser)
            bukti = itemview.findViewById(R.id.bukti)
            status = itemview.findViewById(R.id.mvStatus)
        }
    }
}