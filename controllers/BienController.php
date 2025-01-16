<?php
class BienController
{

  public static function index()
  {
    $bien = new Bien(BDD::connect());
    $biensList = $bien::getList();

    require_once "views/home.php";
    require_once "templates/global_template.php";
  }

  public static function add()
  {
    require_once "views/add_bien.php";
    require_once "templates/global_template.php";
  }

  public static function push()
  {
    $title = isset($_POST["title"]) && !empty($_POST["title"]) ? $_POST["title"] : null;
    $price = (int) $_POST["price"] ?? null;
    $price_type = $_POST["price_type"] ?? null;
    $offer = $_POST["offer"] ?? null;
    $image = isset($_POST["image"]) && !empty($_POST["image"]) ? $_POST["image"] : null;
    $location = isset($_POST["location"]) && !empty($_POST["location"]) ? $_POST["location"] : null;
    $nb_rooms = (int) $_POST["nb_rooms"] ?? null;
    $nb_beds = (int) $_POST["nb_beds"] ?? null;
    $nb_bathrooms = (int) $_POST["nb_bathrooms"] ?? null;
    $equipments = $_POST["equipments"] ?? "";

    if (
      $title === null
      || $price === null
      || $price_type === null
      || $offer === null
      || $image === null
      || $location === null
      || $nb_rooms === null
      || $nb_beds === null
      || $nb_bathrooms === null
    ) {
      header("Location:/biens/add");
      exit;
    }

    $bien = new Bien(BDD::connect());
    if ($bien::add(
      title: $title,
      price: $price,
      price_type: $price_type,
      offer: $offer,
      image: $image,
      location: $location,
      nb_rooms: $nb_rooms,
      nb_beds: $nb_beds,
      nb_bathrooms: $nb_bathrooms,
      equipments: $equipments
    ) != false) {
      header("Location:/");
      exit;
    } else {
      header("Location:/biens/add");
      exit;
    }
  }

  public static function show($queryString = null)
  {
    if ($queryString === null) {
      header("Location:/");
      exit;
    }

    $param = self::transformQueryString($queryString);
    $param = $param["id"] ?? null;
    if($param === null){
      header("Location:/");
      exit;
    }

    $bien = new Bien(BDD::connect());
    $actualBien = $bien::getById($param);

    require_once "views/show_bien.php";
    require_once "templates/global_template.php";
  }

  public static function delete(){
    $id = $_POST["id"] ?? null;
    
    if($id === null){
      header("Location:/");
      exit;
    }

    $bien = new Bien(BDD::connect());
    $bien->deleteById($id);
    header("Location:/");
    exit;
  }

  public static function transformQueryString(string $queryString)
  {
    $params = [];
    if (str_contains($queryString, "&")) {
      $params = explode("&", $queryString);
      foreach ($params as $key => $param) {
        $param = explode("=", $param);
        $params = array_merge($params, [
          $param[0] => $param[1]
        ]);
        unset($params[$key]);
      }
      return $params;
    }

    $params = explode("=", $queryString);
    $params = [
      $params[0] => $params[1]
    ];
    return $params;
  }
}
