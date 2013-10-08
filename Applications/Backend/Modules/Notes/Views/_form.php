<form action="" method="post">
  <p>
    <?php if (isset($erreurs) && in_array(\Library\Entities\notes::PROF_INVALIDE, $erreurs)) echo 'Le professeur est invalide.<br />'; ?>
    <label>Professeur</label>
    <input type="text" name="prof" value="<?php if (isset($notes)) echo $notes['prof']; ?>" /><br />
    
    <?php if (isset($erreurs) && in_array(\Library\Entities\notes::TITRE_INVALIDE, $erreurs)) echo 'Le titre est invalide.<br />'; ?>
    <label>Titre</label><input type="text" name="titre" value="<?php if (isset($notes)) echo $notes['titre']; ?>" /><br />
    
    <?php if (isset($erreurs) && in_array(\Library\Entities\notes::CONTENU_INVALIDE, $erreurs)) echo 'Le contenu est invalide.<br />'; ?>
    <label>Contenu</label><textarea rows="8" cols="60" name="contenu"><?php if (isset($notes)) echo $notes['contenu']; ?></textarea><br />
<?php
if(isset($notes) && !$notes->isNew())
{
?>
    <input type="hidden" name="id" value="<?php echo $notes['id']; ?>" />
    <input type="submit" value="Modifier" name="modifier" />
<?php
}
else
{
?>
    <input type="submit" value="Ajouter" />
<?php
}
?>
  </p>
</form>