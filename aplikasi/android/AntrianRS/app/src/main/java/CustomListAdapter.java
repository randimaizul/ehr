import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.dimsu.antrianrs.R;

import java.util.List;

/**
 * Created by Dimas Syuhada on 17/12/17.
 */

public class CustomListAdapter extends BaseAdapter {
    private Activity activity;
    private LayoutInflater inflater;
    private List<Riwayat> riwayatItems;

    public CustomListAdapter(Activity activity, List<Riwayat> riwayatItems){
        this.activity = activity;
        this.riwayatItems = riwayatItems;
    }

    @Override
    public int getCount() {
        return riwayatItems.size();
    }

    @Override
    public Object getItem(int i) {
        return riwayatItems.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    @Override
    public View getView(int i, View convertView, ViewGroup parent) {
        if(inflater == null){
            inflater = (LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        }
        if(convertView == null){
            convertView = inflater.inflate(R.layout.list_row, null);
        }
        TextView riwayat = (TextView) convertView.findViewById(R.id.idRiwayat);
        TextView obat = (TextView) convertView.findViewById(R.id.idObat);
        TextView penanganan = (TextView) convertView.findViewById(R.id.idPenanganan);
        TextView tanggal = (TextView) convertView.findViewById(R.id.idTanggal);

        Riwayat r = riwayatItems.get(i);

        riwayat.setText("ID Riwayat : " + String.valueOf(r.getIdRiwayat()));
        obat.setText("Kode Obat : " + String.valueOf(r.getIdObat()));
        penanganan.setText("Kode Penanganan : " + String.valueOf(r.getIdPenanganan()));
        tanggal.setText(String.valueOf(r.getTanggal()));

        return convertView;
    }
}
