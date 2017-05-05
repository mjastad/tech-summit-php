<?php

class VM {

   private $instance = null;
   private $inst_type = "vm";

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

   public function _print() {
        echo  "object         => ". $this->inst_type."\n". 
              "name           => ". $this->getName()."\n".
              "uuid           => ". $this->getUUID()."\n".
              "description    => ". $this->getDescription()."\n".
              "memory         => ". $this->getMemory()."\n".
              "vcpu cores     => ". $this->getVCPUCores()."\n".
              "vcpu           => ". $this->getVCPUs()."\n".
              "power state    => ". $this->getPowerState()."\n\n";
   }

}

?>
