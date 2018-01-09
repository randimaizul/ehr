package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 5/31/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class BookingRequest extends StringRequest {

    //private static final String LOGIN_REQUEST_URL = "http://192.168.1.39:8080/rs/booking.php";
    private static final String TAMPILDAFTAR_REQUEST_URL = "http://latif.taungapain.com/tampil_pendaftaran.php";
    private Map<String, String> params;

    public BookingRequest(String id_pendaftaran, Response.Listener<String> listener){
        super(Method.POST,TAMPILDAFTAR_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_pendaftaran", id_pendaftaran);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }

}