<?php

require 'resource.php';
require_once('virtualMachine.php');

class VirtualMachineResource extends Resource {

 private $RESOURCE_VM = '/vms/';
 private $RESOURCE_VM_PWR_STATE='/set_power_state/';

 function __construct(){
    parent::__construct();
 }

 public function getAll($conn) {
    $result = parent::getAll($conn, $this->RESOURCE_VM);
    return $this->parseJson($result);
 }

 public function get($conn, $data) {
    $result = parent::get($conn, $this->RESOURCE_VM, $data);
    return new VM(json_decode($result));
 }

 public function create($conn, $data) {
    return parent::create($conn, $this->RESOURCE_VM, $data);
 }

 public function delete($conn, $data) {
    return parent::delete($conn, $this->RESOURCE_VM, $data);
 }

 public function powerOn($conn, $data) {
    return parent::create($conn, $this->RESOURCE_VM, $data);
 }

 public function powerOff($conn, $data) {
    return parent::create($conn, $this->RESOURCE_VM, $data);
 }

 public function showAll($conn){
     var_dump(json_decode(parent::getAll($conn, $this->RESOURCE_VM)));
 }

 private function parseJson($json) {
    $instances = array();
    $data = json_decode($json);

    foreach($data->entities as $entity)  {
       $vm = new VM($entity);
       array_push($instances,$vm);
    }

    return $instances;
 }
  
}

?>
