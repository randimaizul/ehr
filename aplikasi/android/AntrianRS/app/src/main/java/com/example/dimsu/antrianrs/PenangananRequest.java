package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 1/4/2018.
 */

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class PenangananRequest extends StringRequest{
    private static final String PENANGANAN_REQUEST_URL = "http://latif.taungapain.com/tampil_penanganan.php";
    private Map<String, String> params;

    public PenangananRequest(String id_rekam_medis, Response.Listener<String> listener){
        super(Method.POST,PENANGANAN_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_rekam_medis", id_rekam_medis);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
