<?php
namespace Library\Models;

abstract class NotesManager extends \Library\Manager
{

  /**
   * Méthode permettant d'ajouter une notes.
   * @param $notes notes La notes à ajouter
   * @return void
   */
  abstract public function add( $notes );
  
  /**
   * Méthode permettant d'enregistrer une notes.
   * @param $notes notes la notes à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save($notes)
  {
    if ($notes->isValid())
    {
      $notes->isNew() ? $this->add($notes) : $this->modify($notes);
    }
    else
    {
      throw new \RuntimeException('La notes doit être validée pour être enregistrée');
    }
  }
  
    /**
   * Méthode permettant de supprimer une fiche de notes.
   * @param $id int L'identifiant de la fiche à supprimer
   * @return void
   */
  abstract public function delete($id);
  
     /**
   * Méthode retournant une liste de notes demandée.
   * @param $debut int La première notes à sélectionner
   * @param $limite int Le nombre de notes à sélectionner
   * @return array La liste des notes. Chaque entrée est une instance de notes.
   */
  abstract public function getList($debut = -1, $limite = -1, $prof = -1);
  
  /**
   * Méthode retournant une notes précise.
   * @param $id int L'identifiant de la notes à récupérer
   * @return notes La notes demandée
   */
  abstract public function getUnique($id);
  
  /**
   * Méthode renvoyant le nombre de notes total.
   * 
   * @return int
   */
  abstract public function count();
}