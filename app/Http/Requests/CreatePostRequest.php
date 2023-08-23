<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Models\PostArticle;
use App\Models\PostGallery;
use App\Models\PostSortList;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
        return Post::$rules + PostArticle::$rules + PostGallery::$rules + PostSortList::$rules;
    }

    public function messages()
    {
        return [

            'gallery_title.*.max' => "Gallery Title must not be greater than 190 characters ",
            'sort_list_title.*.max' => "Sort List Title must not be greater than 190 characters ",

        ];
    }

}
