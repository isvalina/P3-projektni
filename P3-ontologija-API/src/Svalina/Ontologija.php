<?php

namespace Svalina;

/**
 * @Entity @Table(name="ontologija")
 **/


class Ontologija 

{
    /** @id @Column(type="integer") @GeneratedValue **/
    protected $sifra;

    /**
    * @Column(type="string")
    */
    private $nazivFilma;

   /**
    * @Column(type="string")
    */
    private $zanr;

    /**
    * @Column(type="string")
    */
    private $nagrada;

    /**
    * @Column(type="integer")
    */
    private $godinaIzlaska;


    /**
    * @Column(type="string")
    */

    private $trajanjeFilma;



    

    public function getSifra(){
      return $this->sifra;
    }
  
    public function setSifra($sifra){
      $this->sifra = $sifra;
    }
  
    public function getNazivFilma(){
      return $this->nazivFilma;
    }
  
    public function setNazivFilma($nazivFilma){
      $this->nazivFilma = $nazivFilma;
    }
  
    public function getZanr(){
      return $this->zanr;
    }
  
    public function setZanr($zanr){
      $this->zanr = $zanr;
    }
  
    public function getNagrada(){
      return $this->nagrada;
    }
  
    public function setNagrada($nagrada){
      $this->nagrada = $nagrada;
    }
  
    public function getGodinaIzlaska(){
      return $this->godinaIzlaska;
    }
  
    public function setGodinaIzlaska($godinaIzlaska){
      $this->godinaIzlaska = $godinaIzlaska;
    }
  
    public function getTrajanjeFilma(){
      return $this->trajanjeFilma;
    }
  
    public function setTrajanjeFilma($trajanjeFilma){
      $this->trajanjeFilma = $trajanjeFilma;
    }

    

    


    public function setPodaci($podaci)
    {
      foreach($podaci as $kljuc => $vrijednost){
        $this->{$kljuc} = $vrijednost;
      }
    }
    
  }

?>