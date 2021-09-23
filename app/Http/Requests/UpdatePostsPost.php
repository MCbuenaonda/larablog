<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostsPost extends FormRequest
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
            'title' => 'required|max:255',
            'url_clean' => 'unique:posts,url_clean,'.$this->route('post')->id,
            'content' => 'required',
            'category_id' => 'required',
            'posted' => 'required',
            'tags_id' => 'required'
        ];
    }
}
