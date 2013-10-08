<?php
namespace Library\Entities;

class Eleve extends \Library\Entity
{
  protected $id,
			$nomPrenom,
            $classe;
  
  
  public function isValid()
  {
    return !(empty($this->classe) || empty($this->nomPrenom) || empty($this->prenomPrenom));
  }
  
  
  // SETTERS //
  
  public function setnomPrenom($nomPrenom)
  {
    if (!is_string($nomPrenom) || empty($nomPrenom))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }
    else
    {
      $this->nomPrenom = $nomPrenom;
    }
  }
  
    public function setPrenomPrenom($prenomPrenom)
  {
    if (!is_string($prenomPrenom) || empty($prenomPrenom))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }
    else
    {
      $this->prenomPrenom = $prenomPrenom;
    }
  }
  
  public function setclasse($classe)
  {
    if (!is_string($classe) || empty($classe))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }
    else
    {
      $this->classe = $classe;
    }
  }
  
  // GETTERS //
  
  public function classe()
  {
    return $this->classe;
  }
  
  public function nomPrenom()
  {
    return $this->nomPrenom;
  }
  
    public function prenomPrenom()
  {
    return $this->prenomPrenom;
  }
  
      public function id()
  {
    return $this->id;
  }
  
}