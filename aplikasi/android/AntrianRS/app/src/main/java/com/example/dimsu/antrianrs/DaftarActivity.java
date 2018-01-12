package com.example.dimsu.antrianrs;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class DaftarActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener{

   // DatabaseHelper myDb;
    TextView inputNamaPasien,inputTempatLahir,inputTanggalLahir,inputNamaPoli, inputalamat, pilihDokter;
    Spinner inputNamaDokter;
    Button inputBooking;
    public String nama_pasien;
    public String tempat_lahir;
    public String tanggal_lahir;
    public String alamat;
    public String nama_poli;
    public String id_pasien;
    public String id_poli;
    private Spinner spinner;
    private ArrayList<String> nama_dokter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar);
       // myDb = new DatabaseHelper(this);

       // Bundle bundle = getIntent().getExtras();
        //idPasien = bundle.getInt("idPasien");
        //idPoli = bundle.getString("idPoli");

       // Intent intent = getIntent();
        //String kodePasien = intent.getStringExtra("kode_pasien");
        //String id_poli = intent.getStringExtra("idPoli");

        Bundle bundle = getIntent().getExtras();
        nama_pasien = bundle.getString("nama_pasien");
        tempat_lahir = bundle.getString("tempat_lahir");
        tanggal_lahir = bundle.getString("tanggal_lahir");
        alamat = bundle.getString("alamat");
        nama_poli = bundle.getString("nama_poli");
        id_pasien = bundle.getString("id_pasien");
        id_poli = bundle.getString("id_poli");

        inputNamaPasien = (TextView) findViewById(R.id.NamaPasien);
        inputalamat = (TextView) findViewById(R.id.alamat);
        inputTempatLahir = (TextView) findViewById(R.id.TempatLahir);
        inputTanggalLahir = (TextView) findViewById(R.id.TanggalLahir);
        inputNamaPoli = (TextView) findViewById(R.id.namaPoli);
        //inputNamaDokter = (Spinner) findViewById(R.id.namaDokter);
        pilihDokter = (TextView) findViewById(R.id.PilihDokter);

        inputBooking = (Button) findViewById(R.id.btn_booking);

        String NP = "Anda Akan Melakukan Booking Antrian di ";
        String Nama = "Nama : ";
        String TempatL = "Tempat Lahir : ";
        String TanggalL = "Tanggal Lahir : ";
        String Alamat = "Alamat : ";
        String PilihDokter = "Pilih Dokter Kepercayaan Anda !";
        inputNamaPoli.setText(String.valueOf(NP + nama_poli));
        inputNamaPasien.setText(String.valueOf(Nama + nama_pasien));
        inputTempatLahir.setText(String.valueOf(TempatL + tempat_lahir));
        inputTanggalLahir.setText(String.valueOf(TanggalL + tanggal_lahir));
        inputalamat.setText(String.valueOf(Alamat + alamat));
        pilihDokter.setText(String.valueOf(PilihDokter));

        nama_dokter = new ArrayList<String>();
        spinner = (Spinner) findViewById(R.id.namaDokter);
        getData();


       // nama_pasien = new ArrayList<String>();
        //bundle.putString("nama_pasien", nama_pasien.getText().toString());


        startBooking();

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
                        JSONArray result = new JSONArray(jsonResponse.getString("nama_dokter"));
                        for(int i=0;i<result.length();i++){
                            try {
                                nama_dokter.add(result.get(i).toString());
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                        }
                        spinner.setAdapter(new ArrayAdapter<String>(DaftarActivity.this, android.R.layout.simple_spinner_dropdown_item, nama_dokter));
                    }
                } catch (JSONException e1) {
                    e1.printStackTrace();
                }
            }
        };

        DaftarRequest daftarRequest = new DaftarRequest(id_poli, responseListener);
        RequestQueue queue = Volley.newRequestQueue(DaftarActivity.this);
        queue.add(daftarRequest);
    }

    private void startBooking() {
        inputBooking.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
//                boolean isInserted = myDb.insertDataDaftar(Integer.parseInt(inputIdPasien.getText().toString()),
//                        Integer.parseInt(inputIdPoli.getText().toString()),
//                        inputNamaPoli.getText().toString(),
//                        inputNamaDokter.getSelectedItem().toString());
//                if (isInserted) {
                    //Toast.makeText(getApplicationContext(), "Data Berhasil Disimpan", Toast.LENGTH_SHORT).show();

                   // Intent book = new Intent(DaftarActivity.this,BookingTest.class);
                    //Bundle extras = new Bundle();
                   // book.putExtra("nama_pasien",nama_pasien);
                   // book.putExtra("nama_poli",nama_poli);
                   // book.putExtra("id_pasien",id_pasien);
                   // book.putExtra("id_poli",id_poli);
                    //book.putExtra("nama_dokter",spinner.getSelectedItem().toString());
                    //extras.putString("extra_NamaPasien",inputNamaPasien.getText().toString());
                    //extras.putString("extra_NamaPoli",inputNamaPoli.getText().toString());
                    //extras.putString("extra_NamaDokter",spinner.getSelectedItem().toString());
                    //intent.putExtras(extras);
                    //startActivity(book);

                //Intent i = new Intent(MainActivity.this,PoliActivity.class);
                //i.putExtra("kode_pasien",kode_pasien);
                //startActivity(i);
                //}
//                else {
//                    Toast.makeText(getApplicationContext(), "Error While Insert, Check you Connection", Toast.LENGTH_SHORT).show();
//                }

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //ProgressDialog progressDialog = null;
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            boolean error = jsonResponse.getBoolean("error");

                            if (!error) {

                                String no_antrian = (String) jsonResponse.getJSONObject("user").getString("no_antrian");

                                Intent book = new Intent(DaftarActivity.this, BookingActivity.class);
                                book.putExtra("nama_pasien",nama_pasien);
                                book.putExtra("nama_poli",nama_poli);
                                book.putExtra("id_pasien",id_pasien);
                                book.putExtra("id_poli",id_poli);
                                book.putExtra("no_antrian",no_antrian);
                                book.putExtra("nama_dokter",spinner.getSelectedItem().toString());
                                //Toast.makeText(LoginActivity.this, "Berhasil", Toast.LENGTH_SHORT).show();

                                DaftarActivity.this.startActivity(book);

                            } //else {
                            //  builder.setMessage("Gagal Login");
                            //  builder.setNegativeButton("Ulangi", null);
                            // builder.show();

                            //}

                            //progressDialog.dismiss();

                        } catch (JSONException e) {
                            e.printStackTrace();
                            //progressDialog.dismiss();
                            Toast.makeText(DaftarActivity.this, "Gagal", Toast.LENGTH_SHORT).show();
                        }

                    }
                };

                //BookingRequest bookingRequest = new BookingRequest(id_pasien, id_poli, responseListener);
                //RequestQueue queue = Volley.newRequestQueue(DaftarActivity.this);
                //queue.add(bookingRequest);
            }
        });
    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        String nama_poli = String.valueOf(inputNamaPoli);
        if(nama_poli.contentEquals("Poli1")){
            List<String> gigi = Arrays.asList(getResources().getStringArray(R.array.PoliGigi));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,gigi);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
        if(nama_poli.contentEquals("Poli2")){
            List<String> mata = Arrays.asList(getResources().getStringArray(R.array.PoliMata));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,mata);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
        if(nama_poli.contentEquals("Poli3")){
            List<String> tht = Arrays.asList(getResources().getStringArray(R.array.PoliTHT));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,tht);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
        if(nama_poli.contentEquals("Poli4")){
            List<String> umum = Arrays.asList(getResources().getStringArray(R.array.PoliUmum));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,umum);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
        if(nama_poli.contentEquals("Poli5")){
            List<String> jantung = Arrays.asList(getResources().getStringArray(R.array.PoliJantung));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,jantung);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
        if(nama_poli.contentEquals("Poli6")){
            List<String> kulit = Arrays.asList(getResources().getStringArray(R.array.PoliKulit));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,kulit);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
        if(nama_poli.contentEquals("Poli7")){
            List<String> tulang = Arrays.asList(getResources().getStringArray(R.array.PoliTulang));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,tulang);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
        if(nama_poli.contentEquals("Poli8")){
            List<String> saraf = Arrays.asList(getResources().getStringArray(R.array.PoliSaraf));
            ArrayAdapter<String> dataAdapter = new ArrayAdapter<>(this,android.R.layout.simple_spinner_item,saraf);
            dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
            dataAdapter.notifyDataSetChanged();
            inputNamaDokter.setAdapter(dataAdapter);
        }
    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
}
