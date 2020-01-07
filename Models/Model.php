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

  public function getNblunettes()
  {
    try {
      //overview des quantitées des composants
      $req=$this->bd->prepare('SELECT COUNT(*) FROM PRODUCT');
      $req->execute();
      $tab = $req->fetch(PDO::FETCH_NUM);
      return $tab[0];
    } catch (PDOException $e) {
      die('Echec getNblunettes, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }



}

 ?>
