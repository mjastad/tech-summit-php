<?php

/**
 * Class Host: A non-mutable object designed to represent a RESTful host endpoint.
 *
 * @category   Core
 * @package    presto/host.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    N/A
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */

require 'service.php';

class Host{

   private $ipaddress = "";
   private $port = "";
   private $service = null;

   function __construct($ip, $p) {
 	$this->ipaddress = $ip;
        $this->port = $p;
        $this->service = new Service();
   }

   public function getIPAddress() {
	return $this->ipaddress;
   }

   public function getPort() {
        return $this->port;
   }

   public function getServiceURL() {
        return $this->ipaddress.':'.$this->port.$this->service->getABS();
   }
}

?>
