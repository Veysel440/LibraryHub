<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Services\Contracts\MenuServiceInterface;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuServiceInterface $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = $this->menuService->all();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(MenuRequest $request)
    {
        $this->menuService->store($request->only(['menu_name', 'url']));

        return redirect()->route('admin.menu.index')->with('success', 'Menü başarıyla eklendi!');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $this->menuService->update($menu, $request->only(['menu_name', 'url']));

        return redirect()->route('admin.menu.index')->with('success', 'Menü başarıyla güncellendi!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menuService->delete($menu);

        return redirect()->route('admin.menu.index')->with('success', 'Menü başarıyla silindi!');
    }
}
