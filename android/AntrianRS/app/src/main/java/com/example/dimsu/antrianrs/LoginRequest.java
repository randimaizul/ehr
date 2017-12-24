package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 5/26/2017.
 */
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;



public class LoginRequest extends StringRequest {

    //private static final String LOGIN_REQUEST_URL = "http://192.168.1.39:8080/rs/log.php";
    //private static final String LOGIN_REQUEST_URL = "http://www.antrianrs.esy.es/logg.php";
    //private static final String LOGIN_REQUEST_URL = "http://api.taungapain.com/api/users/login";
    //private static final String LOGIN_REQUEST_URL = "http://192.168.43.31:8080/ehr/log.php";
    private static final String LOGIN_REQUEST_URL = "http://latif.taungapain.com/login.php";
    private Map<String, String> params;

    public LoginRequest(String username, String password, Response.Listener<String> listener){
        super(Method.POST,LOGIN_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("username", username);
        params.put("password", password);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }

}

