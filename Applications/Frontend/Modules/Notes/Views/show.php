<p> Matière : <?php echo $notes['prof']; ?> du <?php echo $notes['dateExam']; ?> </p>
<p> Date de saisie : <?php echo $notes['dateAjout']; ?> </p>
<?php if ($notes['dateAjout'] != $notes['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?php echo $notes['dateModif']; ?></em></small></p>
<?php } ?>

<table>
<?php
foreach ($listeNote as $note)
{
?>
  <tr><td><?php echo $note['nomPrenom']; ?></td>
  <td><?php echo $note['valeur']; ?></td></tr>
<?php
}
?>
</table>