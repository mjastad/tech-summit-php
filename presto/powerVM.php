<?php

/**
 * Class VMPower: Container class defining JSON body for VM power state change
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact.
 *
 * @category   Core
 * @package    presto/VMPower.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */


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
