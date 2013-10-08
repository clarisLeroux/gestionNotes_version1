<?php
namespace Library\Models;

abstract class ClasseManager extends \Library\Manager
{
     /**
   * Méthode retournant la liste de toutes les classes.
   * @return array La liste des classes. Chaque entrée est une instance de Classe.
   */
  abstract public function getClasses();

}