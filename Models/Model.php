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

  public function getNbLunettes()
  {
    try {
      //overview des quantitées des lunettes
      $req=$this->bd->prepare('SELECT COUNT(*) FROM PRODUCT');
      $req->execute();
      $tab = $req->fetch(PDO::FETCH_NUM);
      return $tab[0];
    } catch (PDOException $e) {
      die('Echec getNbLunettes, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }
  public function getNbComponent()
  {
    try {
      //overview des quantitées des composants
      $requete=$this->bd->prepare('select quantity, name from COMPONENT;');
      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
      die('Echec getNbComponent, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }



}

 ?>
