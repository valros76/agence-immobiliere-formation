<?php

spl_autoload_register(function ($class) {
  $class = ucfirst($class);

  if (file_exists("models/{$class}.php")) {
    require_once "models/{$class}.php";
  }

  if (file_exists("controllers/{$class}.php")) {
    require_once "controllers/{$class}.php";
  }
});

try {
  $uri = $_SERVER["REQUEST_URI"];
  $method = $_SERVER["REQUEST_METHOD"] ?? "GET";
  $queryString = $_SERVER["QUERY_STRING"] ?? null;
  $router = new Router($uri, $method);

  $uri = str_replace("?", "", $uri);
  if($queryString != null){
    $uri = str_replace($queryString, "", $uri);
  }

  if ($method === "GET") {
    switch (true) {
      case ($uri === "/"):
        $router->getRoute("Bien", "index");
        break;
      case ($uri === "/bien"):
        /**
         * Objectif : Obtenir un index "queryString" à la place de l'index "0" du tableau params, dans la méthode getRoute.
         */
        $router->getRoute("Bien", "show", ["queryString" => $queryString]);
        break;
      case ($uri === "/biens/add"):
        $router->getRoute("Bien", "add");
        break;
      default:
        throw new Exception("La route est inconnue en méthode GET.");
    }
  }

  if ($method === "POST") {
    switch (true) {
      case ($uri === "/biens/add"):
        $router->getRoute("Bien", "push");
        break;
      case ($uri === "/biens/delete"):
        $router->getRoute("Bien", "delete");
        break;
      default:
        throw new Exception("La route est inconnue en méthode POST.");
    }
  }
} catch (Exception $e) {
  echo "Erreur 404";
}

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
