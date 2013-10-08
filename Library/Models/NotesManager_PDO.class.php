<?php
namespace Library\Models;

use \Library\Entities\Notes;

class NotesManager_PDO extends NotesManager
{
  public function getList($debut = -1, $limite = -1, $prof = -1)
  {
    $sql = 'SELECT numeroFiche, b.matiere, c.classe, d.prof, dateExam, dateAjout, dateModif FROM notes a, matiere b, classe c, prof d	
	WHERE a.matiere=b.id AND a.prof=d.id AND a.classe=c.id';
    
		if ($prof != -1 && $prof!=null)
	{
		$sql .= ' AND a.prof = ' . $prof .' ';
	}
	
	$sql .= ' ORDER BY numeroFiche DESC';
	
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Notes');
    
    $listeNotes = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $listeNotes;
  }
  
  
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT * FROM notes WHERE numeroFiche = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Notes');
    
    if ($notes = $requete->fetch())
    {
      //$notes->setDateAjout(new \DateTime($notes->dateAjout()));
      //$notes->setDateModif(new \DateTime($notes->dateModif()));
      
      return $notes;
    }
    
    return null;
  }
  
    public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM notes')->fetchColumn();
  }
  
    public function add ( $notes )
  {
    $requete = $this->dao->prepare('INSERT INTO notes SET prof = :prof, matiere = :matiere, classe = :classe, dateExam = :dateExam , dateAjout = NOW(), dateModif = NOW()');
    
    $requete->bindValue(':prof', $notes->prof());
    $requete->bindValue(':matiere', $notes->matiere());
    $requete->bindValue(':classe', $notes->classe());
	$requete->bindValue(':dateExam', $notes->dateExam());
    
    $requete->execute();
  }
  
    public function delete($id)
  {
    $this->dao->exec('DELETE FROM notes WHERE numeroFiche = '.(int) $id);
  }
}