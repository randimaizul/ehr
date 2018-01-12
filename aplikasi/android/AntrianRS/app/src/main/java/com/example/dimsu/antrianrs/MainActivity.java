package com.example.dimsu.antrianrs;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.example.dimsu.antrianrs.Helper.SessionManager;
import com.synnapps.carouselview.CarouselView;
import com.synnapps.carouselview.ImageListener;
import com.synnapps.carouselview.ViewListener;

public class MainActivity extends AppCompatActivity {

    private Button profil,berobat,riwayat;

    private String id_pasien;
    private String id_user;
    SessionManager sessionManager;

    CarouselView carouselView;

    int carouselImages[] = {R.drawable.ehr5,R.drawable.garis,R.drawable.operasi,R.drawable.vip};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        //getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        Bundle bundle = getIntent().getExtras();

        sessionManager = new SessionManager(this);

        id_user = sessionManager.getIDuser();
        id_pasien = sessionManager.getIDpasien();
        Toast.makeText(MainActivity.this, id_user, Toast.LENGTH_SHORT).show();
        Toast.makeText(MainActivity.this, id_pasien, Toast.LENGTH_SHORT).show();

        carouselView = (CarouselView) findViewById(R.id.carouselView);
        carouselView.setPageCount(carouselImages.length);
        carouselView.setImageListener(imageListener);

        profil = (Button) findViewById(R.id.btn_profil);
        berobat = (Button) findViewById(R.id.btn_registrasi);
        riwayat = (Button) findViewById(R.id.btn_riwayat);


        funcProfile();
        funcBerobat();
        funcRiwayat();
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

    @Override
    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.logout,menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
    switch (item.getItemId()){
        case R.id.menulogout:

            sessionManager = new SessionManager(MainActivity.this);
            sessionManager.logoutUser();

            return true;
        default:
            return super.onOptionsItemSelected(item);
    }
    }

    public void funcProfile(){
        profil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this,ProfileActivity.class);
                i.putExtra("id_pasien",id_pasien);
                i.putExtra("id_user",id_user);
                //Toast.makeText(MainActivity.this, id_user, Toast.LENGTH_SHORT).show();
                startActivity(i);
            }
        });
    }
    public void funcBerobat(){
        berobat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this,BerobatActivity.class);
                i.putExtra("id_pasien",id_pasien);
                i.putExtra("id_user",id_user);
                //Toast.makeText(MainActivity.this, id_pasien, Toast.LENGTH_SHORT).show();
                startActivity(i);
            }
        });
    }
    public void funcRiwayat(){
        riwayat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this,RiwayatActivity.class);
                i.putExtra("id_pasien",id_pasien);
                i.putExtra("id_user",id_user);
                startActivity(i);
            }
        });
    }

}
