package com.example.dimsu.antrianrs;

import android.app.DialogFragment;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.GestureDetector;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;
import com.example.dimsu.antrianrs.Class.Poli;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

//kalo masi notresourcefound, gausa pake recyclerview, ganti jadi button aja

public class PoliActivity extends AppCompatActivity {

    public int idCount;
    public String nama_poli;
    public String id_poli;
    private RecyclerView recyclerView;

    private String id_pasien;

    private List<Poli> poliList;
    private ProgressDialog progressDialog;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_poli);

        //Bundle bundle = getIntent().getExtras();
        //idPasien = bundle.getInt("idPasien");

        //Intent intent = getIntent();
        //String kodePasien = intent.getStringExtra("kode_pasien");

        Bundle bundle = getIntent().getExtras();
        id_pasien = bundle.getString("id_pasien");

        recyclerView = (RecyclerView) findViewById(R.id.rv2);

        initializeData();
        initializeAdapter();

        LinearLayoutManager llm = new LinearLayoutManager(this);
        recyclerView.setLayoutManager(llm);
        recyclerView.setHasFixedSize(true);
        recyclerView.setItemAnimator(new DefaultItemAnimator());

        recyclerView.addOnItemTouchListener(new RecyclerTouchListener(this,recyclerView, new ClickListener() {
            @Override
            public void onClick(View view, final int position) {
                //Intent ke form dengan membawa id Polinya
                idCount = position+1;
                //pilih nilai rownya, untuk menentukan poli apa yang dipilih;
                switch(idCount){
                    case 1:
                        nama_poli = "Poli Umum";
                        id_poli = "1";
                        break;
                    case 2:
                        nama_poli = "Poli Gigi";
                        id_poli = "2";
                        break;
                    case 3:
                        nama_poli = "Poli Jantung";
                        id_poli = "3";
                        break;
                    case 4:
                        nama_poli = "Poli Kulit";
                        id_poli = "4";
                        break;
                    case 5:
                        nama_poli = "Poli Mata";
                        id_poli = "5";
                        break;
                    case 6:
                        nama_poli = "Poli THT";
                        id_poli = "6";
                        break;
                    case 7:
                        nama_poli = "Poli Tulang";
                        id_poli = "7";
                        break;
                    case 8:
                        nama_poli = "Poli Saraf";
                        id_poli = "8";
                        break;
                    default:
                        nama_poli = "Poli1";
                        break;
                }
                //setelah mendapatkan id poli, kirimkan nilainya ke activity daftar
                //Intent intent = new Intent(PoliActivity.this,DaftarActivity.class);
                //intent.putExtra("idPoli",idPoli);
                //intent.putExtra("kode_pasien",kode_pasien);
                //startActivity(intent);

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //ProgressDialog progressDialog = null;
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            boolean error = jsonResponse.getBoolean("error");

                            if (!error) {

                                String nama_pasien = (String) jsonResponse.getJSONObject("user").getString("nama_pasien");
                                String tempat_lahir = (String) jsonResponse.getJSONObject("user").getString("tempat_lahir");
                                String alamat = (String) jsonResponse.getJSONObject("user").getString("alamat");
                                String tanggal_lahir = (String) jsonResponse.getJSONObject("user").getString("tanggal_lahir");

                                Intent inmain = new Intent(PoliActivity.this, DaftarActivity.class);
                                inmain.putExtra("nama_pasien", nama_pasien);
                                inmain.putExtra("tempat_lahir", tempat_lahir);
                                inmain.putExtra("alamat", alamat);
                                inmain.putExtra("tanggal_lahir", tanggal_lahir);
                                inmain.putExtra("nama_poli",nama_poli);
                                inmain.putExtra("id_pasien",id_pasien);
                                inmain.putExtra("id_poli",id_poli);
                                //Toast.makeText(LoginActivity.this, "Berhasil", Toast.LENGTH_SHORT).show();

                                PoliActivity.this.startActivity(inmain);

                            } //else {
                              //  builder.setMessage("Gagal Login");
                              //  builder.setNegativeButton("Ulangi", null);
                               // builder.show();

                            //}

                            //progressDialog.dismiss();

                        } catch (JSONException e) {
                            e.printStackTrace();
                            //progressDialog.dismiss();
                            Toast.makeText(PoliActivity.this, "Gagal", Toast.LENGTH_SHORT).show();
                        }

                    }
                };

                PoliRequest poliRequest = new PoliRequest(id_pasien, responseListener);
                RequestQueue queue = Volley.newRequestQueue(PoliActivity.this);
                queue.add(poliRequest);



            }

            @Override
            public void onLongClick(View view, int position) {
                // Kalo bisa informasi dari poli dimaterial dialog
                Toast.makeText(PoliActivity.this, "Long press on position :"+position,Toast.LENGTH_LONG).show();
            }
        }));

    }

    public static interface ClickListener{
        public void onClick(View view, int position);
        public void onLongClick(View view,int position);
    }

    class RecyclerTouchListener implements RecyclerView.OnItemTouchListener{

        private ClickListener clickListener;
        private GestureDetector gestureDetector;

        public RecyclerTouchListener(Context context, final RecyclerView recyclerView, final ClickListener clickListener){
            this.clickListener = clickListener;
            gestureDetector=new GestureDetector(context,new GestureDetector.SimpleOnGestureListener(){
                @Override
                public boolean onSingleTapUp(MotionEvent e) {
                    return true;
                }

                @Override
                public void onLongPress(MotionEvent e) {
                    View child=recyclerView.findChildViewUnder(e.getX(),e.getY());
                    if(child!=null && clickListener!=null){
                        clickListener.onLongClick(child,recyclerView.getChildAdapterPosition(child));
                    }
                }
            });
        }

        @Override
        public boolean onInterceptTouchEvent(RecyclerView rv, MotionEvent e) {
            View child=rv.findChildViewUnder(e.getX(),e.getY());
            if(child!=null && clickListener!=null && gestureDetector.onTouchEvent(e)){
                clickListener.onClick(child,rv.getChildAdapterPosition(child));
            }

            return false;
        }

        @Override
        public void onTouchEvent(RecyclerView rv, MotionEvent e) {

        }

        @Override
        public void onRequestDisallowInterceptTouchEvent(boolean disallowIntercept) {

        }
    }

    @Override
    public void onResume() {
        super.onResume();
    }

    private void initializeData(){
        poliList = new ArrayList<>();
        //poliList.add(new Poli("Poli Umum","Tempat berobat untuk penyakit yang umum",R.drawable.umum));
        //poliList.add(new Poli("Poli Gigi","Tempat berobat untuk penyakit pada gigi",R.drawable.gigi));
        //poliList.add(new Poli("Poli Spesialis Jantung","Tempat berobat untuk penyakit pada jantung",R.drawable.jantung));
        //poliList.add(new Poli("Poli Spesialis Kulit dan Kelamin","Tempat berobat untuk penyakit pada kulit atau Kelamin",R.drawable.kulit));
        //poliList.add(new Poli("Poli Spesialis Mata","Tempat berobat untuk penyakit pada mata",R.drawable.mata));
        //poliList.add(new Poli("Poli THT","Tempat berobat untuk penyakit pada telinga, hidung atau tenggorokan",R.drawable.tht));
        //poliList.add(new Poli("Poli Spesialis Tulang","Tempat berobat untuk penyakit pada tulang",R.drawable.tulang));
        //poliList.add(new Poli("Poli Spesialis Saraf","Tempat berobat untuk penyakit pada saraf",R.drawable.saraf));
    }

    private void initializeAdapter(){
        //PoliAdapter adapter = new PoliAdapter(poliList);
        //recyclerView.setAdapter(adapter);
    }


}
