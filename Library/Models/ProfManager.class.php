<?php
namespace Library\Models;

abstract class ProfManager extends \Library\Manager
{
     /**
   * M�thode retournant une liste de news demand�e.
   * @param $debut int La premi�re news � s�lectionner
   * @param $limite int Le nombre de news � s�lectionner
   * @return array La liste des news. Chaque entr�e est une instance de News.
   */
  abstract public function getProfesseur($login, $password);

}