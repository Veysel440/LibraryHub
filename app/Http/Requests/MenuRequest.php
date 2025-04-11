<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'menu_name' => 'required|string|max:255',
            'url' => 'required|string|unique:menus,url,' . $this->route('id'),
        ];
    }
}
