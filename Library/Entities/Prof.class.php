<?php
namespace Library\Entities;

class Prof extends \Library\Entity
{
  protected $id,
			$nomPrenom,
            $matiere;
  
  
  public function isValid()
  {
    return !(empty($this->matiere) || empty($this->nomPrenom));
  }
  
  
  // SETTERS //
  
  public function setNomPrenom($nomPrenom)
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
  
  public function setMatiere($matiere)
  {
    if (!is_string($matiere) || empty($matiere))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }
    else
    {
      $this->matiere = $matiere;
    }
  }
  
  // GETTERS //
  
  public function matiere()
  {
    return $this->matiere;
  }
  
  public function nomPrenom()
  {
    return $this->nomPrenom;
  }
  
    public function id()
  {
    return $this->id;
  }
  
}