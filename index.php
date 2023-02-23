<?php
  require __DIR__ . "/inc/bootstrap.php";
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
  header("Access-Control-Allow-Headers: *");
  header("Content-type: application/json, text/plain");
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri = explode( '/', $uri );
  if ((isset($uri[2]) && $uri[2] != 'user' && $uri[2] != 'users' && $uri[2] != 'movie' && $uri[2] != 'movies' && $uri[2] != 'login')) {
      header("HTTP/1.1 404 Not Found");
      exit();
  }
  require PROJECT_ROOT_PATH . "/Controllers/API/UserController.php";
  require PROJECT_ROOT_PATH . "/Controllers/API/MovieController.php";
  if($uri[2] == 'login'){
    $objFeedController = new UserController();
    $strMethodName = $uri[2] . 'UserAction';
    $objFeedController->{$strMethodName}();
  } else if($uri[2] == 'user' || $uri[2] == 'users'){
    $objFeedController = new UserController();
    $strMethodName = $_SERVER['REQUEST_METHOD']. $uri[2] . 'Action';
    $objFeedController->{$strMethodName}();
  } else if($uri[2] == 'movie' || $uri[2] == 'movies'){
    $objFeedController = new MovieController();
    $strMethodName = $_SERVER['REQUEST_METHOD']. $uri[2] . 'Action';
    $objFeedController->{$strMethodName}();
  }
?>