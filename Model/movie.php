<?php
  require_once PROJECT_ROOT_PATH . "/Model/conexion.php";
  require_once PROJECT_ROOT_PATH . "/Model/jwthandler.php";
  class MovieModel extends Conexion
  {
    public function getMovies($token)
    {
      $jwtAuth = new JwtAuth('Ernesto99');
      $decodedPayload = $jwtAuth->decode($token);
      if($decodedPayload)
        return $this->select("SELECT * FROM movies");
      else
        throw new Exception('User not authorized to do this request.');
    }

    public function getMovie($id, $token)
    {
      $jwtAuth = new JwtAuth('Ernesto99');
      $decodedPayload = $jwtAuth->decode($token);
      if($decodedPayload){
        if(sizeof($this->select("SELECT * FROM movies WHERE movie_id=". $id)) == 0)
          throw new Exception('Movie Not Found.');
        return $this->select("SELECT * FROM movies WHERE movie_id=". $id);
      } 
      else
        throw new Exception('User not authorized to do this request.');
    }

    public function postMovie($name, $yearReleased, $description, $token)
    {
      $jwtAuth = new JwtAuth('Ernesto99');
      $decodedPayload = $jwtAuth->decode($token);
      if($decodedPayload){
        $this->select("INSERT INTO movies (`name`, `year_released`, `description`) VALUES ('$name', '$yearReleased', '$description')");
      } 
      else
        throw new Exception('User not authorized to do this request.');
    }

    public function deleteMovie($id, $token)
    {
      $jwtAuth = new JwtAuth('Ernesto99');
      $decodedPayload = $jwtAuth->decode($token);
      if($decodedPayload){
        if(sizeof($this->select("SELECT * FROM movies WHERE movie_id=". $id)) == 0)
          throw new Exception('Movie Not Found.');
        $this->select("DELETE FROM movies WHERE movie_id=".$id);
      }
      else
        throw new Exception('User not authorized to do this request.');
    }
  }
?>