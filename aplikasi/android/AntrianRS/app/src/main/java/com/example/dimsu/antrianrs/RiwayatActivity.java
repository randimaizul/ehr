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

                    if (!error){

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

                                        JSONObject asObj = array.getJSONObject(0);
                                        String id_rekam_medis = asObj.getString("id_rekam_medis");
                                        String keluhan_utama = asObj.getString("keluhan_utama");
                                        String riwayat_alergi = asObj.getString("riwayat_alergi");
                                        String tanda_vital = asObj.getString("tanda_vital");

                                        RekamMedis Rekmed = new RekamMedis(id_rekam_medis,keluhan_utama,riwayat_alergi,tanda_vital);

                                        Intent in = new Intent(RiwayatActivity.this, RekamMedisActivity.class);
                                        in.putExtra("id_pendaftaran", id_pendaftaran2);
                                        in.putExtra("id_rekam_medis", Rekmed.ambilIdRekMed());
                                        in.putExtra("keluhan_utama", Rekmed.ambilKeluhanUtama());
                                        in.putExtra("riwayat_alergi", Rekmed.ambilRiwayatAlergi());
                                        in.putExtra("tanda_vital", Rekmed.ambilTandaVital());

                                        RiwayatActivity.this.startActivity(in);

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
