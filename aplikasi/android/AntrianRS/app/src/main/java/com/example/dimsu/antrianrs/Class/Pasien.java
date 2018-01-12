package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 1/10/2018.
 */

public class Pasien {
    private String id_pasien;
    private String id_asuransi;
    private String nama_pasien;
    private String alamat;
    private String no_asuransi;
    private String tanggal_lahir;
    private String no_telepon;
    private String agama;
    private String nama_orangtua;
    private String golongan_darah;

    public Pasien(){}
    public Pasien(String id_pasien, String id_asuransi,String nama_pasien, String alamat,String no_asuransi, String tanggal_lahir,String no_telepon, String agama,String nama_orangtua, String golongan_darah){
        this.id_pasien = id_pasien;
        this.id_asuransi = id_asuransi;
        this.nama_pasien = nama_pasien;
        this.alamat = alamat;
        this.no_asuransi = no_asuransi;
        this.tanggal_lahir = tanggal_lahir;
        this.no_telepon = no_telepon;
        this.agama = agama;
        this.nama_orangtua = nama_orangtua;
        this.golongan_darah = golongan_darah;
    }
    //public String ambilIdAsuransi(){return id_asuransi;}
    //public String ambilJenisAsuransi(){return id_pasien;}
}
