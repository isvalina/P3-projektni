package ffos.p3.ontologija;

import java.io.Serializable;

public class Ontologija implements Serializable {

    public Ontologija() {
        this.sifra = sifra;
        this.nazivFilma = nazivFilma;
        this.zanr = zanr;
        this.nagrada = nagrada;
        this.godinaIzlaska = godinaIzlaska;
        this.trajanjeFilma = trajanjeFilma;
    }

    private String nazivFilma;
    private String zanr;
    private String nagrada;
    private int godinaIzlaska;
    private String trajanjeFilma;

    private int sifra;

    public int getSifra() {
        return sifra;
    }

    public void setSifra(int sifra) {
        this.sifra = sifra;
    }

    public String getNazivFilma() {
        return nazivFilma;
    }

    public void setNazivFilma(String nazivFilma) {
        this.nazivFilma = nazivFilma;
    }

    public String getZanr() {
        return zanr;
    }

    public void setZanr(String zanr) {
        this.zanr = zanr;
    }

    public String getNagrada() {
        return nagrada;
    }

    public void setNagrada(String nagrada) {
        this.nagrada = nagrada;
    }

    public int getGodinaIzlaska() {
        return godinaIzlaska;
    }

    public void setGodinaIzlaska(int godinaIzlaska) {
        this.godinaIzlaska = godinaIzlaska;
    }

    public String getTrajanjeFilma() {
        return trajanjeFilma;
    }

    public void setTrajanjeFilma(String trajanjeFilma) {
        this.trajanjeFilma = trajanjeFilma;
    }


}
