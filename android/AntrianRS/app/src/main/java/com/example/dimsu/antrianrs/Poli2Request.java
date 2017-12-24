package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 12/24/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class Poli2Request extends StringRequest{
    private static final String POLI_REQUEST_URL = "http://latif.taungapain.com/tampil_poli.php";
    private Map<String, String> params;

    public Poli2Request(String id_rs, Response.Listener<String> listener){
        super(Method.POST,POLI_REQUEST_URL, listener, null);
        params = new HashMap<>();
        //params.put("id_pasien", id_pasien);
        params.put("id_rs", id_rs);

    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
