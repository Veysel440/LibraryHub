<?php

namespace App\Services\Contracts;

interface MenuServiceInterface
{
    public function all();
    public function store(array $data);
    public function update($menu, array $data);
    public function delete($menu);
}
