package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 12/22/2017.
 */

public class Dokter {
    private String id_dokter;
    private String nama_dokter;

    public Dokter(){}
    public Dokter(String id_dokter, String nama_dokter){
        this.id_dokter = id_dokter;
        this.nama_dokter = nama_dokter;
    }
    public String ambilIdDokter(){return id_dokter;}
    public String ambilNamaDokter(){return nama_dokter;}
}
