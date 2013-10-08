<p style="text-align: center">Il y a actuellement <?php echo $nombreNotes; ?> notes. En voici la liste :</p>

<table>
  <tr><th>Numéro</th><th>Professeur</th><th>Matière</th><th>Date de l'examen</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
<?php
foreach ($listeNotes as $notes)
{
//echo 'Nom du prof :'; echo $numProf;
  echo '<tr><td>', $notes['numeroFiche'], '</td>
  <td>', $notes['prof'], '</td>
  <td>', $notes['matiere'], '</td>
  <td>', $notes['dateExam'], '</td>
  <td>le ', $notes['dateAjout'], '</td>
  <td>', ($notes['dateAjout'] == $notes['dateModif'] ? '-' : 'le '.$notes['dateModif']), '</td>
  <td><a href="notes-update-', $notes['numeroFiche'], '.html"><img src="/images/update.png" alt="Modifier" /></a>
  <a href="notes-delete-', $notes['numeroFiche'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td>
  </tr>', "\n";
}
?>
</table>