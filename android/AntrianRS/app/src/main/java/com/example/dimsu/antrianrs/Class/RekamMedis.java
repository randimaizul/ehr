package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 1/3/2018.
 */

public class RekamMedis {
    private String id_rekam_medis;
    private String keluhan_utama;
    private String riwayat_alergi;
    private String tanda_vital;

    public RekamMedis(){}
    public RekamMedis(String id_rekam_medis, String keluhan_utama, String riwayat_alergi, String tanda_vital){
        this.id_rekam_medis = id_rekam_medis;
        this.keluhan_utama = keluhan_utama;
        this.riwayat_alergi = riwayat_alergi;
        this.tanda_vital = tanda_vital;
    }
    public String ambilIdRekMed(){return id_rekam_medis;}
    public String ambilKeluhanUtama(){return keluhan_utama;}
    public String ambilRiwayatAlergi(){return riwayat_alergi;}
    public String ambilTandaVital(){return tanda_vital;}
}
