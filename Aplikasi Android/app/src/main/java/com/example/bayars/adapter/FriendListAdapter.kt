package com.example.bayars.adapter

import android.content.Context
import android.support.v7.widget.RecyclerView
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.view.animation.AnimationUtils
import android.widget.*
import com.example.bayars.R
import com.example.bayars.model.Friend
import com.example.bayars.widgets.CircleTransform
import com.squareup.picasso.Picasso
import java.util.*

class FriendListAdapter(private val mContext: Context, items: ArrayList<Friend>) :
    RecyclerView.Adapter<FriendListAdapter.ViewHolder>(),
    Filterable {

    private var original_items = ArrayList<Friend>()
    private var filtered_items: List<Friend> = ArrayList()
    private val mFilter = ItemFilter()

    private var mOnItemClickListener: OnItemClickListener? = null

    private var lastPosition = -1

    interface OnItemClickListener {
        fun onItemClick(view: View, obj: Friend, position: Int)
    }

    fun setOnItemClickListener(mItemClickListener: OnItemClickListener) {
        this.mOnItemClickListener = mItemClickListener
    }

    init {
        original_items = items
        filtered_items = items
    }

    inner class ViewHolder(v: View) : RecyclerView.ViewHolder(v) {
        var name: TextView
        var image: ImageView
        var lyt_parent: LinearLayout

        init {
            name = v.findViewById<View>(R.id.name) as TextView
            image = v.findViewById<View>(R.id.image) as ImageView
            lyt_parent = v.findViewById<View>(R.id.lyt_parent) as LinearLayout
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): FriendListAdapter.ViewHolder {
        val v = LayoutInflater.from(parent.context).inflate(R.layout.row_friends, parent, false)
        return ViewHolder(v)
    }

    override fun getItemCount(): Int {
        return filtered_items.size
    }

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        val c = filtered_items[position]
        holder.name.text = c.nama
        Picasso
            .get()
            .load(c.bukti)
            .error(R.drawable.unknown_avatar)
            .placeholder(R.drawable.unknown_avatar)
            .resize(100, 100)
            .transform(CircleTransform())
            .into(holder.image)

        setAnimation(holder.itemView, position)

        holder.lyt_parent.setOnClickListener { view ->
            if (mOnItemClickListener != null) {
                mOnItemClickListener!!.onItemClick(view, c, position)
            }
        }
    }

    fun getItem(position: Int): Friend {
        return filtered_items[position]
    }

    private fun setAnimation(viewToAnimate: View, position: Int) {
        if (position > lastPosition) {
            val animation = AnimationUtils.loadAnimation(mContext, R.anim.slide_in_bottom)
            viewToAnimate.startAnimation(animation)
            lastPosition = position
        }
    }

    override fun getFilter(): Filter {
        return mFilter
    }

    private inner class ItemFilter : Filter() {
        override fun performFiltering(constraint: CharSequence): Filter.FilterResults {
            val query = constraint.toString().toLowerCase()

            val results = Filter.FilterResults()
            val list = original_items
            val result_list = ArrayList<Friend>(list.size)

            for (i in list.indices) {
                val str_title = list[i].nama
                if (str_title.toLowerCase().contains(query)) {
                    result_list.add(list[i])
                }
            }

            results.values = result_list
            results.count = result_list.size

            return results
        }

        override fun publishResults(constraint: CharSequence, results: Filter.FilterResults) {
            filtered_items = results.values as List<Friend>
            notifyDataSetChanged()
        }
    }
}