<?php

class VM {

   private $instance = null;

   function __construct($entity) {
       $this->instance = $entity; 
   }

   public function getName() {
       return $this->instance->name;
   }

   public function getDescription() {
       return $this->instance->description;
   }

   public function getMemory() {
       return $this->instance->memory_mb;
   }

   public function getVCPUCores() {
       return $this->instance->num_cores_per_vcpu;
   }

   public function getVCPUs() {
       return $this->instance->num_vcpus;
   }

   public function getPowerState() {
       return $this->instance->power_state;
   }

   public function getUUID() {
       return $this->instance->uuid;
   }

}

?>
