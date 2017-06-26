<?php

/**
 * Class VM: Class VirtualMachine: A non-mutable container object designed around NTNX REST
 * endpoint VMS resource.
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact.
 *
 * @category   Core
 * @package    presto/virtualMachine.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */


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
