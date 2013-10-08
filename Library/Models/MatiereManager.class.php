<?php
namespace Library\Models;

abstract class MatiereManager extends \Library\Manager
{
     /**
   * Méthode retournant la liste de toutes les matières.
   * @return array La liste des matières. Chaque entrée est une instance de Matière.
   */
  abstract public function getMatiere($prof = -1);

}