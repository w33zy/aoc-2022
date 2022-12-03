<?php

$input_file = is_file( __DIR__ . '\input.txt' ) ? __DIR__ . '\input.txt' : false;
$raw_input  = file( $input_file );

$lowercase_priorities = array_map( fn( $ltr, $i ) => [ $ltr => $i+1 ], range( 'a', 'z' ), array_keys( range( 'a', 'z' ) ) );
$uppercase_priorities = array_map( fn( $ltr, $i ) => [ $ltr => $i+27 ], range( 'A', 'Z' ), array_keys( range( 'A', 'Z' ) ) );

$unique_item_per_group = [];
$sum_unique_item_per_bag = [];

$elf_groups = array_chunk( $raw_input, 3 );

foreach ( $elf_groups as $group ) {
  $group = array_map( fn( $i ) => trim( $i ), $group );
  $unique_item_per_group[] = array_values( array_unique( array_intersect( str_split( $group[0] ), str_split( $group[1] ), str_split( $group[2] ) ) ) );
}

foreach( $unique_item_per_group as $unique_items ) {
  foreach( $unique_items as $unique_item ) {
    if ( ctype_lower( $unique_item ) ) {
      foreach( $lowercase_priorities as $priority ) {
        if ( isset( $priority[ $unique_item ] ) ) {
          $sum_unique_item_per_bag[] = $priority[ $unique_item ];
        }
      }
    } else {
      foreach( $uppercase_priorities as $priority ) {
        if ( isset( $priority[ $unique_item ] ) ) {
          $sum_unique_item_per_bag[] = $priority[ $unique_item ];
        }
      }
    }
  }
}

echo array_sum( $sum_unique_item_per_bag );

