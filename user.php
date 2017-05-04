<?php

class User {

  private $username = "";
  private $password = "";

  function __construct($u,$pw) {
     $this->username = $u;
     $this->password = $pw;
  }

  public function getName(){
     return $this->username;
  }

  public function getPassword(){
     return $this->password;
  }

  public function getCredentials() {
     return $this->username.":".$this->password;
  }
}

?>
