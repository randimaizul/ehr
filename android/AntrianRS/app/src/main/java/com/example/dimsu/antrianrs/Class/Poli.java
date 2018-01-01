package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 12/22/2017.
 */

public class Poli {
    private String id_poli;
    private String nama_poli;
    private String keterangan;
    private String id_rs_poli;

    public Poli(){}
    public Poli(String id_poli, String nama_poli, String keterangan, String id_rs_poli){
        this.id_poli = id_poli;
        this.nama_poli = nama_poli;
        this.keterangan = keterangan;
        this.id_rs_poli = id_rs_poli;
    }
    public String ambilIdPoli(){return id_poli;}
    public String ambilNamaPoli(){return nama_poli;}
    public String ambilKeterangan(){return keterangan;}
    public String ambilIdRSPoli(){return id_rs_poli;}
}
