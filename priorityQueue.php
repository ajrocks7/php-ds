<?php 
/*
PriorityQueue is like a Queue — but items are removed based on priority, not arrival order.

Higher priority items get processed first.

Order is determined by importance, not time.

Real-life analogy:

Hospital emergency room

A patient with chest pain is treated before someone with a sprained ankle — 
even if the sprain patient arrived earlier.

🎯 Why not just sort an array?

Because sorting repeatedly is expensive:

array_push();
sort();           // O(n log n) every time


But PriorityQueue uses a heap, so:

Operation	Complexity
Insert (push)	O(log n)
Remove highest priority (pop)	O(log n)
Always keeps highest priority ready	✅ Efficient

This is why it's used in:

Task schedulers
Game AI event loops
Network routing
Job processing systems
Load balancing

“PriorityQueue processes items by importance instead of arrival order.
It’s backed by a heap, so inserts and removals stay O(log n).
This is ideal when some tasks need to jump the queue, like alerts, monitoring, and job dispatching.”
*/

use Ds\PriorityQueue;

$pq = new PriorityQueue();

// push(value, priority)
$pq->push("Low battery warning", 1);
$pq->push("Server is overheating!", 10);
$pq->push("New user signup", 3);

// Highest priority comes out first
echo $pq->pop(); echo"<br>"; // Server is overheating!
echo"<br>";echo $pq->pop(); echo"<br>"; // New user signup
echo"<br>";echo $pq->pop(); echo"<br>"; // Low battery warning