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
    Spinner tesGD;
    Spinner tesAgama;
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
    public String tesgol;
    public String tesgam;
    private Spinner spinner;
    private ArrayList<Asuransi> jenis_asuransi;
    private AsuransiSpinner adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile_tes);

        Bundle bundle = getIntent().getExtras();
        id_pasien = bundle.getString("id_pasien");
        id_user2 = bundle.getString("id_user");

        tanggalLahirDP = (DatePicker) findViewById(R.id.tanggal_lahir_dp);
        int day = tanggalLahirDP.getDayOfMonth();
        int month = tanggalLahirDP.getMonth() + 1;
        int year = tanggalLahirDP.getYear();

        namaPasienET = (EditText) findViewById(R.id.nama_pasien_et);
        alamatET = (EditText) findViewById(R.id.alamat_et);
        noAsuransiET = (EditText) findViewById(R.id.no_asuransi_et);
        namaOrtuET = (EditText) findViewById(R.id.nama_orangtua_et);
        inputProfil = (Button) findViewById(R.id.btnConfirm);
        jenis_asuransi = new ArrayList<Asuransi>();
        spinner = (Spinner) findViewById(R.id.jenis_asuransi_sp);
        getAsuransi();
        tesAgama = (Spinner) findViewById(R.id.tesagama);
        getAgama();
        tesGD = (Spinner) findViewById(R.id.tesgoldar);
        getGoldar();
        insertProfile();
    }

    private void getGoldar(){
        tesGD.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

                tesgol = (String) tesGD.getSelectedItem();
                //Toast.makeText(getBaseContext(), tesgol.toString(),Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });
    }

    private void getAgama(){
        tesAgama.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

                tesgam = (String) tesAgama.getSelectedItem();
                //Toast.makeText(getBaseContext(), tesgam.toString(),Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });
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

                        JSONObject result = new JSONObject(response);
                        JSONArray array = result.getJSONArray("asuransi");

                        Asuransi asura = new Asuransi("0","-- Pilih Asuransi --");
                        jenis_asuransi.add(asura);

                        for(int i=0;i<array.length();i++){

                            JSONObject asObj = array.getJSONObject(i);
                            String id_as = asObj.getString("id_asuransi");
                            String jenis_as = asObj.getString("jenis_asuransi");
                            Asuransi asur = new Asuransi(id_as,jenis_as);
                            jenis_asuransi.add(asur);
                            
                        }

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
                final String agama = tesgam;
                final String nama_orangtua = namaOrtuET.getText().toString();
                final String golongan_darah = tesgol;
                final Asuransi id_asuransi = (Asuransi) spinner.getSelectedItem();
                final String tanggal_lahir = String.valueOf(tanggalLahirDP.getYear())+"-"+String.valueOf(tanggalLahirDP.getMonth()+1)+"-"+String.valueOf(tanggalLahirDP.getDayOfMonth());

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            boolean error = jsonResponse.getBoolean("error");

                            if (!error) {

                                Intent book = new Intent(ProfileActivity.this, MainActivity.class); //penting
                                book.putExtra("nama_pasien",nama_pasien); //penting
                                book.putExtra("id_pasien",id_pasien); //penting
                                book.putExtra("id_user",id_user); //penting

                                /* Untuk disable edit text
                                namaPasienET.setFocusable(false);
                                namaPasienET.setFocusableInTouchMode(false);
                                namaPasienET.setEnabled(false);
                                */

                                Toast.makeText(ProfileActivity.this, "Berhasil Input Profil", Toast.LENGTH_SHORT).show();

                                ProfileActivity.this.startActivity(book); //penting

                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
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
