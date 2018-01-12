package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 12/30/2017.
 */

public class Pendaftaran {
    private String id_pendaftaran;
    private String tanggal_pendaftaran;
    private String nomor_pendaftaran;
    private String id_pasien;
    private String nama_pasien;
    private String no_asuransi;
    private String nama_rs;
    private String nama_poli;
    private String nama_dokter;
    private String jenis_asuransi;

    public Pendaftaran(){}
    public Pendaftaran(String id_pendaftaran, String tanggal_pendaftaran,String nomor_pendaftaran, String id_pasien,String nama_pasien, String no_asuransi,String nama_rs, String nama_poli,String nama_dokter, String jenis_asuransi){
        this.id_pendaftaran = id_pendaftaran;
        this.tanggal_pendaftaran = tanggal_pendaftaran;
        this.nomor_pendaftaran = nomor_pendaftaran;
        this.id_pasien = id_pasien;
        this.nama_pasien = nama_pasien;
        this.no_asuransi = no_asuransi;
        this.nama_rs = nama_rs;
        this.nama_poli = nama_poli;
        this.nama_dokter = nama_dokter;
        this.jenis_asuransi = jenis_asuransi;
    }
    public String ambilIdPendaftaran(){return id_pendaftaran;}
    public String ambilTglPendaftaran(){return tanggal_pendaftaran;}
    public String ambilNoPendaftaran(){return nomor_pendaftaran;}
    public String ambilIdPasien(){return id_pasien;}
    public String ambilNamaPasien(){return nama_pasien;}
    public String ambilNoAsuransi(){return no_asuransi;}
    public String ambilNamaRS(){return nama_rs;}
    public String ambilNamaPoli(){return nama_poli;}
    public String ambilNamaDokter(){return nama_dokter;}
    public String ambilJenisAsuransi(){return jenis_asuransi;}
}
