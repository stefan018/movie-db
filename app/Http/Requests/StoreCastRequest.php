<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCastRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->check() && auth()->user()->isAdmin()){
            return true;    
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:199', 'string'],
            'gender' => 'required',
            'biography' => ['required', 'min:10', 'max:1999', 'string'],
            'birth_date' => 'date',
            'birth_place' => ['min:3','max:99', 'string']
        ];
    }
}
