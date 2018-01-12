package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 1/11/2018.
 */

public class Obat {
    private String id_obat;
    private String nama_obat;
    private String jenis_obat;
    private String ukuran_obat;
    private String harga_obat;

    public Obat(){}
    public Obat(String id_obat, String nama_obat,String jenis_obat, String ukuran_obat,String harga_obat){
        this.id_obat = id_obat;
        this.nama_obat = nama_obat;
        this.jenis_obat = jenis_obat;
        this.ukuran_obat = ukuran_obat;
        this.harga_obat = harga_obat;
    }
    //public String ambilIdAsuransi(){return id_asuransi;}
    //public String ambilJenisAsuransi(){return id_pasien;}
}
