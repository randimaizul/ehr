package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 5/26/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.lang.reflect.Method;
import java.util.HashMap;
import java.util.Map;



public class RegisterRequest extends StringRequest{

    //private static final String REGISTER_REQUEST_URL = "http://192.168.1.39:8080/rs/regis.php";
    private static final String REGISTER_REQUEST_URL = "http://www.antrianrs.esy.es/regiss.php";
    private Map<String, String> params;

    public RegisterRequest(String kode_pasien, String no_telepon, String email, String password, Response.Listener<String> listener){
        super(Method.POST,REGISTER_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("kode_pasien", kode_pasien);
        params.put("no_telepon", no_telepon);
        params.put("email", email);
        params.put("password", password);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
