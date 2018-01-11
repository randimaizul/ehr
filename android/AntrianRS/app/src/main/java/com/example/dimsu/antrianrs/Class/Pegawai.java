package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 1/11/2018.
 */

public class Pegawai {
    private String id_pegawai;
    private String id_rs;
    private String id_user;
    private String nrp;
    private String nama_pegawai;
    private String alamat;
    private String no_telepon;
    private String tgl_masuk;

    public Pegawai(){}
    public Pegawai(String id_pegawai, String id_rs,String id_user, String nrp,String nama_pegawai, String alamat,String no_telepon, String tgl_masuk){
        this.id_pegawai = id_pegawai;
        this.id_rs = id_rs;
        this.id_user = id_user;
        this.nrp = nrp;
        this.nama_pegawai = nama_pegawai;
        this.alamat = alamat;
        this.no_telepon = no_telepon;
        this.tgl_masuk = tgl_masuk;
    }
    //public String ambilIdAsuransi(){return id_asuransi;}
    //public String ambilJenisAsuransi(){return id_pasien;}
}
