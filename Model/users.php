<?php
  require_once PROJECT_ROOT_PATH . "/Model/conexion.php";
  require_once PROJECT_ROOT_PATH . "/Model/jwthandler.php";
  class UserModel extends Conexion
  {
    public function getUsers()
    {
      return $this->select("SELECT * FROM users");
    }

    public function getUser($id)
    {
      if(sizeof($this->select("SELECT * FROM users WHERE user_id=". $id)) == 0)
        throw new Exception('User Not Found.');
      return $this->select("SELECT * FROM users WHERE user_id=". $id);
    }

    public function postUser($user, $password)
    {
      $this->select("INSERT INTO users (`user`, `password`) VALUES ('$user', '$password')");
    }

    public function deleteUser($id)
    {
      if(sizeof($this->select("SELECT * FROM users WHERE user_id=". $id)) == 0)
        throw new Exception('User Not Found.');
      $this->select("DELETE FROM users WHERE user_id=".$id);
    }

    public function updateUser($id, $user, $password)
    {
      if(sizeof($this->select("SELECT * FROM users WHERE user_id=". $id)) == 0)
        throw new Exception('User Not Found.');
      $this->select("UPDATE users SET `user`='$user', `password`='$password' WHERE user_id=".$id);
    }

    public function login($user, $password)
    {
      if(sizeof($this->select("SELECT * FROM users WHERE `user`='$user' and `password`='$password'")) == 0)
        throw new Exception('User Not Found.');
      else {
        $jwtAuth = new JwtAuth('Ernesto99');
        $id = $this->select("SELECT * FROM users WHERE `user`='$user' and `password`='$password'")[0]['user_id'];
        $expirationTime = time() + 3600;
        $token = $jwtAuth->encode(array("user_id"=> $id), $expirationTime);
        return [
          'success' => 1,
          'message' => 'You have successfully logged in.',
          'token' => $token
        ];
      }
    }

  }
?>