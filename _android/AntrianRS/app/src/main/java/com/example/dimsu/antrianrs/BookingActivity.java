package com.example.dimsu.antrianrs;

import android.content.Intent;
import android.icu.text.SimpleDateFormat;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.RequiresApi;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.TextView;

public class BookingActivity extends AppCompatActivity {


    TextView datetime, namapasien, namapoli, namadokter, noantrian, terimakasih;
    private String nama_pasien;
    private String nama_poli;
    private String nama_dokter;
    private String no_antrian;
    private String id_pasien;

    @RequiresApi(api = Build.VERSION_CODES.N)

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_booking);

        namapasien = (TextView) findViewById(R.id.namapasien);
        namapoli = (TextView) findViewById(R.id.namapoli);
        namadokter = (TextView) findViewById(R.id.namadokter);
        noantrian = (TextView) findViewById(R.id.noAntrian);
        terimakasih = (TextView) findViewById(R.id.thanks);

        datetime = (TextView) findViewById(R.id.datetime);

        long date = System.currentTimeMillis();

        SimpleDateFormat sdf = new SimpleDateFormat("MMM MM dd, yyyy h:mm a");
        String dateString = sdf.format(date);
        datetime.setText(dateString);

        //Intent intent = getIntent();
        //Bundle extras = intent.getExtras();
        Bundle bundle = getIntent().getExtras();
        //kode_pasien = bundle.getString("kode_pasien");
        nama_pasien = bundle.getString("nama_pasien");
        nama_poli = bundle.getString("nama_poli");
        nama_dokter = bundle.getString("nama_dokter");
        no_antrian = bundle.getString("no_antrian");
        id_pasien = bundle.getString("id_pasien");

        namapasien.setText(nama_pasien);
        namapoli.setText(nama_poli);
        namadokter.setText(nama_dokter);
        noantrian.setText(no_antrian);

        keAwal();

    }
    public void keAwal(){
        terimakasih.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(BookingActivity.this,MainActivity.class);
                i.putExtra("id_pasien",id_pasien);
                startActivity(i);
            }
        });
    }
}
