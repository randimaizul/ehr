package com.example.dimsu.antrianrs;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.text.SimpleDateFormat;
import java.util.Date;

/**
 * Created by Dimsu on 3/10/2017.
 */

class DatabaseHelper extends SQLiteOpenHelper{

    private static final String DATABASE_NAME = "RS.db";
    private static final String TABLE_NAME_PASIEN = "pasien_table";
    private static final String col_1 = "ID";
    private static final String col_2 = "Nama";
    private static final String col_3 = "TempatLahir";
    private static final String col_4 = "TanggalLahir";
    private static final String col_5 = "BeratBadan";
    private static final String col_6 = "TinggiBadan";
    private static final String col_7 = "NoHp";
    private static final String col_8 = "GolonganDarah";
    private static final String col_9 = "NoBpjs";
    private static final String col_10 = "Email";
    private static final String col_11 = "Password";

    private static final String TABLE_DAFTAR = "daftar_table";
    private static final String col_21 = "ID";
    private static final String col_12 = "TanggalPesan";
    private static final String col_13 = "IdPasien";
    private static final String col_14 = "IdPoli";
    private static final String col_15 = "NamaPoli";
    private static final String col_16 = "IdDokter";

    private static final String TABLE_ANTRIAN = "antrian_table";
    private static final String col_31 = "ID";
    private static final String col_32 = "umum";
    private static final String col_33 = "gigi";
    private static final String col_34 = "jantung";
    private static final String col_35 = "kulit";
    private static final String col_36 = "mata";
    private static final String col_37 = "tht";
    private static final String col_38 = "tulang";
    private static final String col_39 = "saraf";



    DatabaseHelper(Context context) {
        super(context, DATABASE_NAME, null, 1);
        SQLiteDatabase db = this.getWritableDatabase();
    }

    public DatabaseHelper(Context context, String name, SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("create table " + TABLE_NAME_PASIEN + "("+col_1+" INTEGER PRIMARY KEY AUTOINCREMENT, "+col_2+" TEXT, "+col_3+" TEXT, "+col_4+" TEXT, "+col_5+" INTEGER,"+col_6+" INTEGER, "+col_7+" LONG,"+col_8+" TEXT, "+col_10+" TEXT,"+col_11+" TEXT)");
        db.execSQL("create table " + TABLE_DAFTAR + "("+col_21+" INTEGER PRIMARY KEY AUTOINCREMENT,TanggalPesan DATE,IdPasien INTEGER,IdPoli INTEGER,NamaPoli TEXT,TinggiBadan INTEGER,NoHp INTEGER,GolonganDarah TEXT,Email TEXT,Password TEXT)");
        db.execSQL("create table " + TABLE_ANTRIAN +"("+col_31+" INTEGER PRIMARY KEY AUTOINCREMENT, "+col_32+" TEXT, "+col_33+" TEXT, "+col_34+" TEXT, "+col_35+" TEXT, "+col_36+" TEXT, "+col_37+" TEXT, "+col_38+" TEXT, "+col_39+" TEXT)");
        db.execSQL("insert into "+ TABLE_ANTRIAN +" (ID,umum,gigi,jantung,kulit,mata,tht,tulang,saraf) VALUES (A001,B001,C001,D001,E001,F001,G001,H001)");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXITS " + TABLE_NAME_PASIEN);
        db.execSQL("DROP TABLE IF EXITS " + TABLE_DAFTAR);
        db.execSQL("DROP TABLE IF EXITS " + TABLE_ANTRIAN);
        onCreate(db);
    }
    boolean insertDataPasien(String nama, String tempatLahir, String tanggalLahir, int beratBadan, int tinggiBadan, long noHp, String golonganDarah, String email, String password) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(col_2, nama);
        contentValues.put(col_3, tempatLahir);
        contentValues.put(col_4, tanggalLahir);
        contentValues.put(col_5, beratBadan);
        contentValues.put(col_6, tinggiBadan);
        contentValues.put(col_7, noHp);
        contentValues.put(col_8, golonganDarah);
        contentValues.put(col_10, email);
        contentValues.put(col_11, password);
        long result = db.insert(TABLE_NAME_PASIEN, null, contentValues);
        return result != -1;
    }

    boolean insertDataDaftar(int idPasien, int idPoli, String namaPoli, String namaDokter) {
        SQLiteDatabase db = this.getWritableDatabase();
        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
        Date date = new Date();
        ContentValues contentValues = new ContentValues();
        contentValues.put(col_12, dateFormat.format(date));
        contentValues.put(col_13, idPasien);
        contentValues.put(col_14, idPoli);
        contentValues.put(col_15, namaPoli);
        contentValues.put(col_16, namaDokter);
        long result = db.insert(TABLE_DAFTAR, null, contentValues);
        return result != -1;
    }

    String searchPass(String email){
        SQLiteDatabase db = this.getWritableDatabase();
        String query = "select email, password from "+TABLE_NAME_PASIEN;
        Cursor cursor = db.rawQuery(query,null);
        String a,b;
        b = "not found!";
        if(cursor.moveToFirst()){
            do{
                a=cursor.getString(0);
                if(a.equals(email)){
                    b = cursor.getString(1);
                    break;
                }
            }
            while(cursor.moveToNext());
        }
        return b;
    }

    int searchId(String email){
        SQLiteDatabase db = this.getWritableDatabase();
        String query = "select email, password from "+TABLE_NAME_PASIEN;
        Cursor cursor = db.rawQuery(query,null);
        String a;
        int b = 0;
        if(cursor.moveToFirst()){
            do{
                a=cursor.getString(0);
                if(a.equals(email)){
                    b = cursor.getInt(1);
                    break;
                }
            }
            while(cursor.moveToNext());
        }
        return b;
    }

}
