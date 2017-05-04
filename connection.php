<?php

require_once('user.php');
require_once('host.php');

class Connection {

   private $PROTOCOL = 'https';

   private $user = null;
   private $host = null;
   private $httpCode = "";

   private $curl = null;

   function __construct($u, $h) {
      $this->user = $u;
      $this->host = $h;
   }

   private function configure($method, $url, $json) {

      switch ($method) {
        case "POST":
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $json);
            break;
        case "PUT":
            curl_setopt($this->curl, CURLOPT_PUT, true);
            break;
        case "GET":
            curl_setopt($this->curl, CURLOPT_HTTPGET, true);
            break;
        case "DELETE":
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $json);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($json));

       }
       curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
       
   }

   public function url() {
      return $this->PROTOCOL.'://'.$this->host->getServiceURL();
   }

   private function authenticate() {
 
      //insecure mode
      curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);         //warning: allows MITM attacks
      curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);         //warning: allows MITM attacks

      //basic authentication
      curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($this->curl, CURLOPT_USERPWD, $this->user->getCredentials());
   }

   public function run($method, $resource, $data) {
      $url = $this->url().$resource;
      $this->configure ($method, $url, $data);
      $this->authenticate();

      curl_setopt($this->curl, CURLOPT_URL, $url);
      curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($this->curl);
  
      $this->httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

      return ($result);
   }

   public function getStatus() {
      return $this->httpCode;
   }

   public function open() {
      $this->curl = curl_init();
   }

   public function close() {
      curl_close($this->curl);
   }
}

?>
