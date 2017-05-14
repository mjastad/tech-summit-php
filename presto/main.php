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

//host && user variables
$USER   = "admin";
$PASSWD = "passw0rd";
$IPADDR = "10.68.69.102";
$PORT   = "9440";

//resource variables
$DEF_CONTAINER  = "default-container-51367838548457";
$ISO_CONTAINER  = "ISOs";
$OS_IMAGE       = "Windows Server 2012 R2";
$NGT_IMAGE      = "Nutanix Virt-IO";

//vm settings
$VM_DESC	= "Tech Summit 2017";
$VM_NAME        = "W2K12R2"; 
$VM_GUEST_OS    = "Windows Server 2012 R2"; 
$VM_MEMORY      = 2000; 
$VM_VCPU_CORE   = 1; 
$VM_VCPU        = 1; 
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
$osimage = $ir->find($connection,$OS_IMAGE);
print "search: {osimage_uuid: ".$osimage->getVMDiskId()."}\n";

//search + display ngt-image resource
$ngtimage = $ir->find($connection,$NGT_IMAGE);
print "search: {ngtimage_uuid: ".$ngtimage->getVMDiskId()."}\n";

//search + display storage-container resource
$defsc = $scr->find($connection,$DEF_CONTAINER);
print "search: {storage-container_uuid: ".$defsc->getUUID()."}\n";

//initialize vm-json
$vmJson = new VMJson();
$vmJson->description($VM_DESC);
$vmJson->name($VM_NAME);
$vmJson->guest_os($VM_GUEST_OS);
$vmJson->memory_mb($VM_MEMORY);
$vmJson->cores_vcpu($VM_VCPU_CORE);
$vmJson->vcpu($VM_VCPU);
$vmJson->ref($osimage->getVMDiskId(),$defsc->getUUID(),$VDISK_CAPACITY,$ngtimage->getVMDiskId());

//create vm
$response = $vmr->create($connection, $vmJson);

//check create-vm task
$task = $tr->status($connection,$response,task::RUNNING);
print "create(vm): ".$task->status()."\n";

//find created vm 
$vm = $vmr->find($connection,$VM_NAME);

//powerOn vm 
$response = $vmr->powerOn($connection, $vm);

//check powerOn task
$task = $tr->status($connection,$response,task::RUNNING);
print "powerOn(vm): ".$task->status()."\n";

//powerOff vm 
$response = $vmr->powerOff($connection, $vm);

//check powerOff task
$task = $tr->status($connection,$response,task::RUNNING);
print "powerOff(vm): ".$task->status()."\n";

//delete vm
$response = $vmr->delete($connection, $vm);

//check delete task
$task = $tr->status($connection,$response,task::RUNNING);
print "delete(vm): ".$task->status()."\n";

?>

