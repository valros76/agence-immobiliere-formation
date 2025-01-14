<?php
class Bien{

  private int $id;
  private string $title;
  private int $price;
  private string $price_type;
  private string $offer;
  private string $image;
  private string $location;
  private int $nb_rooms;
  private int $nb_beds;
  private int $nb_bathrooms;
  private string $equipments;
  private string $creation_date;
  private static $bdd;

  public function __construct($bdd = null){
    if(!is_null($bdd)){
      self::setBdd($bdd);
    }
  }

  public function getId(){
    return $this->id;
  }

  public function setId(int $id){
    $this->id = $id;
  }

  public function getTitle(){
    return $this->title;
  }

  public function setTitle(string $title){
    $this->title = $title;
  }

  public function getPrice(){
    return $this->price;
  }

  public function setPrice(int $price){
    $this->price = $price;
  }

  public function getPriceType(){
    return $this->price_type;
  }

  public function setPriceType(int $price_type){
    $this->price_type = $price_type;
  }

  public function getOffer(){
    return $this->offer;
  }

  public function setOffer(string $offer){
    $this->offer = $offer;
  }

  public function getImage(){
    return $this->image;
  }

  public function setImage(string $image){
    $this->image = $image;
  }

  public function getLocation(){
    return $this->location;
  }

  public function setLocation(string $location){
    $this->location = $location;
  }

  public function getNbRooms(){
    return $this->nb_rooms;
  }

  public function setNbRooms(int $nb_rooms){
    $this->nb_rooms = $nb_rooms;
  }

  public function getNbBeds(){
    return $this->nb_beds;
  }

  public function setNbBeds(int $nb_beds){
    $this->nb_beds = $nb_beds;
  }

  public function getNbBathrooms(){
    return $this->nb_bathrooms;
  }

  public function setNbBathrooms(int $nb_bathrooms){
    $this->nb_bathrooms = $nb_bathrooms;
  }

  public function getEquipments(){
    return $this->equipments;
  }

  public function setEquipments(string $equipments){
    $this->equipments = $equipments;
  }

  public function getCreationDate(){
    return $this->creation_date;
  }

  public function setCreationDate(string $creation_date){
    $this->creation_date = $creation_date;
  }

  public static function add(
    string $title,
    int $price,
    string $price_type,
    string $offer,
    string $image,
    string $location,
    int $nb_rooms,
    int $nb_beds,
    int $nb_bathrooms,
    string $equipments
  ){
    $req = self::$bdd->prepare("INSERT INTO biens(
      title,
      price,
      price_type,
      offer,
      image,
      location,
      nb_rooms,
      nb_beds,
      nb_bathrooms,
      equipments
    ) VALUES(
      :title,
      :price,
      :price_type,
      :offer,
      :image,
      :location,
      :nb_rooms,
      :nb_beds,
      :nb_bathrooms,
      :equipments
    )");
    $req->bindValue(":title", $title, PDO::PARAM_STR);
    $req->bindValue(":price", $price, PDO::PARAM_INT);
    $req->bindValue(":price_type", $price_type, PDO::PARAM_STR);
    $req->bindValue(":offer", $offer, PDO::PARAM_STR);
    $req->bindValue(":image", $image, PDO::PARAM_STR);
    $req->bindValue(":location", $location, PDO::PARAM_STR);
    $req->bindValue(":nb_rooms", $nb_rooms, PDO::PARAM_INT);
    $req->bindValue(":nb_beds", $nb_beds, PDO::PARAM_INT);
    $req->bindValue(":nb_bathrooms", $nb_bathrooms, PDO::PARAM_INT);
    $req->bindValue(":equipments", $equipments, PDO::PARAM_STR);

    return $req->execute();
  }

  public static function getList(){
    $req = self::$bdd->prepare("SELECT * FROM biens ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $datas;
  }

  public static function getById(int $id){
    $req = self::$bdd->prepare("SELECT * FROM biens WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $data;
  }

  private static function setBdd($bdd){
    self::$bdd = $bdd;
  }

}