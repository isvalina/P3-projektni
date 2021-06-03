package ffos.p3.ontologija;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.List;

import Svalina.ontologija.R;

public class AdapterListe extends RecyclerView.Adapter<AdapterListe.Red> {

    private List<Ontologija> podaci;
    private List<Ontologija> podaciTemp;
    private LayoutInflater mInflater;
    private ItemClickListener mClickListener;

    public AdapterListe(Context context) {
        this.mInflater = LayoutInflater.from(context);
        podaci = new ArrayList<>();
    }

    @Override
    public Red onCreateViewHolder(ViewGroup roditelj, int viewType) {
        podaciTemp = new ArrayList<>(podaci);
        View view = mInflater.inflate(R.layout.red_liste, roditelj, false);
        return new Red(view);
    }

    @Override
    public void onBindViewHolder(Red red, int position) {
        Ontologija o = podaci.get(position);
        red.nazivFilma.setText(o.getNazivFilma());
        red.zanr.setText(o.getZanr());
        red.nagrada.setText(o.getNagrada());
        red.godinaIzlaska.setText(o.getGodinaIzlaska());
        red.trajanjeFilma.setText(o.getTrajanjeFilma());
    }

    @Override
    public int getItemCount() {
        return podaci==null ? 0 : podaci.size();
    }

    // Pohranjuje i reciklira pogled kako se prolazi kroz listu
    public class Red extends RecyclerView.ViewHolder implements View.OnClickListener {
        private TextView nazivFilma;
        private TextView zanr;
        private TextView nagrada;
        private TextView godinaIzlaska;
        private TextView trajanjeFilma;

        Red(View itemView) {
            super(itemView);
            nazivFilma = itemView.findViewById(R.id.nazivFilma);
            zanr = itemView.findViewById(R.id.zanr);
            nagrada = itemView.findViewById(R.id.nagrada);
            godinaIzlaska = itemView.findViewById(R.id.godinaIzlaska);
            trajanjeFilma = itemView.findViewById(R.id.trajanjeFilma);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View view) {
            if (mClickListener != null) mClickListener.onItemClick(view, getAdapterPosition());
        }
    }

    public Ontologija getItem(int id) {
        return podaci.get(id);
    }

    public void setPodaci(List<Ontologija> itemList) {
        this.podaci = itemList;
    }

    public void setClickListener(ItemClickListener itemClickListener) {
        this.mClickListener = itemClickListener;
    }

    public interface ItemClickListener {
        void onItemClick(View view, int position);
    }

}
