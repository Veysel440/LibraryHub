<?php

namespace App\Services\Contracts;

interface BookServiceInterface
{
    public function getAll();
    public function store(array $data);
    public function update(array $data, $book);
    public function delete($book);
}
