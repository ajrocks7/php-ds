<?php
declare(strict_types=1);

use Ds\{Vector, Map, Set, Queue, PriorityQueue, Deque};

require_once __DIR__ . '/Task.php';
require_once __DIR__ . '/TaskManager.php';

$tm = new TaskManager();
$tm->add(new Task("T1", "Write docs", 0));
$tm->add(new Task("T2", "Fix login bug", 0));
$tm->add(new Task("T3", "Handle VIP outage", 10), true);
$tm->add(new Task("T2", "Duplicate login bug", 0)); // duplicate ignored
$tm->promote("T1", 5);

$tm->stats();

$tm->processNext(); // T3
$tm->processNext(); // T1 (priority 5)
$tm->processNext(); // T2
$tm->processNext(); // none

$tm->undo(); // undo last process
$tm->undo(); // undo previous process
$tm->stats();
