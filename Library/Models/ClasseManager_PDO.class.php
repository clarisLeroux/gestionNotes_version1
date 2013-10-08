<?php
namespace Library\Models;

use \Library\Entities\Classe;

class ClasseManager_PDO extends ClasseManager
{
 public function getClasses()
  {
    $sql = 'SELECT id, classe as nom FROM classe ORDER BY id DESC';

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Classe');
    
    $listeClasse = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $listeClasse;
  }
}