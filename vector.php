<?php
/*

Vector is optimized for list-like access: index, iteration, append.
Because it stores values contiguously, it benefits from CPU cache locality.
Your CPU loads several elements at once, making iteration faster than PHP arrays, 
which store values scattered in memory.

*/

use Ds\Vector;

$v = new Vector([10, 20, 30]);

// Read
echo $v[1]; echo"<br>";   // direct index access

// Write
$v[1] = 200;

// Add
$v->push(40);

// Transform (pipeline)
$result = $v
    ->map(fn($x) => $x * 2)
    ->filter(fn($x) => $x > 50)
    ->sorted();

print_r($result);
