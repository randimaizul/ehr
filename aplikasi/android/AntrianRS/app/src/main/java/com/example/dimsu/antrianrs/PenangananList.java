package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 1/4/2018.
 */

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.dimsu.antrianrs.Class.History;
import com.example.dimsu.antrianrs.Class.Penanganan;

import java.util.ArrayList;

public class PenangananList extends ArrayAdapter<Penanganan>{
    public PenangananList(RekamMedisActivity context, ArrayList<Penanganan> listyow){

        super(context,0 , listyow);



    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // Get the data item for this position
        Penanganan user = getItem(position);
        // Check if an existing view is being reused, otherwise inflate the view
        if (convertView == null) {
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.activity_penanganan2, parent, false);
        }
        // Lookup view for data population
        //TextView tvjenis = (TextView) convertView.findViewById(R.id.jenisPenangananTextViewID);
        //TextView tvketerangan = (TextView) convertView.findViewById(R.id.KeteranganTextViewID);
        TextView tvobat = (TextView) convertView.findViewById(R.id.obatTextViewID);
        TextView tvjumlah = (TextView) convertView.findViewById(R.id.jumlahTextViewID);
        // Populate the data into the template view using the data object
        //tvjenis.setText(user.ambilJenisPenanganan());
        //tvketerangan.setText(user.ambilKeterangan());
        tvobat.setText(user.ambilNamaObat());
        tvjumlah.setText(user.ambilJumlah());
        // Return the completed view to render on screen
        return convertView;
    }
}
