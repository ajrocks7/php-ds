<?php declare(strict_types=1);
/*
A Set is a collection of unique values.

Meaning:

You can add values

But duplicates are automatically ignored

There are no keys and no indexes.

This is NOT a list.
This is a uniqueness-enforced bag.

🎯 Why use Set instead of array?
Task	                With Array	                         With Set
Check if value exists	in_array($x, $arr) → O(n)	         $set->contains($x) → O(1)
Ensure no duplicates	array_unique($arr) → expensive	     Automatically enforced
Express intention	    Ambiguous	                             Clear: “This must be unique.”

So Set is faster and more expressive.

✅ When to use Set
Use Case	               Why Set fits
Unique user  IDs	         No duplicates
Unique tags	                 Clean representation
Prevent duplicate tasks	     Your demo
Unique event handlers	      No double-binding


“Set stores unique values and guarantees there are no duplicates.
Checking membership is O(1) using hashing — much faster than in_array in PHP arrays, which is O(n).
I use Set whenever uniqueness matters — like preventing duplicate task IDs.”
*/

use Ds\Set;

$fruits = new Set();

$fruits->add("apple");
$fruits->add("banana");
$fruits->add("apple"); // duplicate ignored

echo"<br>";print_r($fruits);

// Check membership (very fast)
if ($fruits->contains("banana")) {
    echo"<br>";echo "banana is present"; echo"<br>";;
}

// Remove
$fruits->remove("apple");

echo"<br>";print_r($fruits);