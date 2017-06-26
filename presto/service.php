<?php

/**
 * Class Service: A non-mutable object designed to represent a RESTful service endpoint
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact.
 *
 * @category   Core
 * @package    presto/service.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */

class Service{
  private $ABS = '/PrismGateway/services/rest/v2.0';

  function __construct() {

  }

  public function getABS(){
     return $this->ABS;
  }
}

?>
