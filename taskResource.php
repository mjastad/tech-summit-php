<?php

require_once('resource.php');
require_once('task.php');

class TaskResource extends Resource{

 private $RESOURCE_TK = '/tasks/';

 function __construct(){
    parent::__construct();
 }

 public function get($conn, $data) {
    $result = parent::get($conn, $this->RESOURCE_TK, $data);
    return new Task(json_decode($result));
 }

 public function status($conn, $resp, $task, $stat) {
    while(trim($task->status()) == trim($stat)){
         $task = $this->get($conn,json_decode($resp)->task_uuid);
         sleep(1);
    }

    return $task;
 }

}

?>
