<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticlesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'     => ['required', 'unique:articles,title', 'string'],
            'contain'   => ['required', 'min:20', 'string'],
            'tag'       => ['required', 'string', 'alpha'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Field title harus diisi.',
            'contain.required'  => 'Field contain harus diisi.',
            'tag.required'      => 'Field tag harus diisi.',
            'title.unique'      => 'Title ini sudah ditambahkan.',
            'min'               => 'Contain minimal harus berisi 20 kata',
            'string'            => 'Field harus berisi string.',
            'alpha'             => 'Filed tag hanya harus berisi huruf.'
        ];
    }
}
