package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 1/4/2018.
 */
import android.content.Intent;
import android.icu.text.SimpleDateFormat;
import android.os.Build;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;
import com.example.dimsu.antrianrs.Class.Penanganan;
import com.example.dimsu.antrianrs.Class.RekamMedis;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class RekamMedisActivity extends AppCompatActivity{

    TextView keluhanUtama, riwayatAlergi, tandaVital,keterangan2,jenisPenanganan;
    private String keter;
    private String jenPen;
    //private String nama_dokter;
    //private String no_antrian;
    private String id_pasien2;
    private String nomor_pendaftaran2;
    private String id_pendaftaran2;
    private String keluhan;
    private String alergi;
    private String vital;
    private String id_user2;

    private ArrayList<Penanganan> PenList;
    private PenangananList adapterList;
    private ListView adaptList;
    private ArrayList<RekamMedis> Rekk;

    private String id_rekmed;
    String keterang = "Keterangan : ";
    String jenpe = "Jenis Penangananan : ";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rekammedis);

        keluhanUtama = (TextView) findViewById(R.id.txtKeluhan);
        riwayatAlergi = (TextView) findViewById(R.id.txtAlergi);
        tandaVital = (TextView) findViewById(R.id.txtVital);
        jenisPenanganan = (TextView) findViewById(R.id.txtpenanganan);
        keterangan2 = (TextView) findViewById(R.id.txtketerangan);


        PenList = new ArrayList<Penanganan>();
        adaptList = (ListView) findViewById(R.id.listIDPen);

        String KelTama = "Keluhan Utama : ";
        String RiwAl = "Riwayat Alergi : ";
        String TanVi = "Tanda Vital : ";

        Bundle bundle = getIntent().getExtras();

        id_pendaftaran2 = bundle.getString("id_pendaftaran");
        keluhan = bundle.getString("keluhan_utama");
        alergi = bundle.getString("riwayat_alergi");
        vital = bundle.getString("tanda_vital");
        id_rekmed = bundle.getString("id_rekam_medis");

        keluhanUtama.setText(String.valueOf(KelTama + keluhan));
        riwayatAlergi.setText(String.valueOf(RiwAl + alergi));
        tandaVital.setText(String.valueOf(TanVi + vital));

        //getData();
        //id_rekmed = this.Rekmed.ambilIdRekMed();
        //Toast.makeText(RekamMedisActivity.this, id_rekmed, Toast.LENGTH_SHORT).show();

        getPenanganan();
    }

    private void getData(){

        Response.Listener<String> responseListener = new Response.Listener<String>(){

            @Override
            public void onResponse(String response) {
                JSONObject jsonResponse = null;
                boolean error = false;
                try {
                    jsonResponse = new JSONObject(response);
                    error = jsonResponse.getBoolean("error");

                    if (!error){

                        JSONObject result = new JSONObject(response);
                        JSONArray array = result.getJSONArray("rekmed");

                        //for(int i=0;i<array.length();i++){

                            JSONObject asObj = array.getJSONObject(0);
                            String id_rekam_medis = asObj.getString("id_rekam_medis");
                            String keluhan_utama = asObj.getString("keluhan_utama");
                            String riwayat_alergi = asObj.getString("riwayat_alergi");
                            String tanda_vital = asObj.getString("tanda_vital");
                            //Toast.makeText(RekamMedisActivity.this, id_rekam_medis, Toast.LENGTH_SHORT).show();
                            //Toast.makeText(RekamMedisActivity.this, keluhan_utama, Toast.LENGTH_SHORT).show();
                            //Toast.makeText(RekamMedisActivity.this, riwayat_alergi, Toast.LENGTH_SHORT).show();
                            //Toast.makeText(RekamMedisActivity.this, tanda_vital, Toast.LENGTH_SHORT).show();




                            RekamMedis Rekmed = new RekamMedis(id_rekam_medis,keluhan_utama,riwayat_alergi,tanda_vital);

                            //Rekk.add(Rekmed);


                        //}

                    }
                } catch (JSONException e1) {
                    e1.printStackTrace();
                }
            }
        };

        RekamMedisRequest rekammedisRequest = new RekamMedisRequest(id_pendaftaran2, responseListener);
        RequestQueue queue = Volley.newRequestQueue(RekamMedisActivity.this);
        queue.add(rekammedisRequest);
    }

    private void getPenanganan(){

        Response.Listener<String> responseListener = new Response.Listener<String>(){

            @Override
            public void onResponse(String response) {
                JSONObject jsonResponse = null;
                boolean error = false;
                try {
                    jsonResponse = new JSONObject(response);
                    error = jsonResponse.getBoolean("error");

                    if (!error){

                        JSONObject result = new JSONObject(response);
                        JSONArray array = result.getJSONArray("penanganan");

                        for(int i=0;i<array.length();i++){

                            JSONObject asObj = array.getJSONObject(i);
                            String id_penanganan = asObj.getString("id_penanganan");
                            String id_rekam_medis = asObj.getString("id_rekam_medis");
                            String jenis_penanganan = asObj.getString("jenis_penanganan");
                            String keterangan = asObj.getString("keterangan");
                            String nama_obat = asObj.getString("nama_obat");
                            String jumlah = asObj.getString("jumlah");



                            Penanganan listnya = new Penanganan(id_penanganan,id_rekam_medis, jenis_penanganan, keterangan, nama_obat, jumlah);
                            PenList.add(listnya);

                            jenisPenanganan.setText(String.valueOf(jenpe+ listnya.ambilJenisPenanganan()));
                            keterangan2.setText(String.valueOf(keterang + listnya.ambilKeterangan()));


                        }

                        adapterList = new PenangananList(RekamMedisActivity.this,PenList);
                        adaptList.setAdapter(adapterList);

                    }
                } catch (JSONException e1) {
                    e1.printStackTrace();
                }
            }
        };

        PenangananRequest penangananRequest = new PenangananRequest(id_rekmed, responseListener);
        RequestQueue queue = Volley.newRequestQueue(RekamMedisActivity.this);
        queue.add(penangananRequest);
    }

}
