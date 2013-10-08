<?php
namespace Library\Models;

abstract class EleveManager extends \Library\Manager
{
     /**
   * M�thode retournant la liste de tous les �l�ves d'une classe.
   * @param la classe
   * @return array La liste des �l�ves. Chaque entr�e est une instance d'El�ves.
   */
  abstract public function getEleves($classe = -1);

}