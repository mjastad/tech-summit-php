<?php

class Task {

   private $instance = null;
   private $inst_type ="task";

   function __construct($entity) {
       $this->instance = $entity;
   }

   public function completeTime() {
       return $this->instance->complete_time_usecs;
   }

   public function displayName() {
       return $this->instance->display_name;
   }

   public function message() {
       return $this->instance->message;
   }

   public function status() {
       return $this->instance->progress_status;
   }

   public function percentComplete() {
       return $this->instance->percentage_complete;
   }

   public function uuid() {
       return $this->instance->uuid;
   }

   public function _print() {
        echo  "object         => ". $this->inst_type."\n".
              "time(usec)     => ". $this->completeTime()."\n".
              "name           => ". $this->displayName()."\n".
              "message        => ". $this->message()."\n".
              "status         => ". $this->status()."\n".
              "(%) complete   => ". $this->percentComplete()."\n".
              "uuid           => ". $this->uuid()."\n\n";
   }

}

?>

