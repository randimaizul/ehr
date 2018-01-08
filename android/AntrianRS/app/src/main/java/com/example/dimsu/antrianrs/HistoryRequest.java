package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 1/3/2018.
 */

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class HistoryRequest extends StringRequest{
    private static final String HISTORY_REQUEST_URL = "http://latif.taungapain.com/tampil_history.php";
    private Map<String, String> params;

    public HistoryRequest(String id_pasien, Response.Listener<String> listener){
        super(Method.POST,HISTORY_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_pasien", id_pasien);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
