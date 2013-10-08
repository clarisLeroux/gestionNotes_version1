<h2>Ajouter une fiche de notes</h2>

<form action="" method="post">
  <p>
  <fieldset>
  <legend>Création de la fiche :</legend>
    Professeur : <?php echo $this->app->user()->Prof() ?><br />
	Matiere : <select name="matiere">
		<?php
	foreach($listeMatiere as $matiere)
	{
		echo '<option value="' . $matiere->id() .'"> ' . $matiere->nom() . ' </option>';
	}
	?>
	</select> <br />
	Date Exam (format : AAAA-MM-JJ HH:MM:SS): <input type="text" name="dateExam" value="" required /><br />
	Classe : <select name="classe">
	<?php
	foreach($listeClasse as $classe)
	{
		echo '<option value="' . $classe->id() .'"> ' . $classe->nom() . ' </option>';
	}
	?>
	</select>
	</fieldset>
  <input type="submit" value="Ajouter" />
  
  </p>
</form>