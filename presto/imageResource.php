<?php

/**
 * Class ImageService: A service pattern object designed around NTNX Image resource RESTful operations.
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact
 *
 * @category   Core
 * @package    presto/imageResource.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    N/A
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */

require_once('resource.php');
require_once('image.php');

class ImageResource extends Resource {

 private $RESOURCE_IM = '/images/';

 function __construct(){
    parent::__construct();
 }

 public function getAll($conn) {
    $result = parent::getAll($conn, $this->RESOURCE_IM);
    return $this->parseJson($result);
 }

 public function get($conn, $data) {
    $result = parent::get($conn, $this->RESOURCE_IM, $data);
    return new Image(json_decode($result));
 }

 public function create($conn, $data) {
    return parent::create($conn, $this->RESOURCE_IM, $data);
 }

 public function delete($conn, $data) {
    return parent::delete($conn, $this->RESOURCE_IM, $data);
 }

 public function showAll($conn){
    var_dump(json_decode(parent::getAll($conn, $this->RESOURCE_IM)));
 }

 public function find($conn, $target) {
    return parent::find($conn, $target);
 }

 private function parseJson($json) {
    $instances = array();
    $data = json_decode($json);

    foreach($data->entities as $entity)  {
       $image = new Image($entity);      
       array_push($instances,$image);
    }      

    return $instances;
 }

}

?>
