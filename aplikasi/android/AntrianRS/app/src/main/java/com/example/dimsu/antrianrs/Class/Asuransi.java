package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 12/22/2017.
 */

public class Asuransi {
    private String id_asuransi;
    private String jenis_asuransi;

    public Asuransi(){}
    public Asuransi(String id_asuransi, String jenis_asuransi){
        this.id_asuransi = id_asuransi;
        this.jenis_asuransi = jenis_asuransi;
    }
    public String ambilIdAsuransi(){return id_asuransi;}
    public String ambilJenisAsuransi(){return jenis_asuransi;}
}
