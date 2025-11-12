<?php
declare(strict_types=1);

final class Task implements \Ds\Hashable {
    public string $id;
    public string $title;
    public int $priority; // higher = more urgent

    public function __construct(string $id, string $title, int $priority = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->priority = $priority;
    }

    // Hashable: uniqueness by id
    public function hash(): string {
        return $this->id;
    }

    public function equals($other): bool {
        return $other instanceof self && $other->id === $this->id;
    }

    public function __toString(): string {
        return "{$this->id}({$this->title}, p={$this->priority})";
    }
}
