<?php
class Stock {
    public int $id;
    public string $name;
    public string $createdAt;

    public function __construct(int $id, string $name, string $createdAt) {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
    }
}