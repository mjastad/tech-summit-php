<?php

require_once('resource.php');
require_once('storageContainer.php');

class StorageContainerResource extends Resource {

 private $RESOURCE_SC = '/storage_containers/';

 function __construct(){
    parent::__construct();
 }

 public function getAll($conn) {
    $result = parent::getAll($conn, $this->RESOURCE_SC);
    return $this->parseJson($result);
 }

 public function get($conn, $data) {
    return parent::get($conn, $this->RESOURCE_SC, $data);
 }

 public function create($conn, $data) {
    return parent::create($conn, $this->RESOURCE_SC, $data);
 }

 public function delete($conn, $data) {
    return parent::delete($conn, $this->RESOURCE_SC, $data);
 }

 public function showAll($conn){
     var_dump(json_decode(parent::getAll($conn, $this->RESOURCE_SC)));
 }

 private function parseJson($json) {
    $instances = array();
    $data = json_decode($json);
    
    foreach($data->entities as $entity)  {
       $sc = new StorageContainer($entity);
       array_push($instances,$sc);
    }

    return $instances;
 }  

}


?>
