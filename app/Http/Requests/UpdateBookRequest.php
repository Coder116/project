<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        dd(request()->all());
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'fmd' => 'required',
        ];

        if (request()->has('image')) {
            $rules['image'] = 'required|mimes:jpeg,jpg,png';
        }
        // dd($rules);
        return $rules;
    }
}
