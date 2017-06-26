<?php

/**
 * Class TaskResource: Service class opersting on behalf of a task reference or handle.
 *
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact.
 *
 * @category   Core
 * @package    presto/taskResource.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated N/A
 */


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

 public function status($conn, $resp, $stat) {
    $task = $this->get($conn,json_decode($resp)->task_uuid);

    while(trim($task->status()) == trim($stat)){
         $task = $this->get($conn,json_decode($resp)->task_uuid);
         sleep(1);
    }

    return $task;
 }

}

?>
