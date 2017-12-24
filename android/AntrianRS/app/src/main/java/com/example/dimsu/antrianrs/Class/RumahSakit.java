package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 12/22/2017.
 */

public class RumahSakit {
    private String id_rs;
    private String nama_rs;
    private String alamat;
    private String akreditasi;

    public RumahSakit(){}
    public RumahSakit(String id_rs, String nama_rs, String alamat, String akreditasi){
        this.id_rs = id_rs;
        this.nama_rs = nama_rs;
        this.alamat = alamat;
        this.akreditasi = akreditasi;
    }
    public String ambilIdRS(){return id_rs;}
    public String ambilNamaRS(){return nama_rs;}
    public String ambilAlamatRS(){return alamat;}
    public String ambilAkreditasiRS(){return akreditasi;}
}
