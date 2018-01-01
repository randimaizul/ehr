package com.example.dimsu.antrianrs;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;
import com.example.dimsu.antrianrs.Class.Dokter;
import com.example.dimsu.antrianrs.Class.Poli;
import com.example.dimsu.antrianrs.Class.RumahSakit;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class BerobatActivity extends AppCompatActivity {

    TextView inpRS,inpPoli, inpDok;
    private Spinner spinnerPoli;
    private Spinner spinnerRS;
    private Spinner spinnerDok;
    private ArrayList<RumahSakit> nama_RS;
    private ArrayList<Poli> nama_Poli;
    private ArrayList<Dokter> nama_Dokter;
    //private ArrayList<String> nama_Poli;
    //private ArrayList<String> nama_dokter;
    private RumahSakitSpinner adapterRS;
    private PoliSpinner adapterPoli;
    private DokterSpinner adapterDokter;

    public String id_pasien2;
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
        id_pasien2 = bundle.getString("id_pasien");
        id_user2 = bundle.getString("id_user");

        //String RSakit = "Rumah Sakit : ";
        //String PoliKli = "Poli : ";
        //String Dokst = "Dokter : ";




        //inputRumahSakit = (Spinner) findViewById(R.id.idRumahSakit);
        //inpRS.setText(String.valueOf(RSakit));
        nama_RS = new ArrayList<RumahSakit>();
        spinnerRS = (Spinner) findViewById(R.id.idRumahSakit);
        getRS();

        //inpPoli.setText(String.valueOf(PoliKli));
        nama_Poli = new ArrayList<Poli>();
        spinnerPoli = (Spinner) findViewById(R.id.idPoli);
        getPoli();

        //inputPoli = (Spinner) findViewById(R.id.idPoli);

        //inpDok.setText(String.valueOf(Dokst));
        nama_Dokter = new ArrayList<Dokter>();
        spinnerDok = (Spinner) findViewById(R.id.idDokter);
        getDokter();
        //inputDokter = (Spinner) findViewById(R.id.idDokter);
        confirm = (Button) findViewById(R.id.btnConfirm);
        insertPendaftaran();


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

        RumahSakitRequest rumahsakitRequest = new RumahSakitRequest(id_pasien2, responseListener);
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
                                nama_Dokter.clear();

                                //JSONArray result = new JSONArray(jsonResponse.getString("jenis_asuransi"));
                                JSONObject result = new JSONObject(response);
                                JSONArray array = result.getJSONArray("poli");
                                //adapterPoli.clear(); // clear items

                                Poli Pol = new Poli("0","-- Pilih Poli --","","");
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
                                    String id_rs_poli = asObj.getString("id_rs_poli");

                                    //adapterPoli.clear(); // clear items

                                    Poli Pols = new Poli(id_poli, nama_poli, keterangan, id_rs_poli);
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
    }
    private void getDokter(){

        spinnerPoli.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {

            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                final Poli id_poli = (Poli) spinnerPoli.getSelectedItem();
                Toast.makeText(BerobatActivity.this, id_poli.ambilIdRSPoli(), Toast.LENGTH_SHORT).show();

                Response.Listener<String> responseListener = new Response.Listener<String>(){

                    @Override
                    public void onResponse(String response) {
                        JSONObject jsonResponse = null;
                        boolean error = false;
                        try {
                            jsonResponse = new JSONObject(response);
                            error = jsonResponse.getBoolean("error");

                            if (!error){

                                nama_Dokter.clear();

                                //JSONArray result = new JSONArray(jsonResponse.getString("jenis_asuransi"));
                                JSONObject result = new JSONObject(response);
                                JSONArray array = result.getJSONArray("dokter");
                                //adapterPoli.clear(); // clear items

                                Dokter Dok = new Dokter("0","-- Pilih Dokter --");
                                nama_Dokter.add(Dok);

                                //adapterPoli.notifyDataSetChanged(); // update spinner view

                                for(int i=0;i<array.length();i++){
                                    //try {
                                    //    jenis_asuransi.add(result.get(i).toString());
                                    //} catch (JSONException e) {
                                    //    e.printStackTrace();
                                    //}
                                    JSONObject asObj = array.getJSONObject(i);
                                    String id_dokter = asObj.getString("id_dokter");
                                    String nama_dokter = asObj.getString("nama_dokter");

                                    //adapterPoli.clear(); // clear items

                                    Dokter Doks = new Dokter(id_dokter, nama_dokter);
                                    nama_Dokter.add(Doks);

                                    //adapterPoli.notifyDataSetChanged(); // update spinner view

                                }
                                //spinner.setAdapter(new ArrayAdapter<String>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                                //spinner.setAdapter(new ArrayAdapter<Asuransi>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                                adapterDokter = new DokterSpinner(BerobatActivity.this,android.R.layout.simple_spinner_dropdown_item,nama_Dokter);
                                spinnerDok.setAdapter(adapterDokter);

                            }
                        } catch (JSONException e1) {
                            e1.printStackTrace();
                        }
                    }
                };


                Dokter2Request dokter2Request = new Dokter2Request(id_poli.ambilIdPoli(), responseListener);
                RequestQueue queue = Volley.newRequestQueue(BerobatActivity.this);
                queue.add(dokter2Request);
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

                //adapterPoli.clear(); // clear items
                //adapterPoli.notifyDataSetChanged(); // update spinner view
            }
        });
        // masukin datanya setelah di klik disini tip
    }

    private void insertPendaftaran() {
        confirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final RumahSakit id_rs = (RumahSakit) spinnerRS.getSelectedItem();
                final Poli id_poli = (Poli) spinnerPoli.getSelectedItem();
                final Dokter id_dokter = (Dokter) spinnerDok.getSelectedItem();
                final String id_user = id_user2;
                final String id_pasien = id_pasien2;

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //ProgressDialog progressDialog = null;
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            boolean error = jsonResponse.getBoolean("error");

                            if (!error) {

                                //String no_antrian = (String) jsonResponse.getJSONObject("user").getString("no_antrian");

                                String nomor_pendaftaran = (String) jsonResponse.getJSONObject("user").getString("nomor_pendaftaran");
                                String id_pendaftaran = (String) jsonResponse.getJSONObject("user").getString("id_pendaftaran");

                                Intent book = new Intent(BerobatActivity.this, BookingActivity.class); //penting
                                book.putExtra("nomor_pendaftaran",nomor_pendaftaran); //penting
                                book.putExtra("id_pendaftaran",id_pendaftaran); //penting
                                book.putExtra("id_pasien",id_pasien); //penting

                                //book.putExtra("id_user",id_user);
                                //book.putExtra("jenis_asuransi",spinner.getSelectedItem().toString());
                                Toast.makeText(BerobatActivity.this, "Berhasil", Toast.LENGTH_SHORT).show();

                                BerobatActivity.this.startActivity(book); //penting

                            } //else {
                            //  builder.setMessage("Gagal Login");
                            //  builder.setNegativeButton("Ulangi", null);
                            // builder.show();

                            //}

                            //progressDialog.dismiss();

                        } catch (JSONException e) {
                            e.printStackTrace();
                            //progressDialog.dismiss();
                            Toast.makeText(BerobatActivity.this, "Gagal", Toast.LENGTH_SHORT).show();
                        }

                    }
                };

                PendaftaranRequest pendaftaranRequest = new PendaftaranRequest(id_pasien,id_poli.ambilIdRSPoli(),id_dokter.ambilIdDokter(), responseListener);
                RequestQueue queue = Volley.newRequestQueue(BerobatActivity.this);
                queue.add(pendaftaranRequest);
            }
        });
    }
}
