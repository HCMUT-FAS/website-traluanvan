<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
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
    // Check Request
    // https://youtu.be/FJDQBkS1Fqw?t=9122
    public function rules()
    {
        return [
            'email' => ['required', 'email:rfc,dns'],
            'mssv' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'date' => ['required']
        ];
    }
}
