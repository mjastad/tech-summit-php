<?php

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
