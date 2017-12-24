package com.example.dimsu.antrianrs;

/**
 * Created by Lathifrdp on 12/22/2017.
 */
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.dimsu.antrianrs.Class.Asuransi;

import java.util.List;

public class AsuransiSpinner extends ArrayAdapter<Asuransi>{
    // Your sent context
    LayoutInflater inflator;
    private Context context;
    // Your custom values for the spinner (User)
    private List<Asuransi> values;

    public AsuransiSpinner(Context context, int textViewResourceId,
                          List<Asuransi> values) {
        super(context, textViewResourceId, values);
        inflator = LayoutInflater.from(context);
        this.context = context;
        this.values = values;
    }

    @Override
    public int getCount(){
        return values.size();
    }

    @Override
    public Asuransi getItem(int position){
        return values.get(position);
    }

    @Override
    public long getItemId(int position){
        return position;
    }


    // And the "magic" goes here
    // This is for the "passive" state of the spinner
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // I created a dynamic TextView here, but you can reference your own  custom layout for each spinner item
        convertView = inflator.inflate(R.layout.tampil_as_sp, null);
        TextView label = (TextView) convertView.findViewById(R.id.as_sp);
        //label.setTextColor(Color.BLACK);
        // Then you can get the current item using the values array (Users array) and the current position
        // You can NOW reference each method you has created in your bean object (User class)
        label.setText(values.get(position).ambilJenisAsuransi());

        // And finally return your dynamic (or custom) view for each spinner item
        return convertView;
    }

    // And here is when the "chooser" is popped up
    // Normally is the same view, but you can customize it if you want
    @Override
    public View getDropDownView(int position, View convertView,
                                ViewGroup parent) {
        convertView = inflator.inflate(R.layout.tampil_as_sp, null);
        TextView label = (TextView) convertView.findViewById(R.id.as_sp);

        label.setText(values.get(position).ambilJenisAsuransi());

        return convertView;
    }
}
