<?php

/**
 * Class Task: A non-mutable container object designed around NTNX REST endpiont Task resource.  Reference or handle to
 * background process
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header MUST NOT be removed.
 *
 * @category   Core
 * @package    presto/task.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */

class Task {

   const RUNNING = "Running";
   const FAILED  = "Failed";
   const QUEUED  = "Queued";
   const SUCCESS = "Succeeded";

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

