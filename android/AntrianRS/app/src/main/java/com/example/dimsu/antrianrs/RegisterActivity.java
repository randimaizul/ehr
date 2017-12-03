package com.example.dimsu.antrianrs;

import android.content.Intent;
import android.icu.text.SimpleDateFormat;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.RequiresApi;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.sql.Date;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.sql.Date;


public class RegisterActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        final EditText txtKoPas = (EditText) findViewById(R.id.txtKoPas);
        final EditText txtPhone = (EditText) findViewById(R.id.txtPhone);
        final EditText txtEmail = (EditText) findViewById(R.id.txtEmail);
        final EditText txtPassword = (EditText) findViewById(R.id.txtPassword);

        final Button btnRegister = (Button) findViewById(R.id.btnRegister);
        final TextView link_login = (TextView) findViewById(R.id.link_login);

        link_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent LoginIntent = new Intent(RegisterActivity.this, LoginActivity.class);
                RegisterActivity.this.startActivity(LoginIntent);
            }
        });

        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String kode_pasien = txtKoPas.getText().toString();
                final String no_telepon = txtPhone.getText().toString();
                final String email= txtEmail.getText().toString();
                final String password = txtPassword.getText().toString();


                Response.Listener<String> responseListener = new Response.Listener<String>(){

                    @Override
                    public void onResponse(String response) {
                        JSONObject jsonResponse = null;
                        boolean error = false;
                        try {
                            jsonResponse = new JSONObject(response);
                            error = jsonResponse.getBoolean("error");

                            if (!error){
                                Intent inlog = new Intent(RegisterActivity.this, LoginActivity.class);
                                RegisterActivity.this.startActivity(inlog);
                                //AlertDialog.Builder builder = new AlertDialog.Builder(RegisterActivity.this);
                                //builder.setMessage("Pendaftaran Akun Berhasil");
                                //builder.setNegativeButton("OK",null);
                                //builder.show();
                                Toast.makeText(RegisterActivity.this, "Pendaftaran Akun Berhasil", Toast.LENGTH_SHORT).show();
                            }else{
                                AlertDialog.Builder builder = new AlertDialog.Builder(RegisterActivity.this);
                                builder.setMessage("Registrasi Akun Gagal.\n"+jsonResponse.getString("error_msg"))
                                        .setNegativeButton("Ulangi", null)
                                        .create()
                                        .show();
                            }
                        } catch (JSONException e1) {
                            e1.printStackTrace();
                        }
                    }
                };

                RegisterRequest registerRequest = new RegisterRequest(kode_pasien, no_telepon, email, password, responseListener);
                RequestQueue queue = Volley.newRequestQueue(RegisterActivity.this);
                queue.add(registerRequest);
            }
        });
    }
}