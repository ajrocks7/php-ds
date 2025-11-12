<?php 
/*

PHP arrays are hash tables — flexible, but not optimized for list operations like 
iteration, indexing, stacking, and queues. 
The Ds extension provides purpose-built data structures implemented in C: 
Vector for lists, 
Deque for both-end operations, 
Stack and Queue for LIFO/FIFO flows,
 PriorityQueue for urgency-based scheduling, 
 Map for fast lookups, and 
 Set for uniqueness. 
 The goal is not micro-optimization — 
 it's picking the right data structure to express intent clearly and get predictable performance

 Question	Use
Do I have a list?	Vector
Do I need to insert/remove from both ends?	Deque
Am I processing in LIFO (Undo / Backtracking) order?	Stack
Am I processing in FIFO (Fair Queue) order?	Queue
Should more important items run first?	PriorityQueue
Do I need fast key → value lookups?	Map
Do I need unique items?	Set

Structure	               Rule	                      Best For
Vector	               Ordered list         (fast index + iteration)	arrays-without-hash-overhead
Deque	               Both ends fast	       history buffers, sliding windows
Stack	                   LIFO	               undo, parsing, DFS
Queue	                   FIFO	               job processing, request pipelines
PriorityQueueImportance    first	            schedulers, alerts, routing


DS	            Behavior	        Use Case
Vector	        Lists,              index-based, iteration	Data sequences, transformations
Deque	       Both ends            fast	Undo/Redo, sliding window, buffers
Stack	        LIFO	             Undo, parsing, DFS
Queue	         FIFO	             Task scheduling, processing order
PriorityQueue	Importance first	  Scheduling, job dispatch
Map	Key →        Value lookup	      Session stores, caches
Set	            Unique values	      Tags, IDs, de-duplication

The Ds extension gives us purpose-built data structures implemented in C.
We get a Vector for list operations, a Deque for both-end access,
Stack and Queue for LIFO and FIFO flows,
a PriorityQueue for urgency-based scheduling,
Map for fast key lookups,
and Set for enforcing uniqueness.

*/

