<?php

require_once('connection.php');

class Resource {

   private $GET    = "GET";
   private $POST   = "POST";
   private $DELETE = "DELETE";

   function __construct(){

   }

   public function create($conn, $res, $data) {
        $conn->open();
        $RESULT = $conn->run($this->POST,$res,$data);
        $conn->close();

        return $RESULT;
   }

   public function getAll($conn, $res) {
        $conn->open();
	$RESULT = $conn->run($this->GET,$res,null);
        $conn->close();
       
        return $RESULT; 
   }

   public function get($conn, $res, $inst) {
        $conn->open();
        $RESULT = $conn->run($this->GET,$res.$inst,null);
        $conn->close();

        return $RESULT;
   }

   public function delete($conn, $res, $inst) {
        $conn->open();
        $RESULT = $conn->run($this->DELETE,$res.$inst,null);
        $conn->close();

        return $RESULT;
   }

   public function search($source, $cmp) {
   	foreach ($source as $res){
   	    if($res->getName() == $cmp) {
       		return $res->getUUID();
            }
        }
   }
}

?>
