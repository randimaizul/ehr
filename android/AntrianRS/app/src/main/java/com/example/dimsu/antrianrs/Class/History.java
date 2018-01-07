package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 1/3/2018.
 */

public class History {
    private String id_pendaftaran;
    private String tanggal_pendaftaran;
    private String nama_RS;
    private String nama_Poli;

    public History(){}
    public History(String tanggal_pendaftaran, String nama_RS, String nama_Poli, String id_pendaftaran){
        this.tanggal_pendaftaran = tanggal_pendaftaran;
        this.nama_RS = nama_RS;
        this.nama_Poli = nama_Poli;
        this.id_pendaftaran = id_pendaftaran;
    }
    public String ambilTanggalHis(){return tanggal_pendaftaran;}
    public String ambilNamaRSHis(){return nama_RS;}
    public String ambilNamaPoliHis(){return nama_Poli;}
    public String ambilIdPendaftaranHis(){return id_pendaftaran;}
}
