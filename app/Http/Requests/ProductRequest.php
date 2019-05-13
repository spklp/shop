<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:3|max:40|unique:products,name',
            'category' => 'required',
            'original_price' => 'required|numeric',
            'price' => 'required|numeric',
            'descr' => 'required|min:10|max:550',
            'image.main' => 'mimes:jpeg,jpg,png',
            'image.*' => 'mimes:jpeg,jpg,png|max:5000',
       ];

    }
}
