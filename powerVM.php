<?php

class VMPower {

   private $obj = null;

   function __construct($pwr, $id) {
       $this->obj = new stdClass();
       $this->obj->transition = $pwr;
       $this->obj->uuid = $id;
   }

   public function get() {
      return $this->obj;
   }

}


?>
