package com.example.dimsu.antrianrs;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.synnapps.carouselview.CarouselView;
import com.synnapps.carouselview.ImageListener;
import com.synnapps.carouselview.ViewListener;

public class MainActivity extends AppCompatActivity {

    private Button daftarPoli,rawatInap,ambilObat;

    private String id_pasien;

    CarouselView carouselView;

    int carouselImages[] = {R.drawable.hospital,R.drawable.ginjal,R.drawable.order};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);


        //Bundle bundle = getIntent().getExtras();
        //idPasien = bundle.getInt("idPasien");

        //Intent intent = getIntent();
        //String kodePasien = intent.getStringExtra("kode_pasien");

        Bundle bundle = getIntent().getExtras();
        id_pasien = bundle.getString("id_pasien");


        carouselView = (CarouselView) findViewById(R.id.carouselView);
        carouselView.setPageCount(carouselImages.length);
        carouselView.setImageListener(imageListener);

        daftarPoli = (Button) findViewById(R.id.btn_daftarpoli);
        rawatInap = (Button) findViewById(R.id.btn_rawatinap);
        ambilObat = (Button) findViewById(R.id.btn_ambilobat);


        funcDaftarPoli();
        funcRawatInap();
        funcAmbilObat();

    }



    ImageListener imageListener = new ImageListener() {
        @Override
        public void setImageForPosition(int position, ImageView imageView) {
            imageView.setImageResource(carouselImages[position]);
        }
    };

    ViewListener viewListener = new ViewListener() {
        @Override
        public View setViewForPosition(int position) {
            return getLayoutInflater().inflate(R.layout.view_carousel,null);
        }
    };

    @Override
    public void onResume() {
        super.onResume();
    }

    public void funcDaftarPoli(){
        daftarPoli.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this,PoliActivity.class);
                i.putExtra("id_pasien",id_pasien);
                startActivity(i);
            }
        });
    }
    public void funcRawatInap(){
        rawatInap.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getBaseContext(), "Fitur Rawat Inap", Toast.LENGTH_SHORT).show();
            }
        });
    }
    public void funcAmbilObat(){
        ambilObat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getBaseContext(), "Fitur Ambil Obat", Toast.LENGTH_SHORT).show();
            }
        });
    }

}
