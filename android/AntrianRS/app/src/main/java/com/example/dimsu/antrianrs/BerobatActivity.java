package com.example.dimsu.antrianrs;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.Spinner;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;
import com.example.dimsu.antrianrs.Class.Poli;
import com.example.dimsu.antrianrs.Class.RumahSakit;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class BerobatActivity extends AppCompatActivity {

    private Spinner spinnerPoli;
    private Spinner spinnerRS;
    private ArrayList<RumahSakit> nama_RS;
    private ArrayList<Poli> nama_Poli;
    //private ArrayList<String> nama_Poli;
    private ArrayList<String> nama_dokter;
    private RumahSakitSpinner adapterRS;
    private PoliSpinner adapterPoli;

    public String id_pasien;
    public String id_user2;
    Spinner inputRumahSakit;
    Spinner inputPoli;
    Spinner inputDokter;
    Button confirm;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_berobat);

        Bundle bundle = getIntent().getExtras();
        id_pasien = bundle.getString("id_pasien");
        id_user2 = bundle.getString("id_user");
        //inputRumahSakit = (Spinner) findViewById(R.id.idRumahSakit);
        nama_RS = new ArrayList<RumahSakit>();
        spinnerRS = (Spinner) findViewById(R.id.idRumahSakit);
        getRS();

        nama_Poli = new ArrayList<Poli>();
        spinnerPoli = (Spinner) findViewById(R.id.idPoli);
        getPoli();

        //inputPoli = (Spinner) findViewById(R.id.idPoli);
        inputDokter = (Spinner) findViewById(R.id.idDokter);
        confirm = (Button) findViewById(R.id.btnConfirm);


    }
    private void getRS(){

        Response.Listener<String> responseListener = new Response.Listener<String>(){

            @Override
            public void onResponse(String response) {
                JSONObject jsonResponse = null;
                boolean error = false;
                try {
                    jsonResponse = new JSONObject(response);
                    error = jsonResponse.getBoolean("error");

                    if (!error){
                        //JSONArray result = new JSONArray(jsonResponse.getString("jenis_asuransi"));
                        JSONObject result = new JSONObject(response);
                        JSONArray array = result.getJSONArray("rumah_sakit");

                        RumahSakit RumS = new RumahSakit("0","-- Pilih Rumah Sakit --","","");
                        nama_RS.add(RumS);

                        for(int i=0;i<array.length();i++){
                            //try {
                            //    jenis_asuransi.add(result.get(i).toString());
                            //} catch (JSONException e) {
                            //    e.printStackTrace();
                            //}
                            JSONObject asObj = array.getJSONObject(i);
                            String id_rs = asObj.getString("id_rs");
                            String nama_rs = asObj.getString("nama_rs");
                            String alamat = asObj.getString("alamat");
                            String akreditasi = asObj.getString("akreditasi");

                            RumahSakit Rum = new RumahSakit(id_rs, nama_rs, alamat, akreditasi);
                            nama_RS.add(Rum);


                        }
                        //spinner.setAdapter(new ArrayAdapter<String>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                        //spinner.setAdapter(new ArrayAdapter<Asuransi>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                        adapterRS = new RumahSakitSpinner(BerobatActivity.this,android.R.layout.simple_spinner_dropdown_item,nama_RS);
                        spinnerRS.setAdapter(adapterRS);
                    }
                } catch (JSONException e1) {
                    e1.printStackTrace();
                }
            }
        };

        RumahSakitRequest rumahsakitRequest = new RumahSakitRequest(id_pasien, responseListener);
        RequestQueue queue = Volley.newRequestQueue(BerobatActivity.this);
        queue.add(rumahsakitRequest);
    }

    private void getPoli(){
        //spinnerRS.setAdapter(adapterRS);

        spinnerRS.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {

            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                final RumahSakit id_rs = (RumahSakit) spinnerRS.getSelectedItem();

                Response.Listener<String> responseListener = new Response.Listener<String>(){

                    @Override
                    public void onResponse(String response) {
                        JSONObject jsonResponse = null;
                        boolean error = false;
                        try {
                            jsonResponse = new JSONObject(response);
                            error = jsonResponse.getBoolean("error");

                            if (!error){

                                nama_Poli.clear();

                                //JSONArray result = new JSONArray(jsonResponse.getString("jenis_asuransi"));
                                JSONObject result = new JSONObject(response);
                                JSONArray array = result.getJSONArray("poli");
                                //adapterPoli.clear(); // clear items

                                Poli Pol = new Poli("0","-- Pilih Poli --","");
                                nama_Poli.add(Pol);

                                //adapterPoli.notifyDataSetChanged(); // update spinner view

                                for(int i=0;i<array.length();i++){
                                    //try {
                                    //    jenis_asuransi.add(result.get(i).toString());
                                    //} catch (JSONException e) {
                                    //    e.printStackTrace();
                                    //}
                                    JSONObject asObj = array.getJSONObject(i);
                                    String id_poli = asObj.getString("id_poli");
                                    String nama_poli = asObj.getString("nama_poli");
                                    String keterangan = asObj.getString("keterangan");

                                    //adapterPoli.clear(); // clear items

                                    Poli Pols = new Poli(id_poli, nama_poli, keterangan);
                                    nama_Poli.add(Pols);

                                    //adapterPoli.notifyDataSetChanged(); // update spinner view

                                }
                                //spinner.setAdapter(new ArrayAdapter<String>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                                //spinner.setAdapter(new ArrayAdapter<Asuransi>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                                adapterPoli = new PoliSpinner(BerobatActivity.this,android.R.layout.simple_spinner_dropdown_item,nama_Poli);
                                spinnerPoli.setAdapter(adapterPoli);

                            }
                        } catch (JSONException e1) {
                            e1.printStackTrace();
                        }
                    }
                };


                Poli2Request poli2Request = new Poli2Request(id_rs.ambilIdRS(), responseListener);
                RequestQueue queue = Volley.newRequestQueue(BerobatActivity.this);
                queue.add(poli2Request);
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

                //adapterPoli.clear(); // clear items
                //adapterPoli.notifyDataSetChanged(); // update spinner view
            }
        });
                // masukin datanya setelah di klik disini tip
    }
}
