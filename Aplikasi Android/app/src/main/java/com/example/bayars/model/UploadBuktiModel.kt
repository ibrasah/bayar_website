package com.example.bayars.model

class UploadBuktiModel {

    private var id_upload: Long? = null
    private var id_user: String? = null
    private var bukti: String? = null
    private var status: String? = null
    private var key: String? = null


    constructor()
    constructor(
        id_upload: Long, id_user: String, bukti: String, status: String, key: String
    ) {
        this.id_upload = id_upload
        this.id_user = id_user
        this.bukti = bukti
        this.status = status
        this.key = key

    }

    fun getId_upload(): Long? {
        return id_upload
    }

    fun getId_user(): String? {
        return id_user
    }

    fun getStatus(): String? {
        return status
    }

    fun getBukti(): String? {
        return bukti
    }

    fun getKey(): String {
        return key!!
    }

    fun setKey(key: String) {
        this.key = key
    }

    fun setId_upload(id_upload: Long) {
        this.id_upload = id_upload
    }

    fun setId_user(id_user: String) {
        this.id_user = id_user
    }

    fun setBukti(bukti: String) {
        this.bukti = bukti
    }

    fun setStatus(status: String) {
        this.status = status
    }

}