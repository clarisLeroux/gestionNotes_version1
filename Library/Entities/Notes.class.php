<?php
namespace Library\Entities;

class Notes extends \Library\Entity
{
  protected $numeroFiche,
			$prof,
            $matiere,
			$classe,
            $dateExam,
            $dateAjout,
            $dateModif;
  
 const PROF_INVALIDE = 1;
 const MATIERE_INVALIDE = 2;
 const DATEEXAM_INVALIDE = 3;
  
  public function isValid()
  {
    //return !(empty($this->prof) || empty($this->matiere) || !empty($this->dateExam));
	return true;
  }
  
  
  // SETTERS //
  
  public function setProf($prof)
  {
    if (!is_string($prof) || empty($prof))
    {
      $this->erreurs[] = self::PROF_INVALIDE;
    }
    else
    {
      $this->prof = $prof;
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
  
    public function setClasse($classe)
  {
      $this->classe = $classe;
  }
  
  public function setDateExam($dateExam)
  {
      $this->dateExam = $dateExam;
  }
  
  public function setDateAjout(\DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }
  
  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }
  
  // GETTERS //
  
    public function numeroFiche()
  {
    return $this->numeroFiche;
  }
  
  public function prof()
  {
    return $this->prof;
  }
  
  public function matiere()
  {
    return $this->matiere;
  }
  
    public function classe()
  {
    return $this->classe;
  }
  
  public function dateExam()
  {
    return $this->dateExam;
  }
  
  public function dateAjout()
  {
    return $this->dateAjout;
  }
  
  public function dateModif()
  {
    return $this->dateModif;
  }
}