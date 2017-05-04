<?php

//imports
require_once('virtualMachineResource.php');
require_once('storageContainerResource.php');
require_once('imageResource.php');
require_once('host.php');
require_once('user.php');
require_once('connection.php');
require_once('utilities.php');

//variables
$USER   = "admin";
$PASSWD = "passw0rd";
$IPADDR = "10.68.69.102";
$PORT   = "9440";

//create a user
$user = new User($USER, $PASSWD);
echo $user->getName()."\n";
echo $user->getPassword()."\n";

//create a host
$host = new Host($IPADDR, $PORT);
$host->getIPAddress()."\n";
$host->getPort()."\n";

//create a connection
$connection = new Connection($user, $host);

//create virtual-machine resource 
$vmr = new VirtualMachineResource();
//$vmr->showAll($connection);
$response = $vmr->getAll($connection);
foreach ($response as $vm){ echo $vm->getName()."\n";}

//create image resource-var_dump($a) 
$ir = new ImageResource();
//$ir->showAll($connection);
$response = $ir->getAll($connection);
foreach ($response as $image){ echo $image->getName()."\n";}

//create storage-container resource 
$scr = new StorageContainerResource();
//$scr->showAll($connection);
$response = $scr->getAll($connection);
foreach ($response as $sc){ echo $sc->getName()."\n";}


?>

