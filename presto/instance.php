<?php

/**
 * Class instance: Parent class for resource
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact.
 *
 * @category   Core
 * @package    presto/instance.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    N/A
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated Class deprecated in Release 1.0.1
 */


class Instance {

  private $INSTANCE = null;

  function __construct() {
     $this->INSTANCE = array(); 
  }

  public function getInstance() {
      return $this->INSTANCE;
  }

  public function addKV($key, $value) {
	$this->INSTANCE[$key]=$value;
  }
}

?>
