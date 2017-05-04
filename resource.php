<?php

require_once('connection.php');

class Resource {

   private $GET    = "GET";
   private $POST   = "POST";
   private $DELETE = "DELETE";

   function __construct(){

   }

   public function create($conn, $res, $data) {
	return "parent::create(conn,res,data)";
   }

   public function getAll($conn, $res) {
        $conn->open();
	$RESULT = $conn->run($this->GET,$res,null);
        $conn->close();
       
        return $RESULT; 
   }

   public function get($conn, $res, $inst) {
	return "parent::get(conn,res,inst)";
   }

   public function delete($conn, $res, $inst) {
        return "parent::delete(conn,res,inst)";
   }
}

?>
