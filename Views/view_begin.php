<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Content/css/view.css"/>
    <title>WYES PRODUCTION</title>
    <link rel="icon" type="image/jpg" href="Content/img/logo-wyes.jpg"/>
  </head>
  <body>
    <div id="body">
      <header>
        <a href="index.php"><img id="logo" src="Content/img/logo-wyes.jpg" alt="WYES"></a>
        <div class="banniere">
          <center><h1>WYES PRODUCTION</h1></center>
          <div style="text-align:center">Site professionnel de gestion de production</p></div>
        </div>
        <div class="social_media">
          <a href="https://www.facebook.com/teamwyes/" target=_blank><img src="Content/img/logo_facebook.png" alt="Facebook"></a>
          <a href="https://twitter.com/teamwyes?lang=fr" target=_blank><img src="Content/img/logo_twitter.png" alt="Twitter"></a>
        </div>
      </header>
      <nav>
        <div id="color">
          <ul>
            <li><a href="?controller=home">Accueil</a></li>
            <li><a href="?controller=suivi">Suivi produit</a></li>
            <li><a href="?controller=patient">Gestion patient</a></li>
            <li><a href="?controller=production">Production</a></li>
            <li><a href="?controller=gestion_user">Gestion utilisateur</a></li>
          </ul>
        </div>
      </nav>

      <script type="text/javascript">
      var include = function(url, callback){
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = url + '?' + (new Date().getTime());

      if (callback) {
          script.onreadystatechange = callback;
          script.onload = script.onreadystatechange;
      }

      document.getElementsByTagName('head')[0].appendChild(script);
      }

      include('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', function() {
        var liste=document.querySelector('nav');
        var position_top_raccourci = $(liste).offset().top;
        var scroll=document.querySelector('div.scroll');

        $(window).scroll(function(){
          if($(this).scrollTop() > position_top_raccourci)
          {
            $(liste).removeClass("nav");
            $(liste).addClass("fixNavigation");
            $(scroll).removeClass("scroll");
            $(scroll).addClass("scroll2");
          }else{
            $(liste).removeClass("fixNavigation");
            $(liste).addClass("nav");
            $(scroll).removeClass("scroll2");
            $(scroll).addClass("scroll");
          }})
      })
      </script>

    <div class="scroll">
      <div class="connexion">
        <a href="?controller=user&action=form_connection">Se connecter</a>
        <a href="?controller=user&action=form_create">Créer un compte</a>
      </div>

      <div class="overview">
        <h2>Informations Générales</h2>
        <p>La dernière série de production a eu lieu il y a <?= "3" ?> jours</p>
      </div>
      <div class="contenu">
    </div>
