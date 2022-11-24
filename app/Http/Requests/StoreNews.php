<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
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
    public function rules(Category $category)
    {
        return [
            'title' => 'required|alpha|min:15|max:80',
            'category_id' => "required|exists:{$category->getTable()},id",
            'desc' => 'required|alpha|min:30|max:250',
            'inform' => 'required|alpha|min:800|max:5000',
            'isPrivate' => 'sometimes|in:1'
            ];
    }
}
