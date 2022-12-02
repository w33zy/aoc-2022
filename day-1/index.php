<?php

$elf       = 1;
$greediest = null;
$most      = 0;
$input     = file( './input.txt' );
$cleaned   = [];

foreach( $input as $line ) { 
 if ( $line !== "\r\n" ) {
  $cleaned[ $elf ][] = $line;
 } else {
  $elf++;  
 }
}

foreach( $cleaned as $elf => $food ) {  
  $total = array_sum( $food );
  if ( $most < $total ) {
    $most = $total;
    $greediest = $elf;
  }

  echo "Elf #{$elf} is carrying {$total} calories. \n";
}

echo "Elf #{$greediest} is the greedest. \n";
