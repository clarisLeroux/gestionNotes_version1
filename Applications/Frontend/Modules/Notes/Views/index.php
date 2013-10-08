<table>
  <tr><th>Professeur</th><th>Classe</th><th>Matière</th><th>Date de l'examen</th></tr>
<?php
foreach ($listeNotes as $notes)
{
?>
  <tr><td><a href="notes-<?php echo $notes['numeroFiche']; ?>.html"><?php echo $notes['prof']; ?></a></td>
  <td> <?php echo $notes['classe']; ?></td>
  <td> <?php echo $notes['matiere']; ?></td>
  <td> <?php echo $notes['dateExam']; ?></td>
  </tr>
<?php
}
?>
</table>