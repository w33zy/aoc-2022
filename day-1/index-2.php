<?php

$current_elf   = 1;
$first_most    = 0;
$second_most   = 0;
$third_most    = 0;
$raw_input     = file( './input.txt' );
$cleaned_input = [];

foreach( $raw_input as $line ) { 
 if ( (int) $line ) {
  $cleaned_input[ $current_elf ][] = $line;
 } else {
  $current_elf++;  
 }
}

foreach( $cleaned_input as $current_elf => $food ) {  
  $total_calories = array_sum( $food );

  if ( $total_calories > $first_most ) {
    $third_most = $second_most;
    $second_most = $first_most;
    $first_most = $total_calories;
  } elseif ( $total_calories > $second_most ) {
    $third_most = $second_most;
    $second_most = $total_calories;
  } elseif ( $total_calories > $third_most ) {
    $third_most = $total_calories;
  }

}

printf( 'The top 3 elfs are carrying %d calories', ( $first_most + $second_most + $third_most ) );
