<?php declare(strict_types=1); 
/*
Sequence is an interface that represents:

An ordered collection where you can access elements by index.

🧠 Which DS are Sequences?
DS	Is it a Sequence?	Why
Vector	✅ Yes	Stored contiguously, indexed access is fast
Deque	✅ Yes	You can index into it, even though it's optimized for ends
Stack	❌ No	Only top matters, no random access
Queue	❌ No	Only front/back matters, no random access
PriorityQueue	❌ No	Retrieves by priority, not position
Map	❌ No	Access by key, not index
Set	❌ No	No guaranteed order or indexing

“A Sequence guarantees order + index-based access.
Vector and Deque are Sequences — Stack, Queue, and the others are not.”

Sequence is the interface for ordered, index-accessible collections.
Both Vector and Deque implement Sequence.
The difference is performance characteristics:
Vector is optimized for indexing and iteration,
while Deque is optimized for operations at both ends.

Sequence is an interface, not a concrete object.

Interfaces in PHP do not appear when you print an object — only the actual class does.

“Sequence is not a data structure — it is the behavior contract shared by Vector and Deque.
It tells us these structures are ordered and allow index access.”


“Sequence is the shared interface for ordered, index-accessible collections.
Vector and Deque both implement Sequence, which is why you can call get($i) and set($i, $v) on either.
Stack, Queue, PriorityQueue, Map, and Set do not implement Sequence because they are not index-based 
— their behavior is defined by access pattern instead.”
*/
use Ds\Sequence;
use Ds\Vector;
use Ds\Deque;

// Vector: optimized for index access & iteration
$v = new Vector([10, 20, 30]);
echo"<br>";echo $v->get(1); echo"<br>";; // 20

// Deque: still indexable, but optimized for front/back ops
$d = new Deque([10, 20, 30]);
echo"<br>";echo $d->get(1);echo"<br>";; // 20

// Update by index
$v->set(1, 200);
$d->set(1, 200);

echo"<br>";print_r($v);
echo"<br>";print_r($d);

echo"<br>"; var_dump($v instanceof Sequence); // true
echo"<br>"; var_dump($d instanceof Sequence); // true