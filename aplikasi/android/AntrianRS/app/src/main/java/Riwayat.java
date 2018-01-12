/**
 * Created by Dimas Syuhada on 14/12/17.
 */

import java.util.ArrayList;


public class Riwayat {
    private String IdRiwayat, IdObat, IdPenanganan, tanggal;

    public Riwayat(){

    }
    public Riwayat(String id_Riwayat, String id_Obat, String id_Penanganan, String _tanggal){
        this.IdRiwayat = id_Riwayat;
        this.IdObat = id_Obat;
        this.IdPenanganan = id_Penanganan;
        this.tanggal = _tanggal;
    }

    public String getIdRiwayat(){
        return IdRiwayat;
    }
    public String getIdObat(){
        return IdObat;
    }
    public String getIdPenanganan(){
        return IdPenanganan;
    }
    public String getTanggal(){
        return tanggal;
    }
    public void setIdRiwayat(String id_Riwayat){
        this.IdRiwayat = id_Riwayat;
    }
    public void setIdObat(String id_obat){
        this.IdObat = id_obat;
    }
    public void setIdPenanganan(String id_penanganan){
        this.IdPenanganan = id_penanganan;
    }
    public void setTanggal(String _tanggal){
        this.tanggal = _tanggal;
    }


}
