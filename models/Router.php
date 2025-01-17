<?php
class Router{

  private static string $uri;
  private static string $method;
  private static ?string $queryString;

  public function __construct($uri = null, $method = "GET", $queryString = null){
    $method = strtoupper($method);

    self::$uri = $uri === null ? "/" : $uri;
    self::$method = $method;
    self::$queryString = $queryString ?? null;
  }

  public function getRoute($controller, $action){
    $controller = ucfirst($controller);

    if(!str_contains($controller, "Controller")){
      $controller = "{$controller}Controller";
    }
    
    try{
      if(class_exists($controller)){
        $actualController = new $controller();
        if(method_exists($controller, $action)){
          $actualController->{$action}(self::$queryString);
        }else{
          throw new Exception("L'action n'existe pas.");
        }
      }else{
        throw new Exception("La classe n'existe pas.");
      }
    }catch(Exception $e){
      die("Erreur : {$e->getMessage()}.");
    }
  }

}