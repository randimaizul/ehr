package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 12/20/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class ProfileRequest extends StringRequest {

    //private static final String LOGIN_REQUEST_URL = "http://192.168.1.39:8080/rs/booking.php";
    private static final String PROFILE_REQUEST_URL = "http://latif.taungapain.com/profil.php";
    private Map<String, String> params;

    public ProfileRequest(String id_asuransi, String nama_pasien, String alamat,String id_user,String no_asuransi, String tanggal_lahir, String agama,String nama_orangtua, String golongan_darah, Response.Listener<String> listener){
        super(Method.POST,PROFILE_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("id_asuransi", id_asuransi);
        params.put("id_user", id_user);
        params.put("alamat", alamat);
        params.put("nama_pasien", nama_pasien);
        params.put("no_asuransi", no_asuransi);
        params.put("tanggal_lahir", tanggal_lahir);
        params.put("nama_orangtua", nama_orangtua);
        params.put("agama", agama);
        params.put("golongan_darah", golongan_darah);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
