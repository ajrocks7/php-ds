<?php 
/* 
Queue is First-In, First-Out (FIFO).
Queue is like a line of people waiting.

in Ds\Queue is O(1).

So Queues are dramatically faster for FIFO workflows.

When do we use Queue?
Use Case	Why Queue fits
Job scheduling	Oldest job runs first
Request processing	Fair ordering
Messaging systems	FIFO delivery
Task pipelines	Maintain natural flow

If the logic is:

“Process in the same order items arrive”

Then use a Queue.

“Queue is FIFO — first in, first out.
$q->push() enqueues to the back.
$q->pop() dequeues from the front in O(1) time.
This avoids the O(n) shifting overhead of array_shift().”
*/

use Ds\Queue;

$q = new Queue();

// Add (enqueue)
$q->push("A");
$q->push("B");
$q->push("C");

// Remove (dequeue)
echo $q->pop(); echo "<br>"; // A
 echo $q->pop(); echo"<br>"; // B

echo"<br>"; print_r($q);