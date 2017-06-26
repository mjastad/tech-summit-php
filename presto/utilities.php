<?php

/**
 * LICENSE: This source file is use-as-is and is subject to copyright(c).  Header must
 * remain intact.
 *
 * @category   Core
 * @package    presto/utilities.php
 * @author     M.Jastad <michael.jastad@nutanix.com>
 * @copyright  2017 Nutanix, Inc.
 * @license    USE-AS-IS
 * @version    Release: @1.0.1
 * @since      Class available since Release 1.0.0
 * @deprecated Class available since Release 1.0.0
 */


function getIterator($json) {
   $jsonIterator = new RecursiveIteratorIterator(
	new RecursiveArrayIterator(json_decode($json, TRUE)),
	RecursiveIteratorIterator::SELF_FIRST
   );

   return $jsonIterator;
}

function parseJson($jsonIterator) {
   foreach ($jsonIterator as $key => $val) {
       if(is_array($val)) {
          echo "$key:\n";
       } else {
          echo "$key => $val\n";
       }
   }
}

function parseJson2($jsonIterator) {
   foreach ($jsonIterator as $key => $val) {
          echo "$key => $val\n";
   }
}

?>
