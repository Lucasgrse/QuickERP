<?php
interface RequestsRepositoryInterface {

    public function save(Requests $requests): void;
    public function delete(int $id): void;
    public function copy(Requests $requests): void;
    public function findById(int $id): ? Requests;
    public function findAll() : array;
    
}