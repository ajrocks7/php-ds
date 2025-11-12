<?php declare(strict_types=1);

use Ds\{Vector, Deque, Stack, Queue, PriorityQueue, Map, Set};


$v = (new Vector([1,2,3,4,5]))
    ->map(fn($x)=>$x*2)
    ->filter(fn($x)=>$x>5)
    ->sorted();
echo "Vector: "; print_r($v->toArray()); echo"<br>";

$d = new Deque([1,2,3]);
$d->unshift(0);
$d->push(4);
echo "Deque: "; print_r($d->toArray()); echo"<br>";

$s = new Stack();
$s->push('a'); $s->push('b'); $s->push('c');
echo "Stack pop: ".$s->pop(); echo"<br>";

$q = new Queue();
$q->push('x'); $q->push('y'); $q->push('z');
echo "Queue pop: ".$q->pop(); echo"<br>";

$pq = new PriorityQueue();
$pq->push('low', 1);
$pq->push('high', 10);
echo "PriorityQueue pop: ".$pq->pop(); echo"<br>";

$m = new Map(["name"=>"Amal","role"=>"Dev"]);
foreach ($m as $key=>$value) {
    echo "{$key} => {$value}\n";
}echo"<br>";

$a = new Set([1,2,3,3,2,1]);
$b = new Set([3,4,5]);
echo "Set union: "; print_r($a->union($b)->toArray()); echo"<br>";
echo "Set intersection: "; print_r($a->intersect($b)->toArray()); echo"<br>";
