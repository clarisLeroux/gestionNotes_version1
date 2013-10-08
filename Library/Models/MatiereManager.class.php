<?php
namespace Library\Models;

abstract class MatiereManager extends \Library\Manager
{
     /**
   * M�thode retournant la liste de toutes les mati�res.
   * @return array La liste des mati�res. Chaque entr�e est une instance de Mati�re.
   */
  abstract public function getMatiere($prof = -1);

}