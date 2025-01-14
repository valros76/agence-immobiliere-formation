<?php

spl_autoload_register(function ($class) {
  $class = ucfirst($class);

  if (file_exists("models/{$class}.php")) {
    require_once "models/{$class}.php";
  }
});

$bien = new Bien(BDD::connect());
$biensList = $bien::getList();
$firstBien = $bien::getById(1);

require_once "./views/home.php";
require_once "./templates/global_template.php";

// $bien::add(
//   title: "Huntsman's Harbour",
//   price: 215000,
//   price_type: "TTC",
//   offer: "achat",
//   image: "https://a0.muscache.com/im/pictures/prohost-api/Hosting-771540516262842487/original/2c9354ff-c3ac-471b-a265-3a20b5228528.jpeg?im_w=1200&im_format=avif",
//   location: "Lancashire, Angleterre, Royaume-Uni",
//   nb_rooms: 1,
//   nb_beds: 1,
//   nb_bathrooms: 1,
//   equipments: ""
// );
