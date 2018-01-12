package com.example.dimsu.antrianrs;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;
import com.example.dimsu.antrianrs.Class.History;
import com.example.dimsu.antrianrs.Class.RekamMedis;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class RiwayatActivity extends AppCompatActivity {

    private ArrayList<History> HistList;
    private RiwayatList adapterList;
    private ListView adaptList;

    private String id_pasien2;
    private String id_user2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_riwayat);

        HistList = new ArrayList<History>();
        adaptList = (ListView) findViewById(R.id.listID);

        Bundle bundle = getIntent().getExtras();
        id_pasien2 = bundle.getString("id_pasien");
        id_user2 = bundle.getString("id_user");

        getData();
        keRekmed();
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

                    //JSONObject jsonResponse = new JSONObject(response);
                    //boolean error = jsonResponse.getBoolean("error");

                    if (!error){
//                        String id_pendaftaran = (String) jsonResponse.getJSONObject("pendaftaran").getString("id_pendaftaran");
//                        String tanggal_pendaftaran = (String) jsonResponse.getJSONObject("pendaftaran").getString("tanggal_pendaftaran");
//                        String nomor_pendaftaran = (String) jsonResponse.getJSONObject("pendaftaran").getString("nomor_pendaftaran");
//                        String id_pasien = (String) jsonResponse.getJSONObject("pendaftaran").getString("id_pasien");
//                        String nama_pasien = (String) jsonResponse.getJSONObject("pendaftaran").getString("nama_pasien");
//                        String no_asuransi = (String) jsonResponse.getJSONObject("pendaftaran").getString("no_asuransi");
//                        String nama_rs = (String) jsonResponse.getJSONObject("pendaftaran").getString("nama_rs");
//                        String nama_poli = (String) jsonResponse.getJSONObject("pendaftaran").getString("nama_poli");
//                        String nama_dokter = (String) jsonResponse.getJSONObject("pendaftaran").getString("nama_dokter");
//                        String jenis_asuransi = (String) jsonResponse.getJSONObject("pendaftaran").getString("jenis_asuransi");
//
//                        String NamaPas = "Nama Anda : ";
//                        String NamaPol = "Poli : ";
//                        String NamaDok = "Dokter : ";
//                        String NamRS = "Rumah Sakit : ";
//                        String JenAs = "Asuransi Anda : ";
//                        String NoAs = "Nomor Asuransi : ";
//
//                        namapasien.setText(String.valueOf(NamaPas + nama_pasien));
//                        namapoli.setText(String.valueOf(NamaPol + nama_poli));
//                        namadokter.setText(String.valueOf(NamaDok + nama_dokter));
//                        nomorpendaftaran.setText(nomor_pendaftaran);
//                        jenisasuransi.setText(String.valueOf(JenAs + jenis_asuransi));
//                        noasuransi.setText(String.valueOf(NoAs + no_asuransi));
//                        namars.setText(String.valueOf(NamRS + nama_rs));


//                        inputNamaPoli.setText(String.valueOf(NP + nama_poli));

//                        JSONArray result = new JSONArray(jsonResponse.getString("jenis_asuransi"));
                        JSONObject result = new JSONObject(response);
                        JSONArray array = result.getJSONArray("history");

                        for(int i=0;i<array.length();i++){

                            JSONObject asObj = array.getJSONObject(i);
                            String tanggal_pendaftaran = asObj.getString("tanggal_pendaftaran");
                            String nama_rs = asObj.getString("nama_rs");
                            String nama_poli = asObj.getString("nama_poli");
                            String id_pendaftaran = asObj.getString("id_pendaftaran");



                            History listnya = new History(tanggal_pendaftaran,nama_rs, nama_poli, id_pendaftaran);
                            HistList.add(listnya);



                         }
                        //spinner.setAdapter(new ArrayAdapter<String>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                        //spinner.setAdapter(new ArrayAdapter<Asuransi>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                        //adapterRS = new RumahSakitSpinner(BerobatActivity.this,android.R.layout.simple_spinner_dropdown_item,nama_RS);
                        //spinnerRS.setAdapter(adapterRS);
                        adapterList = new RiwayatList(RiwayatActivity.this,HistList);
                        adaptList.setAdapter(adapterList);

                    }
                } catch (JSONException e1) {
                    e1.printStackTrace();
                }
            }
        };

        HistoryRequest historyRequest = new HistoryRequest(id_pasien2, responseListener);
        RequestQueue queue = Volley.newRequestQueue(RiwayatActivity.this);
        queue.add(historyRequest);
    }
    public void keRekmed(){

                adaptList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                    @Override
                    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                        // ListView Clicked item value
                        History  itemValue    = (History) adaptList.getItemAtPosition(position);
                        final String id_pendaftaran2 = itemValue.ambilIdPendaftaranHis();

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


                                        //Toast.makeText(RiwayatActivity.this, itemValue.ambilIdPendaftaranHis(), Toast.LENGTH_SHORT).show();

                                        RekamMedis Rekmed = new RekamMedis(id_rekam_medis,keluhan_utama,riwayat_alergi,tanda_vital);

                                        Intent in = new Intent(RiwayatActivity.this, RekamMedisActivity.class);
                                        in.putExtra("id_pendaftaran", id_pendaftaran2);
                                        in.putExtra("id_rekam_medis", Rekmed.ambilIdRekMed());
                                        in.putExtra("keluhan_utama", Rekmed.ambilKeluhanUtama());
                                        in.putExtra("riwayat_alergi", Rekmed.ambilRiwayatAlergi());
                                        in.putExtra("tanda_vital", Rekmed.ambilTandaVital());
                                        //i.putExtra("id_user", id_user2);
                                        RiwayatActivity.this.startActivity(in);


                                        //}

                                    }
                                } catch (JSONException e1) {
                                    e1.printStackTrace();
                                }
                            }
                        };

                        RekamMedisRequest rekammedisRequest = new RekamMedisRequest(id_pendaftaran2, responseListener);
                        RequestQueue queue = Volley.newRequestQueue(RiwayatActivity.this);
                        queue.add(rekammedisRequest);

                    }
                });

    }
}
