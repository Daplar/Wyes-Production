<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Content/css/view.css"/>
    <title>WYES PROD</title>
    <link rel="icon" type="image/jpg" href="Content/img/logo-wyes.jpg"/>
  </head>
  <body>
    <div id="body">
      <header>
        <a href="index.php"><img src="Content/img/logo-wyes.jpg" alt="WYES"></a>
        <div class="banniere">
          <h1>Information général</h1>
          <p>Voilà</p>
        </div>
        <div class="social_media">
          <a href="https://www.facebook.com/teamwyes/"><img src="Content/img/logo_facebook.png" alt="Facebook"></a>
          <a href="http://www.instagram.com"><img src="Content/img/logo_instagram.png" alt="Instagram"></a>
        </div>
      </header>
      <nav>
        <ul>
          <li><a href="">Accueil</a></li>
          <li><a href="">Suivi produit</a></li>
          <li><a href="">Gestion retour</a></li>
          <li><a href="?controller=production&action=overview">Production</a></li>
          <li><a href="">Production</a></li>
          <li><a href="">Contact</a></li>
        </ul>
      </nav>

      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
      var liste=document.querySelector('nav ul');

      var position_top_raccourci = liste.offset().top;

      $(window).scroll(function(){
        if($(this).scrollTop() > position_top_raccourci)
        {
          liste.addClass("fixNavigation");
        }else{
          liste.removeClass("fixNavigation");
        }})

      </script>
      <div class="connexion">
        <a href="">Se connecter</a>
        <a href="">Créer un compte</a>
      </div>

      <div class="overview">
        <h2>Overview</h2>
        <p>Example</p>
      </div>
