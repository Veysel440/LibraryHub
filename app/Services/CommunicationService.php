<?php

namespace App\Services;

use App\Models\Communication;
use App\Models\Menu;
use App\Services\Contracts\CommunicationServiceInterface;
use App\Services\Contracts\MenuServiceInterface;

class CommunicationService implements CommunicationServiceInterface
{
    public function getAll()
    {
        return Communication::all();
    }

    public function store(array $data)
    {
        return Communication::create($data);
    }

    public function update(array $data, $communication)
    {
        return $communication->update($data);
    }

    public function delete($communication)
    {
        return $communication->delete();
    }
}
