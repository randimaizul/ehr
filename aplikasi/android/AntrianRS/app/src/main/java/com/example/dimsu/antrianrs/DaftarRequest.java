package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 5/27/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by Hut Hut on 5/2/2017.
 */

public class DaftarRequest extends StringRequest {

    //private static final String LOGIN_REQUEST_URL = "http://192.168.1.39:8080/rs/tampil_pasien.php";
    private static final String LOGIN_REQUEST_URL = "http://www.antrianrs.esy.es/tampil_pasienn.php";
    private Map<String, String> params;

    public DaftarRequest(String id_poli, Response.Listener<String> listener){
        super(Method.POST,LOGIN_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_poli", id_poli);
    }
    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
