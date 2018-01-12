package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 1/4/2018.
 */

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class RekamMedisRequest extends StringRequest {
    private static final String TAMPILREKMED_REQUEST_URL = "http://latif.taungapain.com/tampil_rekmed.php";
    private Map<String, String> params;

    public RekamMedisRequest(String id_pendaftaran, Response.Listener<String> listener){
        super(Method.POST,TAMPILREKMED_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_pendaftaran", id_pendaftaran);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
