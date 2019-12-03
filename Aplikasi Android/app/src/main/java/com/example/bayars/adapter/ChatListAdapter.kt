package com.example.bayars.adapter

import android.content.Context
import android.support.v7.widget.RecyclerView
import android.util.SparseBooleanArray
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.view.animation.AnimationUtils
import android.widget.*
import com.example.bayars.R
import com.example.bayars.data.SettingApi
import com.example.bayars.model.ChatMessage
import com.example.bayars.widgets.CircleTransform
import com.squareup.picasso.Picasso
import java.util.*


class ChatListAdapter(private val mContext: Context, items: ArrayList<ChatMessage>) :
    RecyclerView.Adapter<ChatListAdapter.ViewHolder>(),
    Filterable {
    override fun onBindViewHolder(holder: ChatListAdapter.ViewHolder, position: Int) {
        set = SettingApi(mContext)
        val c = filtered_items[position]
        if (filtered_items[position].receiver.id == set.readSetting("myid") && (filtered_items[position].isRead == false))
            holder.unreadDot.visibility = View.VISIBLE
        else
            holder.unreadDot.visibility = View.INVISIBLE
        holder.content.text = c.text
        if (c.sender.id == set.readSetting("myid")) {
            holder.title.text = c.receiver.nama
            Picasso.get().load(c.receiver.bukti).resize(100, 100).transform(CircleTransform()).into(holder.image)
        } else if (c.receiver.id == set.readSetting("myid")) {
            holder.title.text = c.sender.nama
            Picasso.get().load(c.sender.bukti).resize(100, 100).transform(CircleTransform()).into(holder.image)
        }

        setAnimation(holder.itemView, position)
        holder.lyt_parent.setOnClickListener { view ->
            if (mOnItemClickListener != null) {
                mOnItemClickListener!!.onItemClick(view, c, position)
            }
        }

        holder.lyt_parent.setOnLongClickListener { view ->
            mOnItemLongClickListener?.onItemClick(view, c, position)
            false
        }

        holder.lyt_parent.isActivated = selectedItems.get(position, false)

    }

    private val selectedItems: SparseBooleanArray

    private var original_items = ArrayList<ChatMessage>()
    private var filtered_items: ArrayList<ChatMessage> = ArrayList()
    private val mFilter = ItemFilter()
    private lateinit var set: SettingApi

    private var mOnItemClickListener: OnItemClickListener? = null

    private val mOnItemLongClickListener: OnItemLongClickListener? = null

    private var lastPosition = -1

    val selectedItemCount: Int
        get() = selectedItems.size()

    interface OnItemClickListener {
        fun onItemClick(view: View, obj: ChatMessage, position: Int)
    }

    fun setOnItemClickListener(mItemClickListener: OnItemClickListener) {
        this.mOnItemClickListener = mItemClickListener
    }

    interface OnItemLongClickListener {
        fun onItemClick(view: View, obj: ChatMessage, position: Int)
    }

    inner class ViewHolder(v: View) : RecyclerView.ViewHolder(v) {
        var title: TextView
        var content: TextView
        var image: ImageView
        var lyt_parent: LinearLayout
        var unreadDot: LinearLayout

        init {
            title = v.findViewById<View>(R.id.title) as TextView
            content = v.findViewById<View>(R.id.content) as TextView
            image = v.findViewById<View>(R.id.image) as ImageView
            lyt_parent = v.findViewById<View>(R.id.lyt_parent) as LinearLayout
            unreadDot = v.findViewById<View>(R.id.unread) as LinearLayout
        }

    }

    override fun getFilter(): Filter {
        return mFilter
    }

    init {
        original_items = items
        filtered_items = items
        selectedItems = SparseBooleanArray()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ChatListAdapter.ViewHolder {
        val v = LayoutInflater.from(parent.context).inflate(R.layout.row_chats, parent, false)
        return ViewHolder(v)
    }

    private fun setAnimation(viewToAnimate: View, position: Int) {
        if (position > lastPosition) {
            val animation = AnimationUtils.loadAnimation(mContext, R.anim.slide_in_bottom)
            viewToAnimate.startAnimation(animation)
            lastPosition = position
        }
    }

    fun toggleSelection(pos: Int) {
        if (selectedItems.get(pos, false)) {
            selectedItems.delete(pos)
        } else {
            selectedItems.put(pos, true)
        }
        notifyItemChanged(pos)
    }

    fun clearSelections() {
        selectedItems.clear()
        notifyDataSetChanged()
    }

    fun removeSelectedItem() {
        val items = getSelectedItems()
        filtered_items.removeAll(items)
    }

    fun getSelectedItems(): List<ChatMessage> {
        val items = ArrayList<ChatMessage>()
        for (i in 0 until selectedItems.size()) {
            items.add(filtered_items[selectedItems.keyAt(i)])
        }
        return items
    }

    override fun getItemCount(): Int {
        return filtered_items.size
    }

    fun remove(position: Int) {
        filtered_items.removeAt(position)
    }

    override fun getItemId(position: Int): Long {
        return 0
    }

    private inner class ItemFilter : Filter() {
        override fun performFiltering(constraint: CharSequence): Filter.FilterResults {
            val query = constraint.toString().toLowerCase()

            val results = Filter.FilterResults()
            val list = original_items
            val result_list = ArrayList<ChatMessage>(list.size)

            for (i in list.indices) {
                val str_title = list[i].receiver.nama
                if (str_title.toLowerCase().contains(query)) {
                    result_list.add(list[i])
                }
            }

            results.values = result_list
            results.count = result_list.size

            return results
        }

        override fun publishResults(constraint: CharSequence, results: Filter.FilterResults) {
            filtered_items = results.values as ArrayList<ChatMessage>
            notifyDataSetChanged()
        }

    }
}