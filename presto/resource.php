<?php

require_once('connection.php');
require_once('op.php');

class Resource {

   function __construct(){

   }

   public function create($conn, $res, $data) {
        $conn->open();
        $RESULT = $conn->run(OP::POST,$res,$data);
        $conn->close();

        return $RESULT;
   }

   public function getAll($conn, $res) {
        $conn->open();
	$RESULT = $conn->run(OP::GET,$res,null);
        $conn->close();
       
        return $RESULT; 
   }

   public function get($conn, $res, $inst) {
        $conn->open();
        $RESULT = $conn->run(OP::GET,$res.$inst,null);
        $conn->close();

        return $RESULT;
   }

   public function delete($conn, $res, $inst) {
        $conn->open();
        $RESULT = $conn->run(OP::DELETE,$res.$inst,null);
        $conn->close();

        return $RESULT;
   }

   public function find($conn, $target) {
     $instances = $this->getAll($conn);
     foreach ($instances as $instance){
        if($instance->getName() == $target) {
             return $instance;
        }
     }
   }

   //depricated
   public function search($source, $cmp) {
   	foreach ($source as $res){
   	    if($res->getName() == $cmp) {
       		return $res->getUUID();
            }
        }
   }
}

?>
