<?php

/*
Deque means Double Ended Queue.

It is a Sequence where you can efficiently add/remove items from:the front and the back

Both operations are O(1) (constant time).

“Deque allows efficient operations at both ends.
push and pop work on the back.
unshift and shift work on the front.

All are O(1) operations, unlike PHP arrays where front operations are O(n).”
In PHP arrays, array_shift and array_unshift are O(n) because all elements must shift.
But in Deque, shift and unshift are O(1) because the structure is designed for both ends.

Deque gives constant-time operations at both ends: unshift/shift for the front and push/pop for the back
unlike PHP arrays where front operations are O(n).
*/

use Ds\Deque;

$d = new Deque();

// Add to BACK
$d->push("A");   // [A]
$d->push("B");   // [A, B]

// Add to FRONT
$d->unshift("X"); // [X, A, B]

// Remove from BACK
$removedBack = $d->pop();  // removes "B"

// Remove from FRONT
$removedFront = $d->shift(); // removes "X"

print_r($d);

echo "<br>"; echo "Removed from back: $removedBack";  echo "<br>";
echo "Removed from front: $removedFront";
