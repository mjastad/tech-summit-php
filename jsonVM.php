<?php

class VMJson {

   private $obj = null;

   function __construct() {
       $this->obj = new stdClass();
       $this->obj->hypervisor_type="ACROPOLIS";
       $this->obj->affinity=null;
   }

   public function description($d) {
       $this->obj->description = $d;
   }

   public function guest_os($os) {
       $this->obj->guest_os = $os;
   }   

   public function memory_mb($m) {
       $this->obj->memory_mb = $m;
   }

   public function name($n) {   
       $this->obj->name = $n;
   }

   public function cores_vcpu($cv) {   
       $this->obj->num_cores_per_vcpu = $cv;
   }

   public function vcpu($v) {
       $this->obj->num_vcpus = $v;
   }

   public function ref($os_vmdsk_uid,$scuid,$cap,$ngt_vmdsk_uid) {
       $this->obj->vm_disks = array(array(
                                 "disk_address" => array(
                                        "device_bus" => "ide",
                                        "device_index" => 0
                                 ),
                                 "is_cdrom" => true,
                                 "is_empty" => false,
                                 "vm_disk_clone" => array(
                                         "disk_address" => array(
                                                "vmdisk_uuid" => $os_vmdsk_uid
                                         )
                                  )),
                                  array(
				  "disk_address" => array(
				          "device_bus" => "scsi", 
					  "device_index" => 0
				  ),
				  "vm_disk_create" => array(
					   "storage_container_uuid" => $scuid,
					   "size" => $cap
				  )),
                                  array(
				  "disk_address" => array(
					"device_bus" => "ide", 
					"device_index" => 1
				  ), 
				  "is_cdrom" => true, 
				  "is_empty" => false, 
				  "vm_disk_clone" => array(
					 "disk_address" => array(
					          "vmdisk_uuid" => $ngt_vmdsk_uid
                                          )
			           ))
			     );
                         

    } 

    public function get() {
       return $this->obj;
    }

}


?>
