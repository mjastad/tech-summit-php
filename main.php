<?php

//imports
require_once('virtualMachineResource.php');
require_once('storageContainerResource.php');
require_once('imageResource.php');
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
$response = $ir->getAll($connection);
$osimgid = $ir->search($response,$OS_IMAGE);
$ngtimgid = $ir->search($response,$NGT_IMAGE);
print "search: {osimage_uuid: ".$osimgid."}\n";
print "search: {ngtimage_uuid: ".$ngtimgid."}\n";

//instantiate storage-container resource 
$scr = new StorageContainerResource();
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
print "create(vm): ".$response."\n";

sleep(5);

//search for vm uuid
$response = $vmr->getAll($connection);
$vm_uuid = $vmr->search($response,"W2K12R2");

//powerOn vm 
$response = $vmr->powerOn($connection, $vm_uuid);
print "powerOn(vm): ".$response."\n";

sleep(5);

//powerOff vm 
$response = $vmr->powerOff($connection, $vm_uuid);
print "powerOff(vm): ".$response."\n";

sleep(5);

//delete vm
$response = $vmr->delete($connection, $vm_uuid);
print "delete(vm): ".$response."\n";

?>

