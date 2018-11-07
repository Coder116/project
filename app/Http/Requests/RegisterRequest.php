<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'password' => 'required|max:16',
            'email' => 'required|max:32',
        ];
    }

    public function messages()
    {
        return [
         'name.required' => 'Nhập name',
         'name.max' => 'Dưới 255 ký tự',
         'password.required' => 'Nhập password',
         'password.max' => 'Dưới 16 ký tự',
         'email.required' => 'Nhập Email',
         'email.max' => 'Dưới 32 ký tự',
        ];
    }
}
