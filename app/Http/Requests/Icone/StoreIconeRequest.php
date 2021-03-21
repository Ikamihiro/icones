<?php

namespace App\Http\Requests\Icone;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreIconeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string'],
            'nacionalidade' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'local_nascimento' => ['required', 'string'],
            'data_falecimento' => ['required', 'date'],
            'local_falecimento' => ['required', 'string'],
            'contribuicao' => ['required', 'string'],
            'foto_path' => ['required', 'mimes:jpeg,png', 'max:8000'],
        ];
    }
}
