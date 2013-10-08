<?php
namespace Library\Entities;

class Classe extends \Library\Entity
{
  protected $id,
			$nom;
  
  
  public function isValid()
  {
    return !(empty($this->nom));
  }
  
  const NOM_INVALIDE=1;
  // SETTERS //
  
  public function setNom($nom)
  {
    if (!is_string($nom))
    {
      $this->erreurs[] = self::NOM_INVALIDE;
    }
    else
    {
      $this->nom = $nom;
    }
  }

  
  // GETTERS //
  
  public function nom()
  {
    return $this->nom;
  }
  
    public function id()
  {
    return $this->id;
  }
  
}