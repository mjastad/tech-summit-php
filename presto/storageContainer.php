<?php

/**
 * Class StorageContainer: A non-mutable container object designed around NTNX REST
 * endpoint StorageContainer resource.
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header 
 * MUST NOT be removed.
 *
 * @category   Core
 * @package    presto/storageContainer.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */

class StorageContainer {
 
   private $instance = null;
   private $inst_type = "storage-container";

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

   public function _print() {
	echo  "object         => ". $this->inst_type."\n".
              "name           => ". $this->getName()."\n".
              "uuid           => ". $this->getUUID()."\n".
              "id             => ". $this->getID()."\n".
              "cluster uuid   => ". $this->getClusterUUID()."\n".
              "max capacity   => ". $this->getMaxCapacity()."\n".
              "r-factor       => ". $this->getReplicationFactor()."\n\n";
   }
}

?>
