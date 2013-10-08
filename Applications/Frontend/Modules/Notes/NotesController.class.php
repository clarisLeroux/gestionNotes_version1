<?php
namespace Applications\Frontend\Modules\Notes;

class NotesController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
	// Exemple pour récupérer une variable dans le fichier de config
    // $nombreNotes = $this->app->config()->get('nombre_notes'); bizarre l'appel à config() ne marche pas
	$nombreNotes = 10;
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des 10 dernières notess');
    
    // On récupère le manager des news.
    $manager = $this->managers->getManagerOf('Notes');
    
	// On récupère la liste des notes
    $listeNotes = $manager->getList(0, $nombreNotes);
    
    // On ajoute la variable $listeNews à la vue.
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