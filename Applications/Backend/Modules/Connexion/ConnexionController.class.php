<?php
namespace Applications\Backend\Modules\Connexion;

class ConnexionController extends \Library\BackController
{
// Modifie l'objet user si le user et le password sont correct
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
    
    if ($request->postExists('login'))
    {
 
	  $profmanager = $this->managers->getManagerOf('Prof');
	  $login = $request->postData('login');
	  $password = $request->postData('password');
	  $prof = $profmanager->getProfesseur($login,$password);  

      if (!empty($prof) && $prof!=null)
      {
		// On remplie les champs correspondant au bon prof	  
        $this->app->user()->setAuthenticated(true);
		$this->app->user()->setProf($prof);
		
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect. ' . $login .' ' . $password . '' );
      }
    }
  }
}