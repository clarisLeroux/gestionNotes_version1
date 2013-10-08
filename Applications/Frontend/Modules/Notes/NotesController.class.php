<?php
namespace Applications\Frontend\Modules\Notes;

class NotesController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
	// Exemple pour r�cup�rer une variable dans le fichier de config
    // $nombreNotes = $this->app->config()->get('nombre_notes'); bizarre l'appel � config() ne marche pas
	$nombreNotes = 10;
    
    // On ajoute une d�finition pour le titre.
    $this->page->addVar('title', 'Liste des 10 derni�res notess');
    
    // On r�cup�re le manager des news.
    $manager = $this->managers->getManagerOf('Notes');
    
	// On r�cup�re la liste des notes
    $listeNotes = $manager->getList(0, $nombreNotes);
    
    // On ajoute la variable $listeNews � la vue.
    $this->page->addVar('listeNotes', $listeNotes);
  }
  
    public function executeShow(\Library\HTTPRequest $request)
  {
    $listeNote = $this->managers->getManagerOf('Note')->getUnique($request->getData('id'));
	$notes = $this->managers->getManagerOf('Notes')->getUnique($request->getData('id'));
    
    
    $this->page->addVar('title', $notes->matiere());
	$this->page->addVar('notes', $notes);
    $this->page->addVar('listeNote', $listeNote);
  }
}