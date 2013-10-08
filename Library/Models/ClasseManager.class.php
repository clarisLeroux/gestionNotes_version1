<?php
namespace Library\Models;

abstract class ClasseManager extends \Library\Manager
{
     /**
   * M�thode retournant la liste de toutes les classes.
   * @return array La liste des classes. Chaque entr�e est une instance de Classe.
   */
  abstract public function getClasses();

}