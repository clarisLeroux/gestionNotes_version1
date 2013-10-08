<?php
namespace Library\Models;

use \Library\Entities\Eleve;

class EleveManager_PDO extends EleveManager
{
 public function getEleves($classe = -1)
  {
    $sql = 'SELECT * FROM eleve ';
	
	if($classe != -1 && $classe != null)
	{
	 $sql .= ' WHERE classe = ' . $classe . ' ';
	}
	
	$sql .= ' ORDER BY id DESC';

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Eleve');
    
    $listeEleve = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $listeEleve;
  }
}