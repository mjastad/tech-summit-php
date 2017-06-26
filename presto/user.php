<?php

/**
 * Class User: A non-mutable object designed to represent a user of a host RESTful endpoint.
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact.
 *
 * @category   Core
 * @package    presto/user.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */

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
