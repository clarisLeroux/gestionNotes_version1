<?php
namespace Library\Models;

use \Library\Entities\note;

class noteManager_PDO extends noteManager
{
  public function getList($debut = -1, $limite = -1)
  {
    return null;
  }
  
    public function update($numFiche, $nom, $valeur)
  {
	   $sql = 'UPDATE note SET valeur= ' . $valeur . ' WHERE numeroFiche=' . $numFiche . ' AND nomPrenom=' . $nom . '';
	
	$requete = $this->dao->query($sql);
	
	$requete->closeCursor();
  }
  
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT valeur, b.nomPrenom FROM note a, eleve b WHERE numeroFiche = :id AND a.nomPrenom=b.id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\note');
    
	$listenote = $requete->fetchAll();

	$requete->closeCursor();
	
    return $listenote;
  }
  
    public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM note')->fetchColumn();
  }
  
    protected function add($note)
  {
    $requete = $this->dao->prepare('INSERT INTO note SET numeroFiche = :numeroFiche, nomPrenom = :nomPrenom, valeur = :valeur');
    
    $requete->bindValue(':numeroFiche', $note->numeroFiche());
    $requete->bindValue(':nomPrenom', $note->nomPrenom());
    $requete->bindValue(':valeur', $note->valeur());
    
    $requete->execute();
  }
  
   public function addClasse($idajout, $listeEleve)
   {
   
	
	foreach($listeEleve as $eleve)
	{
		$requete=$this->dao->prepare('INSERT INTO note SET numeroFiche = :numeroFiche, nomPrenom = :nomPrenom, valeur = :valeur');
		
		    $requete->bindValue(':numeroFiche', $idajout);
			$requete->bindValue(':nomPrenom', $eleve->id());
			$requete->bindValue(':valeur', 0);
		
		    $requete->execute();
	}
	
   }
   
       public function delete($id)
  {
    $this->dao->exec('DELETE FROM note WHERE numeroFiche = '.(int) $id);
  }
   
}