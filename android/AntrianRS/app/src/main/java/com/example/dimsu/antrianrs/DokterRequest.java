package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 5/28/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class DokterRequest extends StringRequest {

    private static final String LOGIN_REQUEST_URL = "http://192.168.1.10:8080/rs/tampil_pasien.php";
    private Map<String, String> params;

    public DokterRequest(String kode_pasien, String nama_poli, Response.Listener<String> listener){
        super(Method.POST,LOGIN_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("kode_pasien", kode_pasien);
        params.put("nama_poli", nama_poli);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }

}

