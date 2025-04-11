<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->userService->store($request->validated());

        return redirect()->route('admin.users.index')->with('success', 'Kullanıcı başarıyla oluşturuldu!');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($request->validated(), $id);

        return redirect()->route('admin.users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    public function destroy(string $id)
    {
        $this->userService->destroy($id);

        return redirect()->route('admin.users.index')->with('success', 'Kullanıcı başarıyla silindi!');
    }
}
