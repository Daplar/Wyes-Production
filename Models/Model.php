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
      $requete=$this->bd->prepare('SELECT COUNT(*) FROM PRODUCT');
      $requete->execute();
      $tab = $requete->fetch(PDO::FETCH_NUM);
      return $tab[0];
    } catch (PDOException $e) {
      die('Echec getNbLunettes, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }

  public function less_than_20()
  {
    $nb_lunette=getNbLunettes();
    if($nb_lunette<20)
    {
      return true;
    }else{
      return false;
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

  public function getNamePatient($nom){
    try {
      $requete = $this->bd->prepare('SELECT * FROM PATIENT WHERE name = :m ');
      $requete->bindValue(":m",$nom);
      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die('Echec getNamePatient, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }

  public function getLastPatient()
  {
    try {
        $req = $this->bd->prepare('SELECT * FROM PATIENT ORDER BY id_patient DESC LIMIT 25');
        $req->execute();
        return $req->fetchall(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Echec getLastPatient, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }

  public function getLunette($id)
  {
    try {
        $requete = $this->bd->prepare('SELECT * FROM PRODUCT WHERE id_prod = :id');
        $requete->bindValue(":id",$id);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Echec getLunette, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }


}

 ?>
