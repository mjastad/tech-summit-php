<?php

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
