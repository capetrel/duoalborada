<?php
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class MediaFormRequest extends FormRequest
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
        // rules for pages form
        return [
            'media_title' => 'required',
            'media_thumb' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories_id' => 'required',
        ];
    }
}
