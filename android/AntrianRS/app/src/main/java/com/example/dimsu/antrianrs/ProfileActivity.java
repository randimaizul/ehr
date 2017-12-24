package com.example.dimsu.antrianrs;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Intent;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.DatePicker;
import java.text.SimpleDateFormat;
import java.util.Calendar;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;
import com.example.dimsu.antrianrs.Class.Asuransi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class ProfileActivity extends AppCompatActivity {

    TextView input_nama_pasien,input_tanggal_lahir,input_alamat,input_no_asuransi,input_agama,input_nama_ortu,input_goldar;
    EditText namaPasienET,alamatET,noAsuransiET,agamaET,namaOrtuET,goldarET;
    DatePicker tanggalLahirDP;
    Spinner asuransiSP;
    Button inputProfil;
    public String nama_pasien;
    public String no_asuransi;
    public String tanggal_lahir;
    public String alamat;
    public String agama;
    public String id_pasien;
    public String id_user2;
    public String nama_orang_tua;
    public String golongan_darah;
    private Spinner spinner;
    private ArrayList<Asuransi> jenis_asuransi;
    private AsuransiSpinner adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile_tes);

        //input_nama_pasien = (TextView) findViewById(R.id.input_nama_pasien);
        Bundle bundle = getIntent().getExtras();
        id_pasien = bundle.getString("id_pasien");
        id_user2 = bundle.getString("id_user");

        tanggalLahirDP = (DatePicker) findViewById(R.id.tanggal_lahir_dp);
        int day = tanggalLahirDP.getDayOfMonth();
        int month = tanggalLahirDP.getMonth() + 1;
        int year = tanggalLahirDP.getYear();


        //SimpleDateFormat dateFormatter = new SimpleDateFormat("MM-dd-yyyy");
        //Calendar c = Calendar.getInstance();
        //c.set(year, month, day);

        namaPasienET = (EditText) findViewById(R.id.nama_pasien_et);
        alamatET = (EditText) findViewById(R.id.alamat_et);
        noAsuransiET = (EditText) findViewById(R.id.no_asuransi_et);
        agamaET = (EditText) findViewById(R.id.agama_et);
        namaOrtuET = (EditText) findViewById(R.id.nama_orangtua_et);
        goldarET = (EditText) findViewById(R.id.goldar_et);
        inputProfil = (Button) findViewById(R.id.btnConfirm);
        jenis_asuransi = new ArrayList<Asuransi>();
        spinner = (Spinner) findViewById(R.id.jenis_asuransi_sp);
        getAsuransi();
        insertProfile();
    }

    private void getAsuransi(){
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
                        JSONArray array = result.getJSONArray("asuransi");

                        Asuransi asura = new Asuransi("0","Pilih Asuransi");
                        jenis_asuransi.add(asura);

                        for(int i=0;i<array.length();i++){
                            //try {
                            //    jenis_asuransi.add(result.get(i).toString());
                            //} catch (JSONException e) {
                            //    e.printStackTrace();
                            //}
                            JSONObject asObj = array.getJSONObject(i);
                            String id_as = asObj.getString("id_asuransi");
                            String jenis_as = asObj.getString("jenis_asuransi");
                            Asuransi asur = new Asuransi(id_as,jenis_as);
                            jenis_asuransi.add(asur);
                            
                        }
                        //spinner.setAdapter(new ArrayAdapter<String>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                        //spinner.setAdapter(new ArrayAdapter<Asuransi>(ProfileActivity.this, android.R.layout.simple_spinner_dropdown_item, jenis_asuransi));
                        adapter = new AsuransiSpinner(ProfileActivity.this,android.R.layout.simple_spinner_dropdown_item,jenis_asuransi);
                        spinner.setAdapter(adapter);
                    }
                } catch (JSONException e1) {
                    e1.printStackTrace();
                }
            }
        };

        AsuransiRequest asuransiRequest = new AsuransiRequest(id_pasien, responseListener);
        RequestQueue queue = Volley.newRequestQueue(ProfileActivity.this);
        queue.add(asuransiRequest);
    }
    private void insertProfile() {
        inputProfil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String nama_pasien = namaPasienET.getText().toString();
                final String id_user = id_user2;
                final String alamat = alamatET.getText().toString();
                final String no_asuransi = noAsuransiET.getText().toString();
                final String agama = agamaET.getText().toString();
                final String nama_orangtua = namaOrtuET.getText().toString();
                final String golongan_darah = goldarET.getText().toString();
                final Asuransi id_asuransi = (Asuransi) spinner.getSelectedItem();
                final String tanggal_lahir = String.valueOf(tanggalLahirDP.getYear())+"-"+String.valueOf(tanggalLahirDP.getMonth()+1)+"-"+String.valueOf(tanggalLahirDP.getDayOfMonth());

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //ProgressDialog progressDialog = null;
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            boolean error = jsonResponse.getBoolean("error");

                            if (!error) {

                                //String no_antrian = (String) jsonResponse.getJSONObject("user").getString("no_antrian");

                                Intent book = new Intent(ProfileActivity.this, MainActivity.class); //penting
                                book.putExtra("nama_pasien",nama_pasien); //penting
                                book.putExtra("id_pasien",id_pasien); //penting

                                /* Untuk disable edit text
                                namaPasienET.setFocusable(false);
                                namaPasienET.setFocusableInTouchMode(false);
                                namaPasienET.setEnabled(false);
                                */

                                //book.putExtra("id_user",id_user);
                                //book.putExtra("jenis_asuransi",spinner.getSelectedItem().toString());
                                Toast.makeText(ProfileActivity.this, "Berhasil", Toast.LENGTH_SHORT).show();

                                ProfileActivity.this.startActivity(book); //penting

                            } //else {
                            //  builder.setMessage("Gagal Login");
                            //  builder.setNegativeButton("Ulangi", null);
                            // builder.show();

                            //}

                            //progressDialog.dismiss();

                        } catch (JSONException e) {
                            e.printStackTrace();
                            //progressDialog.dismiss();
                            Toast.makeText(ProfileActivity.this, "Gagal", Toast.LENGTH_SHORT).show();
                        }

                    }
                };

                ProfileRequest profileRequest = new ProfileRequest(id_asuransi.ambilIdAsuransi(),nama_pasien,alamat,id_user,no_asuransi,tanggal_lahir,agama,nama_orangtua,golongan_darah, responseListener);
                RequestQueue queue = Volley.newRequestQueue(ProfileActivity.this);
                queue.add(profileRequest);
            }
        });
    }
}
