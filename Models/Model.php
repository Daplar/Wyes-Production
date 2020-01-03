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
      $requete=$this->bd->prepare('');
      $requete->execute();
      $reponse=[];
      while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
          $reponse[] = $ligne['category'];
      }
      return $reponse;
    } catch (PDOException $e) {
      die('Echec getOverview, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }

  
}

 ?>
