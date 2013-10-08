<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>
      <?php if (!isset($title)) { ?>
        Mon super site
      <?php } else { echo $title; } ?>
    </title>
    
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    
    <link rel="stylesheet" href="/css/Envision.css" type="text/css" />
  </head>
  
  <body>
    <div id="wrap">
      <div id="header">
        <h1 id="logo-text"><a href="/">Mon super site</a></h1>
        <p id="slogan">Comment �a � il n'y a presque rien � ?</p>
      </div>
      
      <div  id="menu">
        <ul>
          <li><a href="/">Accueil</a></li>
		  <li><a href="/admin/disconnect.html">Deconnexion</a></li>
          <?php if ($user->isAuthenticated() && $user->Prof()!=null) {
		  $prof1 = $user->Prof();
		  echo '<li> Bienvenue : '; echo $prof1 ;
		  }
          echo '<li><a href="/admin/">Admin</a></li>';
          echo '<li><a href="/admin/notes-insert.html">Ajouter une notes</a></li>';
          ?>
        </ul>
      </div>
      
      <div id="content-wrap">
        <div id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?php echo $content; ?>
        </div>
      </div>
    
      <div id="footer"></div>
    </div>
  </body>
</html>