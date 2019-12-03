package com.example.bayars.fragment

import android.content.Intent
import android.os.Bundle
import android.support.v4.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.example.bayars.R
import com.example.bayars.activity.Lainnya
import com.example.bayars.activity.Semester
import kotlinx.android.synthetic.main.fr_keuangan.*

class fr_keuangan : Fragment() {

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        return inflater.inflate(R.layout.fr_keuangan, container, false)
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        val intent = Intent(activity!!, Semester::class.java)
        semester12.setOnClickListener {
            intent.putExtra("tahun", "2019")
            startActivity(intent)
        }
        semester34.setOnClickListener {
            //            startActivity(Intent(activity!!, Semester3::class.java))
            intent.putExtra("tahun", "2020")
            startActivity(intent)
        }
        semester56.setOnClickListener {
            intent.putExtra("tahun", "2021")
            startActivity(intent)
//            startActivity(Intent(activity!!, Semester2::class.java))
        }
        lain.setOnClickListener {
            startActivity(Intent(activity!!, Lainnya::class.java))
        }
    }
}