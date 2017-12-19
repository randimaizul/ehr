package com.example.dimsu.antrianrs;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Spinner;

import java.util.ArrayList;

public class BerobatActivity extends AppCompatActivity {

    private Spinner spinner;
    private ArrayList<String> nama_RumahSakit;
    private ArrayList<String> nama_Poli;
    private ArrayList<String> nama_dokter;

    Spinner inputRumahSakit;
    Spinner inputPoli;
    Spinner inputDokter;
    Button confirm;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_berobat);

        inputRumahSakit = (Spinner) findViewById(R.id.idRumahSakit);
        inputPoli = (Spinner) findViewById(R.id.idPoli);
        inputDokter = (Spinner) findViewById(R.id.idDokter);
        confirm = (Button) findViewById(R.id.btnConfirm);

        startBooking();

    }

    private void startBooking(){
        confirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // masukin datanya setelah di klik disini tip


            }
        });
    }
}
