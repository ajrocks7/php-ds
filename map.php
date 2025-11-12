<?php 
/*
Map is a key → value data structure (like a dictionary).
Think of a phone contact list:

"John"  →  9841234567
"Aisha" →  7551239944


You look up by key, not by index.

🎯 Why not just use PHP associative arrays?

Because PHP arrays are actually hash tables + extra baggage.

Feature	PHP Array	Ds\Map
Data model	Hash table with list behavior mixed in	Purpose-built hash map
Predictable memory usage	❌ No	✅ Yes
Lookup performance	Fast but can degrade	Stable and predictable
Behavior	Tries to be list + map	Always a map, clean semantics
Iteration output	Key and value, but as raw pairs	Returns Pair objects, clean and structured


“Map is a true key → value store.
Unlike PHP arrays, Map has predictable performance, cleaner semantics, and iterates using Pair objects,
 so we always know what the key and value are.
I use Map whenever I want to express lookup by key — not index.”
*/

use Ds\Map;

$users = new Map();

$users->put("amal", 27);
$users->put("isaac", 32);
$users->put("kai", 29);

echo $users->get("isaac"); echo"<br>";; // 32

// Update
$users->put("amal", 28); // overwrite value

// Remove
$users->remove("kai");

// Iterate (notice: we get Pair objects)
foreach ($users as $key => $value) {
    echo"<br>";echo "$key => $value" . PHP_EOL;
}