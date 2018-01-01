package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 12/29/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class PendaftaranRequest extends StringRequest{

    private static final String PENDAFTARAN_REQUEST_URL = "http://latif.taungapain.com/pendaftaran.php";
    private Map<String, String> params;

    public PendaftaranRequest(String id_pasien, String id_rs_poli, String id_dokter, Response.Listener<String> listener){
        super(Method.POST,PENDAFTARAN_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_pasien", id_pasien);
        params.put("id_rs_poli", id_rs_poli);
        params.put("id_dokter", id_dokter);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
