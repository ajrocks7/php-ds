<?php

use Ds\Vector;
use Ds\Deque;

function test_time(callable $fn, string $label): void {
    $start = microtime(true);
    $fn();
    $elapsed = (microtime(true) - $start) * 1000;
    printf("%-40s : %8.3f ms\n", $label, $elapsed);
}

// --- 1. Build large lists ---
$N = 200000;

test_time(function() use ($N) {
    $a = [];
    for ($i = 0; $i < $N; $i++) $a[] = $i;
}, "PHP Array append []");

test_time(function() use ($N) {
    $v = new Vector();
    for ($i = 0; $i < $N; $i++) $v->push($i);
}, "Ds\\Vector->push()");

// --- 2. Front insert ---
$M = 20000;

test_time(function() use ($M) {
    $a = [];
    for ($i = 0; $i < $M; $i++) array_unshift($a, $i);
}, "array_unshift (front insert)");

test_time(function() use ($M) {
    $d = new Deque();
    for ($i = 0; $i < $M; $i++) $d->unshift($i);
}, "Deque->unshift() (front insert)");