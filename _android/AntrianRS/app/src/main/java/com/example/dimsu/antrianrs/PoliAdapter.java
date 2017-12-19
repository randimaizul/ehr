package com.example.dimsu.antrianrs;

import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.List;

/**
 * Created by Dimsu on 3/11/2017.
 */

class PoliAdapter extends RecyclerView.Adapter<PoliAdapter.MyViewHolder>{

    class MyViewHolder extends RecyclerView.ViewHolder {

        CardView cv;
        TextView namaPoli;
        TextView jmlDokter;
        ImageView poliPhoto;


        MyViewHolder(View itemView) {
            super(itemView);
            cv = (CardView) itemView.findViewById(R.id.cv);
            namaPoli = (TextView) itemView.findViewById(R.id.poli_name);
            jmlDokter = (TextView) itemView.findViewById(R.id.jumlah_dokter);
            poliPhoto = (ImageView) itemView.findViewById(R.id.poliPhoto);

        }
    }

    private List<Poli> poliList;

    PoliAdapter(List<Poli> poliList) {
        this.poliList = poliList;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.poli_card, parent, false);

        return new MyViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(final MyViewHolder holder, int position) {

        holder.namaPoli.setText(poliList.get(position).namePoli);
        holder.jmlDokter.setText(poliList.get(position).jumlahDokter);
        holder.poliPhoto.setImageResource(poliList.get(position).photoId);

    }

    @Override
    public int getItemCount() {
        return poliList.size();
    }

    @Override
    public void onAttachedToRecyclerView(RecyclerView recyclerView) {
        super.onAttachedToRecyclerView(recyclerView);
    }



}
