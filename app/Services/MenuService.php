<?php

namespace App\Services;

use App\Models\Menu;
use App\Services\Contracts\MenuServiceInterface;

class MenuService implements MenuServiceInterface
{
    public function all()
    {
        return Menu::all();
    }

    public function store(array $data)
    {
        return Menu::create($data);
    }

    public function update($menu, array $data)
    {
        return $menu->update($data);
    }

    public function delete($menu)
    {
        return $menu->delete();
    }
}
