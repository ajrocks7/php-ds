<?php
declare(strict_types=1);

use Ds\{Map, Set, Queue, PriorityQueue, Deque};

require_once __DIR__ . '/Task.php';

final class TaskManager {
    /** @var Map<string, Task> */
    private Map $store;
    /** @var Set<string> */
    private Set $ids;
    private Queue $normal;
    private PriorityQueue $urgent;
    private Deque $history; // undo stack

    public function __construct() {
        $this->store = new Map();
        $this->ids = new Set();
        $this->normal = new Queue();
        $this->urgent = new PriorityQueue();
        $this->history = new Deque();
    }

    public function add(Task $task, bool $isUrgent = false): void {
        if ($this->ids->contains($task->id)) {
            echo "Skip duplicate {$task}\n"; echo"<br>";
            return;
        }
        $this->store->put($task->id, $task);
        $this->ids->add($task->id);
        if ($isUrgent || $task->priority > 0) {
            $this->urgent->push($task, $task->priority);
            $this->history->push("add:urgent:{$task->id}");
        } else {
            $this->normal->push($task);
            $this->history->push("add:normal:{$task->id}");
        }
    }

    public function promote(string $id, int $priority): void {
        if (!$this->store->hasKey($id)) { return; };
        $task = $this->store->get($id);
        $task->priority = $priority;
        $this->urgent->push($task, $priority);
        $this->history->push("promote:{$id}:{$priority}");
    }

    public function processNext(): ?Task {
        $task = null;
        if (!$this->urgent->isEmpty()) {
            $task = $this->urgent->pop(); // highest priority first
        } elseif (!$this->normal->isEmpty()) {
            $task = $this->normal->pop();
        }
        if ($task instanceof Task) {
            $this->history->push("process:{$task->id}");
            echo "Processed: {$task}\n"; echo"<br>";
            return $task;
        }
        echo "No task to process.\n"; echo"<br>";
        return null;
    }

    public function undo(): void {
        if ($this->history->isEmpty()) {
            echo "Nothing to undo.\n"; echo"<br>";
            return;
        }
        $action = $this->history->pop();
        [$type, $rest] = explode(':', $action, 2);
        if ($type === 'add') {
            [$queueType, $id] = explode(':', $rest, 2);
            if ($this->store->hasKey($id)) {
                $this->store->remove($id);
                $this->ids->remove($id);
            }
            $this->removeFromQueues($id);
            echo "Undo add {$id}\n"; echo"<br>";
        } elseif ($type === 'promote') {
            echo "Undo promote {$rest}\n"; echo"<br>";
        } elseif ($type === 'process') {
            echo "Undo process {$rest}\n"; echo"<br>";
        }
    }

    private function removeFromQueues(string $id): void {
        $tmpQ = new Queue();
        while (!$this->normal->isEmpty()) {
            $t = $this->normal->pop();
            if ($t->id !== $id) $tmpQ->push($t);
        }
        $this->normal = $tmpQ;

        $tmpPQ = new PriorityQueue();
        while (!$this->urgent->isEmpty()) {
            $t = $this->urgent->pop();
            if ($t->id !== $id) $tmpPQ->push($t, $t->priority);
        }
        $this->urgent = $tmpPQ;
    }

    public function stats(): void {
        echo "Store: {$this->store->count()} | IDs: {$this->ids->count()} | Urgent: {$this->urgent->count()} | Normal: {$this->normal->count()} | History: {$this->history->count()}\n"; echo"<br>";
    }
}
