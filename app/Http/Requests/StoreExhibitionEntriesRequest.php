<?php

namespace App\Http\Requests;

use App\Rules\ImageDimensions;
use Illuminate\Foundation\Http\FormRequest;

class StoreExhibitionEntriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $result = [
            'exhibition_id' => 'required|numeric'.$this->id,
            'image_caption' => 'required|max:100|min:5',
            'image' => [
                'required',
                'image',
                'mimes:jpeg,jpg,png',
                'max:2048', // Maximum file size (2MB)
                new ImageDimensions(1920, 1080), // Custom rule for dimensions (1080x1920 pixels)
            ],
        ];
        return $result;
    }
}
