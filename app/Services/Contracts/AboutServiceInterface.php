<?php

namespace App\Services\Contracts;

interface AboutServiceInterface
{
    public function getAll();
    public function store(array $data);
    public function update(array $data, $about);
    public function delete($about);
}
