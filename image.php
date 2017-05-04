<?php

class Image {

   private $instance = null;

   function __construct($entity) {
       $this->instance = $entity;
   }

   public function getName() {
       return $this->instance->name;
   }

   public function getUUID() {
       return $this->instance->uuid;
   }

   public function getStorageContainerUUID() {
       return $this->instance->storage_container_uuid;
   }

   public function getStorageContainerId() {
       return $this->instance->storage_container_id;
   }

   public function getType() {
       return $this->instance->image_type;
   }

   public function getVMDiskId() {
       return $this->instance->vm_disk_id;
   }

}

?>
