package com.example.dimsu.antrianrs;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import butterknife.ButterKnife;
import butterknife.InjectView;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

public class LoginActivity extends AppCompatActivity {

    private ProgressDialog progressDialog;
    private AlertDialog.Builder builder;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        progressDialog=new ProgressDialog(LoginActivity.this);
        progressDialog.setCancelable(false);
        progressDialog.setMessage("Loading");

        builder = new AlertDialog.Builder(LoginActivity.this);
        builder.setMessage("")
                .setNegativeButton(null, null)
                .create();

        //final EditText txtUsername = (EditText) findViewById(R.id.txtUsername);
        final EditText txtKoPas = (EditText) findViewById(R.id.txtKoPas);
        final EditText txtPassword = (EditText) findViewById(R.id.txtPassword);

        final Button btnLogin = (Button) findViewById(R.id.btnLogin);
        final TextView lnkRegister = (TextView) findViewById(R.id.lnkRegisterHere);

        lnkRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent registerIntent = new Intent(LoginActivity.this, RegisterActivity.class);
                LoginActivity.this.startActivity(registerIntent);
            }
        });

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String username = txtKoPas.getText().toString();
                final String password = txtPassword.getText().toString();

                if(TextUtils.isEmpty(username) || TextUtils.isEmpty(password)){
                    builder.setMessage("Username dan Password\nHarap diisi");
                    builder.setNegativeButton("OK", null);
                    builder.show();
                }else {
                    progressDialog.show();

                    Response.Listener<String> responseListener = new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try {
                                JSONObject jsonResponse = new JSONObject(response);
                                boolean error = jsonResponse.getBoolean("error");
                                //builder.setMessage("tes");

                                if (!error) {

                                    String id = (String) jsonResponse.getJSONObject("user").getString("id");
                                    //String password = (String) jsonResponse.getJSONObject("password").getString("password");

                                    Intent inmain = new Intent(LoginActivity.this, MainActivity.class);
                                    inmain.putExtra("id", id);
                                    //intent.putExtra("password", password);
                                    Toast.makeText(LoginActivity.this, "Berhasil", Toast.LENGTH_SHORT).show();

                                    LoginActivity.this.startActivity(inmain);

                                } else {
                                    builder.setMessage("Gagal Login");
                                    builder.setNegativeButton("Ulangi", null);
                                    builder.show();

                                }

                                progressDialog.dismiss();

                            } catch (JSONException e) {
                                e.printStackTrace();
                                progressDialog.dismiss();
                                Toast.makeText(LoginActivity.this, "Gagal", Toast.LENGTH_SHORT).show();
                            }

                        }
                    };

                    LoginRequest loginRequest = new LoginRequest(username, password, responseListener);
                    RequestQueue queue = Volley.newRequestQueue(LoginActivity.this);
                    queue.add(loginRequest);
                }
            }
        });
    }
}
