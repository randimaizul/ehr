package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 12/25/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class Dokter2Request extends StringRequest{
    private static final String DOKTER_REQUEST_URL = "http://latif.taungapain.com/tampil_dokter.php";
    private Map<String, String> params;

    public Dokter2Request(String id_rs_poli, Response.Listener<String> listener){
        super(Method.POST,DOKTER_REQUEST_URL, listener, null);
        params = new HashMap<>();
        //params.put("id_pasien", id_pasien);
        params.put("id_rs_poli", id_rs_poli);

    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
