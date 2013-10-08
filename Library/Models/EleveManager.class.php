<?php
namespace Library\Models;

abstract class EleveManager extends \Library\Manager
{
     /**
   * Méthode retournant la liste de tous les élèves d'une classe.
   * @param la classe
   * @return array La liste des élèves. Chaque entrée est une instance d'Elèves.
   */
  abstract public function getEleves($classe = -1);

}