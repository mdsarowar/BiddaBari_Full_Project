<?php

namespace App\Http\Requests\Backend\BatchExam;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BatchExamFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//            'teachers_id' => 'required',
//            'batch_exam_categories' => 'required',
            'title' => 'required',
//            'sub_title' => 'required',
//            'price' => 'required',
            'banner'    => 'nullable|image',
            'price'    => 'Price',
            'description'   => 'required',
//            'package_duration_in_days' => 'nullable|required',
            'discount_type' => 'required',
            'discount_amount'   => 'required',
            'featured_video_url'    => 'required',
            'discount_start_date'   => 'required',
            'discount_end_date' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        if (str()->contains(url()->current(), '/api/'))
        {
            throw new HttpResponseException(response()->json([
                'status'   => 'error',
//                'success'   => false,
//                'message'   => 'Validation errors',
                'errors'      => $validator->errors()
            ]));
        } else {
            parent::failedValidation($validator); // TODO: Change the autogenerated stub
        }
    }
}
