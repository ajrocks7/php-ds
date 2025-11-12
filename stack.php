<?php 
/*
Stack is a Last-In, First-Out (LIFO) data structure.

Think of:

A stack of plates

You add plates on top

You remove plates from top

So Stack is for when your logic literally is LIFO and you want code that expresses your intent clearly.

Stack -- LIFO order -- You only touch the top

Stack follows LIFO — last in, first out. 
It is perfect for undo, parsing, and recursive logic. 
Unlike arrays, Stack guarantees the discipline of only pushing and popping from the top, 
which makes the code clearer and avoids accidental misuse.

Stack always removes the most recently added item. That’s why C pops first. 
Stack is used for Undo, parsing, and depth-first processing, because the most recent operation 
is the one we reverse first.


Not Allowed	Why
❌ shift()	That would remove from the bottom → breaks LIFO
❌ unshift()	That would insert at the bottom → breaks LIFO
❌ Index access [$i]	Stack is not about random access

Stack enforces LIFO discipline. You only push and pop from the top.
It intentionally does not allow shift or unshift because that would break the LIFO rule.
This strict behavior is what makes Stack perfect for Undo, backtracking, and parsing.
*/

use Ds\Stack;

$s = new Stack();

// Add (push) items to the top
$s->push("A");
$s->push("B");
$s->push("C");

// Remove (pop) from the top
echo $s->pop(); echo "<br>"; // C (last in → first out)
echo"<br>";echo $s->pop(); echo "<br>"; // B

// See what remains
echo"<br>";print_r($s);