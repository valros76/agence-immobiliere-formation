<?php
class Router{

  private static string $uri;
  private static string $method;

  public function __construct($uri = null, $method = "GET"){
    $method = strtoupper($method);

    self::$uri = $uri === null ? "/" : $uri;
    self::$method = $method;
  }

  public function getRoute($controller, $action, $params = null){
    $controller = ucfirst($controller);

    if(!str_contains($controller, "Controller")){
      $controller = "{$controller}Controller";
    }
    
    try{
      if(class_exists($controller)){
        $actualController = new $controller();
        if(method_exists($controller, $action)){
          $actualController->{$action}($params["queryString"] ??null);
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