<?php
namespace Library\Models;

abstract class NoteManager extends \Library\Manager
{

  /**
   * Méthode permettant d'ajouter une notes.
   * @param $notes notes La notes à ajouter
   * @return void
   */
  abstract protected function add($note);
  
    /**
   * Méthode permettant d'ajouter une notes.
   * @param $notes notes La notes à ajouter
   * @return void
   */
  abstract public function update($numFiche, $nom, $valeur);
  
    /**
   * Méthode permettant d'ajouter une classe de note.
   * @param $classe la classe a ajouté
   * @param $idajout l'id correspondant à la fiche
   * @return void
   */
  abstract public function addClasse($idajout,$listeEleve);
  
  /**
   * Méthode permettant d'enregistrer une notes.
   * @param $notes notes la notes à enregistrer
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
      throw new \RuntimeException('La note doit être validée pour être enregistrée');
    }
  }
     /**
   * Méthode retournant une liste de notes demandée.
   * @param $debut int La première notes à sélectionner
   * @param $limite int Le nombre de notes à sélectionner
   * @return array La liste des notes. Chaque entrée est une instance de notes.
   */
  abstract public function getList($debut = -1, $limite = -1);
  
  /**
   * Méthode retournant une notes précise.
   * @param $id int L'identifiant de la notes à récupérer
   * @return notes La notes demandée
   */
  abstract public function getUnique($id);
  
      /**
   * Méthode permettant de supprimer une fiche de notes.
   * @param $id int L'identifiant de la fiche à supprimer
   * @return void
   */
  abstract public function delete($id);
  
  /**
   * Méthode renvoyant le nombre de notes total.
   * 
   * @return int
   */
  abstract public function count();
}