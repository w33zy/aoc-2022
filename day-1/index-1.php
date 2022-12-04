<?php

$elf       = 1;
$greediest = null;
$most      = 0;
$input     = file( './input.txt' );
$cleaned   = [];

foreach( $input as $line ) { 
 if ( (int) $line ) {
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

  printf( "Elf #%s is carrying %s calories. \n", $elf, $total );
}

printf( "Elf %s is the greediest, he is carrying %s calories.", $greediest, $most );
