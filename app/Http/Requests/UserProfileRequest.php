<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
        return [
            'section'=>'required|in:school,student,member',
            'first_name'=>'required|min:3|max:100',
            'surname'=>'required:min:3|max:100',
            'telephone'=>['required',new PhoneNumber],

            'age'=>'required_if:section,school',
            'grade'=>'required_if:section,school',
            'school'=>'required_if:section,school',

            'year_of_study'=>'required_if:section,student',
            'registration_number'=>'required_if:section,student',

            'membership_number'=>'required_if:section,member',
        ];
    }
}
