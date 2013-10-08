<?php
namespace Library\Models;

abstract class NoteManager extends \Library\Manager
{

  /**
   * M�thode permettant d'ajouter une notes.
   * @param $notes notes La notes � ajouter
   * @return void
   */
  abstract protected function add($note);
  
    /**
   * M�thode permettant d'ajouter une notes.
   * @param $notes notes La notes � ajouter
   * @return void
   */
  abstract public function update($numFiche, $nom, $valeur);
  
    /**
   * M�thode permettant d'ajouter une classe de note.
   * @param $classe la classe a ajout�
   * @param $idajout l'id correspondant � la fiche
   * @return void
   */
  abstract public function addClasse($idajout,$listeEleve);
  
  /**
   * M�thode permettant d'enregistrer une notes.
   * @param $notes notes la notes � enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save($note)
  {
    if ($note->isValid())
    {
      $note->isNew() ? $this->add($note) : $this->modify($note);
    }
    else
    {
      throw new \RuntimeException('La note doit �tre valid�e pour �tre enregistr�e');
    }
  }
     /**
   * M�thode retournant une liste de notes demand�e.
   * @param $debut int La premi�re notes � s�lectionner
   * @param $limite int Le nombre de notes � s�lectionner
   * @return array La liste des notes. Chaque entr�e est une instance de notes.
   */
  abstract public function getList($debut = -1, $limite = -1);
  
  /**
   * M�thode retournant une notes pr�cise.
   * @param $id int L'identifiant de la notes � r�cup�rer
   * @return notes La notes demand�e
   */
  abstract public function getUnique($id);
  
      /**
   * M�thode permettant de supprimer une fiche de notes.
   * @param $id int L'identifiant de la fiche � supprimer
   * @return void
   */
  abstract public function delete($id);
  
  /**
   * M�thode renvoyant le nombre de notes total.
   * 
   * @return int
   */
  abstract public function count();
}