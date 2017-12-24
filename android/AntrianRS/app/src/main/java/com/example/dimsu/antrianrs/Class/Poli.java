package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 12/22/2017.
 */

public class Poli {
    private String id_poli;
    private String nama_poli;
    private String keterangan;

    public Poli(){}
    public Poli(String id_poli, String nama_poli, String keterangan){
        this.id_poli = id_poli;
        this.nama_poli = nama_poli;
        this.keterangan = keterangan;
    }
    public String ambilIdPoli(){return id_poli;}
    public String ambilNamaPoli(){return nama_poli;}
    public String ambilKeterangan(){return keterangan;}
}
