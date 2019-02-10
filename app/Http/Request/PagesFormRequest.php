<?php
namespace App\Http\Request;

use App\Rules\IsSlug;
use Illuminate\Foundation\Http\FormRequest;

class PagesFormRequest extends FormRequest
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
            'url_name' => ['required', new IsSlug()],
            'menu_order' => 'numeric',
            'menu_name' => 'required',
            'head_title' => 'required',
        ];
    }

}
