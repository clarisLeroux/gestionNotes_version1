<?php
namespace Applications\Backend\Modules\Notes;

class NotesController extends \Library\BackController
{

// On affiche les notes uniquement du professeur concerné
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des notes');
    
    $manager = $this->managers->getManagerOf('notes');
    
	$this->page->addVar('numProf', $this->app->user()->Prof());
    $this->page->addVar('listeNotes', $manager->getList(-1,-1,$this->app->user()->Prof()));
    $this->page->addVar('nombreNotes', $manager->count());

  }

    public function executeUpdate(\Library\HTTPRequest $request)
  {
    $listeNote = $this->managers->getManagerOf('Note')->getUnique($request->getData('id'));
	$notes = $this->managers->getManagerOf('Notes')->getUnique($request->getData('id'));
	$managerEleve = $this->managers->getManagerOf('eleve');
    
	$listeEleve = $managerEleve->getEleves($notes->classe());
    
    $this->page->addVar('title', $notes->matiere());
	$this->page->addVar('notes', $notes);
    $this->page->addVar('listeNote', $listeNote);
	$this->page->addVar('listeEleve', $listeEleve);

	if ($request->postExists('valeur') && $request->postExists('eleve'))
	{
	$this->managers->getManagerOf('note')->update($request->getData('id'), $request->postData('eleve'),  $request->postData('valeur'));
	
	$this->app->user()->setFlash('La notes a bien été updaté !');
	}
  }
  
    public function executeDelete(\Library\HTTPRequest $request)
  {
    $this->managers->getManagerOf('Notes')->delete($request->getData('id'));
    $this->managers->getManagerOf('note')->delete($request->getData('id'));
    $this->app->user()->setFlash('La notes a bien été supprimée !');
    
    $this->app->httpResponse()->redirect('.');
  }
  
      public function executeDisconnect(\Library\HTTPRequest $request)
  {
        $this->app->user()->setAuthenticated(false);
		$this->app->user()->setProf(null);
		
    
    $this->app->httpResponse()->redirect('.');
  }
  
    public function executeInsert(\Library\HTTPRequest $request)
  {
  
  	$managerClasse = $this->managers->getManagerOf('classe');
	$managerMatiere = $this->managers->getManagerOf('matiere');
	$managerEleve = $this->managers->getManagerOf('eleve');
	
	$this->page->addVar('listeClasse', $managerClasse->getClasses());
	$this->page->addVar('listeMatiere', $managerMatiere->getMatiere($this->app->user()->Prof()));
	
		$listeEleve = $managerEleve->getEleves($request->postData('classe'));
		
    if ($request->postExists('matiere') && $request->postExists('dateExam'))
    {
      $this->validForm($request);
	  
	  	// On crée une note vide pour tout les élèves de la classe pour la fiche (int)id
	$idajout = $this->managers->getManagerOf('notes')->count();
	$this->managers->getManagerOf('note')->addClasse($idajout,$listeEleve);
    }
	
    
    $this->page->addVar('title', 'Ajout d\'une fiche de notes');
	
	//$this->app->httpResponse()->redirect('.');
  }
  
  public function validForm(\Library\HTTPRequest $request)
  {
    $notes = new \Library\Entities\Notes(
      array(
        'prof' => $this->app->user()->Prof(),
        'matiere' => $request->postData('matiere'),
        'dateExam' => $request->postData('dateExam'),
		'classe' => $request->postData('classe')
      )
    );
    
    
    if ($notes->isValid())
    {
      $this->managers->getManagerOf('notes')->save($notes);
      
      $this->app->user()->setFlash('La fiche de notes a bien été ajoutée !');
    }
    else
    {
      $this->page->addVar('erreurs', $notes->erreurs());
    }
    
    $this->page->addVar('notes', $notes);
  }
}
