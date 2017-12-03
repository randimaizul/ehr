package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 5/28/2017.
 */
import android.content.Intent;
import android.icu.text.SimpleDateFormat;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.RequiresApi;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class BookingTest extends AppCompatActivity {


    TextView datetime, namapasien, namapoli, antrian, namadokter;
    private String nama_pasien;
    private String nama_poli;
    private String id_poli;
    private String nama_dokter;
    private String id_pasien;
    private String no_antrian;
    private Button kembali;

    //@RequiresApi(api = Build.VERSION_CODES.N)

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_booking_test);

        namapasien = (TextView) findViewById(R.id.NamaPasien);
        namapoli = (TextView) findViewById(R.id.namaPoli);
        antrian = (TextView) findViewById(R.id.no_antrian);
        namadokter = (TextView) findViewById(R.id.NamaDokter);
        kembali = (Button) findViewById(R.id.btn_OK);

//        datetime = (TextView) findViewById(R.id.datetime);
//
//        long date = System.currentTimeMillis();
//
//        SimpleDateFormat sdf = new SimpleDateFormat("MMM MM dd, yyyy h:mm a");
//        String dateString = sdf.format(date);
//        datetime.setText(dateString);

        //Intent intent = getIntent();
        //Bundle extras = intent.getExtras();
        Bundle bundle = getIntent().getExtras();
        //kode_pasien = bundle.getString("kode_pasien");
        nama_pasien = bundle.getString("nama_pasien");
        nama_poli = bundle.getString("nama_poli");
        id_pasien = bundle.getString("id_pasien");
        nama_dokter = bundle.getString("nama_dokter");
        id_poli = bundle.getString("id_poli");
        no_antrian = bundle.getString("no_antrian");

        namapasien.setText(nama_pasien);
        namapoli.setText(nama_poli);
        namadokter.setText(nama_dokter);
        antrian.setText(no_antrian);

        keAwal();

    }

    public void keAwal(){
        kembali.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(BookingTest.this,MainActivity.class);
                i.putExtra("id_pasien",id_pasien);
                startActivity(i);
            }
        });
    }
}
