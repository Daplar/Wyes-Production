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

  public function getComponentInfos($id)
{

    try {
        $requete = $this->bd->prepare('Select * from COMPONENT WHERE id_comp = :id_comp');
        $requete->bindValue(':id_comp', $id);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Echec getComponentInfos, erreur n°' . $e->getCode() . ':' . $e->getMessage());
    }
}


public function nb_prod_lunette()
{
  try {
    $i = 0;
    $tab = $this->getnameComp();
    foreach ($tab as $v) {
      foreach ($v as $key => $value) {
        $requete = $this->bd->prepare('SELECT * FROM COMPONENT WHERE name_comp = :name_comp');
        $requete->bindValue(':name_comp', $value);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_NUM);
        if ($value == "Verre"){
          $glass =  intval($tab[0]/2);
        }
        if ($value == "Monture"){
          $monture =  $tab[0];
        }
        if ($value == "Puce"){
          $chipset =  $tab[0];
        }
        if ($value == "Capteur"){
          $captor =  intval($tab[0]/2);
        }
      }
    }
    return min($glass,$monture,$chipset,$captor);
  }
  catch (PDOException $e) {
      die('Echec getComponentInfos, erreur n°' . $e->getCode() . ':' . $e->getMessage());
  }
}

  public function getnameComp(){
    try {
        $requete = $this->bd->prepare('SELECT * FROM NAME_COMP');
        $requete->execute();
        return $requete->fetchall(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Echec getComponentInfos, erreur n°' . $e->getCode() . ':' . $e->getMessage());
    }
  }


  public function isInDataBase($id)
{
    return $this->getComponentInfos($id) !== false;
}

public function isProdInDataBase($id_prod)
{
  return $this->getLunetteInfos($id_prod) !== false;
}


  public function addComponent($infos)
  {

      try {
          //Préparation de la requête
          $requete = $this->bd->prepare('INSERT INTO COMPONENT(serial_number_comp, name_comp, quantity) VALUES (:serial_number_comp, :name_comp, :quantity)');
          //Remplacement des marqueurs de place par les valeurs
          $marqueurs = ['serial_number_comp', 'name_comp', 'quantity'];
          foreach ($marqueurs as $value) {
              $requete->bindValue(':' . $value, $infos[$value]);
          }
          //Exécution de la requête
          //echo ('dans add component');
          return $requete->execute();
      } catch (PDOException $e) {
          die('Echec addComponent, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }

  public function less_than_20()
  {
    $nb_lunette = getNbLunettes();
    if($nb_lunette<20)
    {
      return true;
    }else{
      return false;
    }
  }

  public function removeComponent($id_comp)
{
    if (!$this->isInDataBase($id_comp)) {
        return false;
    }

    $requete = $this->bd->prepare("DELETE FROM COMPONENT WHERE id_comp = :id_comp");
    $requete->bindValue(':id_comp', intval($id_comp), PDO::PARAM_INT);
    return $requete->execute();
}

  public function getLastComp(){

    try {
            $req = $this->bd->prepare('SELECT * FROM COMPONENT ORDER BY id_comp DESC LIMIT 3');
            $req->execute();
            return $req->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Echec getLastComp, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

    public function updateQuantity($name_comp,$quantity)
    {
      try{
        $requete=$this->bd->prepare('UPDATE COMPONENT set quantity = :quantity WHERE name_comp = :name_comp');
        $requete->bindValue(':quantity',$quantity);
        $requete->bindValue(':name_comp',$name_comp);
        $requete->execute();
      }catch(PDOException $e){
        die('Echec updateQuantity, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
    }


    public function updateComponent($infos)
    {
        try {
            $requete = $this->bd->prepare('UPDATE COMPONENT SET serial_number_comp = :serial_number_comp, name_comp = :name_comp, quantity = :quantity WHERE id_comp = :id_comp');
            $marqueurs = ['id_comp','serial_number_comp', 'name_comp', 'quantity'];
            foreach ($marqueurs as $value) {
                $requete->bindValue(':' . $value, $infos[$value]);
            }
            return $requete->execute();
        } catch (PDOException $e) {
            die('Echec updateComponent, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

  public function getNbComponent()
  {
    try {
      //overview des quantitées des composants
      $requete=$this->bd->prepare('SELECT SUM(quantity) FROM COMPONENT');
      $requete->execute();
      $tab = $requete->fetch(PDO::FETCH_NUM);
      return $tab[0];
      } catch (PDOException $e) {
      die('Echec getNbComponent, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }

  public function getNamePatient($nom){
    try {
      $requete = $this->bd->prepare('SELECT * FROM PATIENT WHERE name = :name ');
      $requete->bindValue(":name",$nom);
      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die('Echec getNamePatient, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
    }
  }

    public function getNameUser($nom){
    try {
      $requete = $this->bd->prepare('SELECT * FROM USER WHERE name = :name ');
      $requete->bindValue(":name",$nom);
      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die('Echec getNameUser, erreur n°' . $e->getCode() . ' : ' . $e->getMessage());
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


  public function getLunetteInfos($id)
  {
    try {
        $requete = $this->bd->prepare('SELECT *  FROM PRODUCT WHERE id_prod = :id');
        $requete->bindValue(":id",$id);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Echec getLunette, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }


  public function addUser($infos){
    try {
        $requete = $this->bd->prepare('INSERT INTO USER(name, address, e_mail, user_status, password, login, history_user) VALUES (:name, :address, :e_mail, :user_status, :password, :login, NULL)');
        $marqueurs = ['name', 'address', 'e_mail', 'user_status', 'password', 'login'];
        foreach ($marqueurs as $value) {
          $requete->bindValue(':' . $value, $infos[$value]);
        }

        $requete->execute();
    } catch (PDOException $e) {
          die('Echec addUser, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }

  public function User_exists($login,$mdp){
    try {
      $requete = $this->bd->prepare('SELECT * FROM USER WHERE login = :login and password = :mdp');
      $requete->bindValue(":login",$login);
      $requete->bindValue(":mdp",$mdp);
      $requete->execute();
      return $requete->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        die('Echec User_exists, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }

  public function getColumnsProduct(){
    try {
      $requete = $this->bd->prepare('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "PRODUCT"');
      $requete->execute();
      return $requete->fetchall(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        die('Echec getColumnsProduct, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }

  public function getLunetteFilter($filtre, $valeur){
    try {
      $chaine = "select * from product where ".$filtre."=".$valeur;
      $requete = $this->bd->prepare($chaine);
      //print_r($requete);
      //$requete->bindValue(":filtre",$filtre);
      //$requete->bindValue(":valeur",$valeur);
      //$requete = $this->bd->prepare('SELECT * FROM PRODUCT WHERE id_prod = 1');
      $requete->execute();
      return $requete->fetchall(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        die('Echec getLunetteFilter, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
    }


    public function getAllUsers($filter,$offset = 0, $limit = 5){
      try {
        $sql = 'SELECT * FROM USER ORDER BY id_user ';
        $sql .= ' DESC LIMIT :limit OFFSET :offset';
        $bv = [];
              $bv[] = [
                  'marqueur' => ':limit',
                  'valeur'   => intval($limit),
                  'type'     => PDO::PARAM_INT
              ];

              $bv[] = [
                  'marqueur' => ':offset',
                  'valeur'   => intval($offset),
                  'type'     => PDO::PARAM_INT
              ];
              $requete = $this->bd->prepare($sql);
                    foreach ($bv as $value) {
                        $requete->bindValue($value['marqueur'], $value['valeur'], $value['type']);
                    }
                    $requete->execute();
        $requete->execute();
        return $requete->fetchall(PDO::FETCH_ASSOC);
      }catch (PDOException $e) {
          die('Echec getAllUsers, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

public function getAllPatients($filter, $offset = 0, $limit = 5){
    try {
          $sql = 'SELECT * FROM PATIENT WHERE 1=1';
          $bv = [];


          $sql .= ' ORDER BY id_patient DESC LIMIT :limit OFFSET :offset';
          $bv[] = [
              'marqueur' => ':limit',
              'valeur'   => intval($limit),
              'type'     => PDO::PARAM_INT
          ];

          $bv[] = [
              'marqueur' => ':offset',
              'valeur'   => intval($offset),
              'type'     => PDO::PARAM_INT
          ];

          //Exécution et renvoi des résultats
          $requete = $this->bd->prepare($sql);
          foreach ($bv as $value) {
              $requete->bindValue($value['marqueur'], $value['valeur'], $value['type']);
          }
          $requete->execute();
          return $requete->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          die('Echec getAllPatients, erreur n°' . $e->getCode() . ':' . $e->getMessage());
      }
  }


}

 ?>
