<?php

//imports
require_once('virtualMachineResource.php');
require_once('storageContainerResource.php');
require_once('imageResource.php');
require_once('taskResource.php');
require_once('host.php');
require_once('user.php');
require_once('connection.php');
require_once('utilities.php');
require_once('jsonVM.php');

//variables
$USER   = "admin";
$PASSWD = "passw0rd";
$IPADDR = "10.68.69.102";
$PORT   = "9440";

$DEF_CONTAINER = "default-container-51367838548457";
$ISO_CONTAINER = "ISOs";
$OS_IMAGE = "Windows Server 2012 R2";
$NGT_IMAGE = "Nutanix Virt-IO";
$VDISK_CAPACITY = 10737418240; 

//instantiate user
$user = new User($USER, $PASSWD);

//instantiate host
$host = new Host($IPADDR, $PORT);

//instantiate connection
$connection = new Connection($user, $host);

//instantiate virtual-machine resource 
$vmr = new VirtualMachineResource();

//instantiate image resource
$ir = new ImageResource();

//instantiate storage-container resource
$scr = new StorageContainerResource();

//instantiate task resource
$tr = new TaskResource();

//search + display os-image resource
$response = $ir->getAll($connection);
$osimgid = $ir->search($response,$OS_IMAGE);
print "search: {osimage_uuid: ".$osimgid."}\n";

//search + display ngt-image resource
$ngtimgid = $ir->search($response,$NGT_IMAGE);
print "search: {ngtimage_uuid: ".$ngtimgid."}\n";

//search + display container resource
$response = $scr->getAll($connection);
$defscid = $scr->search($response,$DEF_CONTAINER);
print "search: {storage-container_uuid: ".$defscid."}\n";

//initialize vm-json
$vmJson = new VMJson();
$vmJson->description("Tech Summit");
$vmJson->name("W2K12R2");
$vmJson->guest_os("Windows Server 2012");
$vmJson->memory_mb(2000);
$vmJson->cores_vcpu(1);
$vmJson->vcpu(1);
$vmJson->ref($osimgid,$defscid,$VDISK_CAPACITY,$ngtimgid);

//create vm
$response = $vmr->create($connection, json_encode($vmJson->get()));

//check create-vm task
$task = $tr->get($connection,json_decode($response)->task_uuid);
$task = $tr->status($connection,$response,$task,"Running");
print "create(vm): ".$task->status()."\n";

//search for vm uuid
$response = $vmr->getAll($connection);
$vm_uuid = $vmr->search($response,"W2K12R2");

//powerOn vm 
$response = $vmr->powerOn($connection, $vm_uuid);

//check powerOn task
$task = $tr->get($connection,json_decode($response)->task_uuid);
$task = $tr->status($connection,$response,$task,"Running");
print "powerOn(vm): ".$task->status()."\n";

//powerOff vm 
$response = $vmr->powerOff($connection, $vm_uuid);

//check powerOff task
$task = $tr->get($connection,json_decode($response)->task_uuid);
$task = $tr->status($connection,$response,$task,"Running");
print "powerOff(vm): ".$task->status()."\n";

//delete vm
$response = $vmr->delete($connection, $vm_uuid);

//check delete task
$task = $tr->get($connection,json_decode($response)->task_uuid);
$task = $tr->status($connection,$response,$task,"Running");
print "delete(vm): ".$task->status()."\n";

?>

