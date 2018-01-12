package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 5/28/2017.
 */

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class PoliRequest extends StringRequest {

    //private static final String LOGIN_REQUEST_URL = "http://192.168.1.39:8080/rs/tampil.php";
    private static final String LOGIN_REQUEST_URL = "http://www.antrianrs.esy.es/tampill.php";
    private Map<String, String> params;

    public PoliRequest(String id_pasien, Response.Listener<String> listener){
        super(Method.POST,LOGIN_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_pasien", id_pasien);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }

}
