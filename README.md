# Tech-Summit (php solution)
%% readme.txt
%% ntnx php-scripts(version 1.0.1 0505.01)

## Name:-         NTNX PHP REST Object Oriented Tool-Kit (NTNX- PRESTO) (PHP v5.x, OSX 10.12.4)
## Authors:-      M. Jastad (michael.jastad@nutanix.com) 
        
Date:-         May 05, 2017

(1) DEFECTS/FEATURES 
--------------------------  

BETA-0504.01  
- Feature: Added Task Management. 

(2) INTRODUCTION
-----------------
PRESTO v1 is an open-source `VM Management’ resource enabling users to manage NTNX VM elements through RESTful control (allows the flexible use of REST API commands, relative addressing, macros, libraries, and PHP runtime).

PRESTO v1 is a program inspired using an Object Oriented Design (OOD) approach which processes command line instructions that can be processed by PHP v5.x runtimes. 

PRESTO v1 will run on most platform(s) having a working PHP v5.x runtime. However, there may of course be minor differences regarding installation and usage between platforms.

PRESTO v1 has been tested using Mac OSX, 10.12.4 and BSD/Linux which the author is most familiar with. Feedback regarding installation and usage on other platforms will be greatly appreciated, and included in future distributions.


(3) HISTORY
-----------
PRESTO v1 is designed for Tech Summit 2017 as a guide for particiapnts to stand-up VM configurations on a Nutanix Cluster. PRESTO is implemented in PHP to (a) greatly improve its utility for both commandline and browser deployments, and (b) to make it available to the wide range of platforms which run PHP.

(4) REQUIRED SOFTWARE
-----------------------
PHP Version => 5.6.30

PHP 5.6.30 (cli) (built: Feb  7 2017 16:06:52) 
Copyright (c) 1997-2016 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies

(5) PACKAGE FILES
-----------------------
The following files are included in the PRESTO v1 Project.
 
README                % this file


(6) INSTALLATION (Linux, Mac)
--------------------------------
file: ts-bash.osx-10.12.4.tar 

“file” is shell extracted using tar or RAR utilities. No checks for dependencies during install (extraction).

Install steps:
1. Copy file to filesystem folder.
2. Extraction will place files in "php-scripts" folder.
3. Run/Execute the scripts from the command-line or browser

Command-Line:
%% php main/php
 
(7) USAGE/CONFIGURATION 
-----------------------------
Configure (main.php):

1. Set Host information (IPADDR, PORT)
2. Set User credentials (USER, PASSWD)
3. Set ISO_CONTAINER_NAME variable with the container name containing the iso images
4. Set the DISK_CONTAINER_NAME variable with the default container used by VM for disk space...
5. Set the OS_IMG_NAME variable with the name of the image to construct the target VM 
6. Set the NGT_IMG_NAME variable with the name of the Nutanix Gust Tools image needed by the target VM 

(8) DIRECTORY STRUCTURE 
--------------------------
The following describes the directory structure for installation.

/php-scripts	        % Executables and configuration files used to control execution.

(9) LICENSE (LPPL):
-----------------------
This program is free software; Project Public License.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

-----------------
End of README.md
-----------------
