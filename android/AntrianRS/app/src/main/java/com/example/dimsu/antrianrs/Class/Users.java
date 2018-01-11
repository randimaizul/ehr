package com.example.dimsu.antrianrs.Class;

/**
 * Created by Lathifrdp on 1/10/2018.
 */

public class Users {
    private String id_user;
    private String username;
    private String password;
    private String status;

    public Users(){}
    public Users(String id_dokter, String nama_dokter){
        this.id_user = id_user;
        this.username = username;
        this.password = password;
        this.status = status;
    }
    public String ambilIdUser(){return id_user;}
    public String ambilUsername(){return username;}
    public String ambilPassword(){return password;}
    public String ambilStatus(){return status;}
}
