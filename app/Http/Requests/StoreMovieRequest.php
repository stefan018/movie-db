<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:2',
                'max:99'
            ],
            'description' => [
                'required',
                'min:10'
            ],
            'duration'  => [
                'required',
                'numeric'
            ],
            'release_date' => [
                'required',
                'date'
            ],
            'cover' => 'required'//Add image validation
        ];
    }
}
