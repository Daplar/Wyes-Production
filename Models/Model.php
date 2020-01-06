<?php
class Model
{
  private $bd;

  private static $instance=null;

  private function __construct()
  {
    try {
      include('Utils/log.php');
      $this->bd=new PDO($dsn,$login,$mdp);
      $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->bd->query("SET nameS 'utf8'");
    } catch (PDOException $e) {
      die('Echec connexion, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }

  public static function getModel()
  {
    if (is_null(self::$instance)) {
        self::$instance = new Model();
    }
    return self::$instance;
  }

  public function getOverview()
  {
    try {
      //overview des quantitées des composants
      $requete=$this->bd->prepare('select quantity, name from COMPONENT;');
      $requete->execute();
      $reponse=[];
      echo "OVERVIEW";
      while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
          //echo '<li>' . implode(", ", $ligne) . '</li>'; affichage v1
          //affichage v2
          echo '<li>' . $ligne['name'] .' : '. $ligne['quantity'] . '</li>';
      }
      //overview des quantitées de lunnettes
      $requete=$this->bd->prepare('select COUNT(*) from PRODUCT;');
      $requete->execute();
      $reponse=[];
      while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
          echo '<li>' . implode(", ", $ligne) . ' lunnettes dans la base de données.</li>';
      }

    } catch (PDOException $e) {
      die('Echec getOverview, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }


}

 ?>
