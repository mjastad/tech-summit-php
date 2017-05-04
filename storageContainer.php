<?php

class StorageContainer {
 
   private $instance = null;

   function __construct($entity) {
       $this->instance = $entity;
   }

   public function getName() {
       return $this->instance->name;
   }

   public function getUUID() {
       return $this->instance->storage_container_uuid;
   }

   public function getID() {
       return $this->instance->id;
   }

   public function getClusterUUID() {
       return $this->instance->cluster_uuid;
   }

   public function getMaxCapacity() {
       return $this->instance->max_capacity;
   }

   public function getReplicationFactor() {
       return $this->instance->replication_factor;
   }

}

?>
