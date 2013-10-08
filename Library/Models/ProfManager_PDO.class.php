<?php
namespace Library\Models;

use \Library\Entities\Prof;

class ProfManager_PDO extends ProfManager
{
 public function getProfesseur($login, $password)
  {
    //$sql = 'SELECT (*) FROM professeur WHERE (login= ' . $login . ' AND password=' . $password . ') ';
	$requete = $this->dao->prepare('SELECT * FROM prof WHERE login = :login AND password = :password ');
    $requete->bindValue(':login', $login);
	$requete->bindValue(':password', $password);
    $requete->execute();
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Prof');
    
    if($prof = $requete->fetch()){
		return $prof->id();
	}
    
    return null;
  }

}