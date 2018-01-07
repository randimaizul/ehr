package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 1/4/2018.
 */

public class Penanganan {
    private String id_penanganan;
    private String id_rekam_medis;
    private String jenis_penanganan;
    private String keterangan;
    private String nama_obat;
    private String jumlah;

    public Penanganan(){}
    public Penanganan(String id_penanganan, String id_rekam_medis, String jenis_penanganan, String keterangan, String nama_obat, String jumlah){
        this.id_penanganan = id_penanganan;
        this.id_rekam_medis = id_rekam_medis;
        this.jenis_penanganan = jenis_penanganan;
        this.keterangan = keterangan;
        this.nama_obat = nama_obat;
        this.jumlah = jumlah;
    }
    public String ambilIdPenanganan(){return id_penanganan;}
    public String ambilIdRekMed(){return id_rekam_medis;}
    public String ambilJenisPenanganan(){return jenis_penanganan;}
    public String ambilKeterangan(){return keterangan;}
    public String ambilNamaObat(){return nama_obat;}
    public String ambilJumlah(){return jumlah;}
}
