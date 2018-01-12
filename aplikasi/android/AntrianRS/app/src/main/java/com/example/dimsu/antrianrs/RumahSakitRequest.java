package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 12/24/2017.
 */

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class RumahSakitRequest extends StringRequest{
    private static final String RS_REQUEST_URL = "http://latif.taungapain.com/tampil_rs.php";
    private Map<String, String> params;

    public RumahSakitRequest(String id_pasien, Response.Listener<String> listener){
        super(Method.POST,RS_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_pasien", id_pasien);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
