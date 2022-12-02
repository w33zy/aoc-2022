<?php

$elf       = 1;
$first     = 0;
$second    = 0;
$third     = 0;
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

  if ( $total > $first ) {
    $third = $second;
    $second = $first;
    $first = $total;
  } elseif ( $total > $second ) {
    $third = $second;
    $second = $total;
  } elseif ( $total > $third ) {
    $third = $total;
  }

}

echo 'The top 3 elfs are carrying ' . $first + $second + $third . ' calories';
