package com.example.dimsu.antrianrs;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.dimsu.antrianrs.Class.History;

import java.util.ArrayList;

/**
 * Created by Lathifrdp on 1/3/2018.
 */

public class RiwayatList extends ArrayAdapter<History> {


    public RiwayatList(RiwayatActivity context, ArrayList<History> listyow){

        super(context,0 , listyow);



    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // Get the data item for this position
        History user = getItem(position);
        // Check if an existing view is being reused, otherwise inflate the view
        if (convertView == null) {
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.activity_riwayat2, parent, false);
        }
        // Lookup view for data population
        TextView tvTanggal = (TextView) convertView.findViewById(R.id.tanggalTextViewID);
        TextView tvRS = (TextView) convertView.findViewById(R.id.RSTextViewID);
        TextView tvPoli = (TextView) convertView.findViewById(R.id.PoliTextViewID);
        // Populate the data into the template view using the data object
        tvTanggal.setText(user.ambilTanggalHis());
        tvRS.setText(user.ambilNamaRSHis());
        tvPoli.setText(user.ambilNamaPoliHis());
        // Return the completed view to render on screen
        return convertView;
    }
}
