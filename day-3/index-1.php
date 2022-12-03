<?php

$input_file = is_file( __DIR__ . '\input.txt' ) ? __DIR__ . '\input.txt' : false;
$raw_input  = file( $input_file );

$lowercase_priorities = array_map( fn( $ltr, $i ) => [ $ltr => $i+1 ], range( 'a', 'z' ), array_keys( range( 'a', 'z' ) ) );
$uppercase_priorities = array_map( fn( $ltr, $i ) => [ $ltr => $i+27 ], range( 'A', 'Z' ), array_keys( range( 'A', 'Z' ) ) );

$unique_item_per_bag = [];
$sum_unique_item_per_bag = [];

foreach( $raw_input as $both_compartments ) {
  $both_compartments  = trim( $both_compartments );
  $split_compartments = str_split( $both_compartments, ( strlen( $both_compartments ) / 2 ) );
  $split_items        = array_map( fn( $c ) => str_split( $c ), $split_compartments );
  $unique_item_per_bag[] = array_values( array_unique( array_values( array_intersect( $split_items[0], $split_items[1] ) ) ) );
}

foreach( $unique_item_per_bag as $unique_items ) {
  foreach( $unique_items as $unique_item ) {
    if ( ctype_lower( $unique_item ) ) {
      foreach( $lowercase_priorities as $priority ) {
        if ( isset( $priority[ $unique_item ] ) ) {
          $sum_unique_item_per_bag[] = $priority[ $unique_item ];
        }
      }
    }

    if ( ctype_upper( $unique_item ) ) {
      foreach( $uppercase_priorities as $priority ) {
        if ( isset( $priority[ $unique_item ] ) ) {
          $sum_unique_item_per_bag[] = $priority[ $unique_item ];
        }
      }
    }
  }
}

echo array_sum( $sum_unique_item_per_bag );
