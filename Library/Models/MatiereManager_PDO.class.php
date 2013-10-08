<?php
namespace Library\Models;

use \Library\Entities\Classe;

class MatiereManager_PDO extends MatiereManager
{
 public function getMatiere($prof = -1)
  {
    $sql = 'SELECT id, matiere as nom, prof, classe FROM matiere';
	
	if ($prof != -1 && $prof!=null)
	{
		$sql .= ' WHERE prof = ' . $prof .' ';
	}
	
	$sql .= ' ORDER BY id DESC';
	

    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Matiere');
    
    $listeMatiere = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $listeMatiere;
  }
}