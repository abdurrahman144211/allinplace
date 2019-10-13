<?php

namespace App\Http\Requests\Listings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListingStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:5000',
            'category_id' => [
                'required', Rule::exists('categories', 'id')->where(function ($query) {
                    return $query->where('usable', true);
                })
            ],
            'area_id' => [
                'required', Rule::exists('areas', 'id')->where(function ($query) {

                })
            ]
        ];
    }
}
