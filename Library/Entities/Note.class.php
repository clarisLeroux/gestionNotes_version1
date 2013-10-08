<?php
namespace Library\Entities;

class Note extends \Library\Entity
{
  protected $numeroFiche,
            $nomPrenom,
            $valeur;
 
  
  public function isValid()
  {
    //return !(empty($this->numeroFiche) || empty($this->nomPrenom) || empty($this->valeur));
	return true;
  }
  
  
  // SETTERS //
  
  public function setNomPrenom($nomPrenom)
  {
    if (!is_string($nomPrenom) || empty($nomPrenom))
    {
    }
    else
    {
      $this->nomPrenom = $nomPrenom;
    }
  }
  
  public function setValeur($note)
  {

      $this->valeur = $note;
  }
  
  public function setNumeroFiche($numeroFiche)
  {
      $this->numeroFiche = $numeroFiche;
  }
  
  
  // GETTERS //
  
  public function numeroFiche()
  {
    return $this->numeroFiche;
  }
  
  public function valeur()
  {
    return $this->valeur;
  }
  
  public function nomPrenom()
  {
    return $this->nomPrenom;
  }

}