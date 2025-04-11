<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function store(array $data)
    {
        $this->validateUserData($data);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => 0,
        ]);
    }

    public function update(array $data, $id)
    {
        $this->validateUserData($data, $id);

        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->is_admin = 0;

        if (isset($data['password']) && $data['password']) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }

    private function validateUserData(array $data, $userId = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $userId,
            'is_admin' => 'required|in:0',
            'password' => 'nullable|string|min:6|confirmed',
        ];

        Validator::make($data, $rules)->validate();
    }
}
