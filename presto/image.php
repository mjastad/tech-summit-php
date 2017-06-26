<?php

/**
 *  Class Image: A non-mutable container pattern object designed around NTNX REST endpiint Image resource.
 *
 * @category   Core
 * @package    Class Image.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    N/A
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */


class Image {

   private $instance = null;
   private $inst_type ="image";

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

   public function _print() {
        echo  "object         => ". $this->inst_type."\n".
              "name           => ". $this->getName()."\n".
              "uuid           => ". $this->getUUID()."\n".
              "container uuid => ". $this->getStorageContainerUUID()."\n".
              "contianer id   => ". $this->getStorageContainerID()."\n".
              "type           => ". $this->getType()."\n".
              "vm disk uuid   => ". $this->getVMDiskID()."\n\n";
   }

}

?>
