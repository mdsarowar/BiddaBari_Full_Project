<?php

namespace App\Http\Requests\Backend\CourseManagement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CourseCreateFormRequest extends FormRequest
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
            'teachers_id' => 'required',
            'course_categories' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'price' => 'required',
            'banner'    => 'nullable|image',
            'description'   => 'required',
            'duration_in_month' => 'nullable|numeric',
            'starting_date_time'    => 'required',
            'ending_date_time'  => 'required',
            'discount_type' => '',
            'discount_amount'   => '',
            'partial_payment'   => 'nullable|numeric',
            'fack_student_count'    => 'nullable|numeric',
            'enroll_student_count'  => '',
            'featured_video_vendor' => '',
            'featured_video_url'    => '',
            'total_video'   => 'nullable|numeric',
            'total_audio'   => 'nullable|numeric',
            'total_exam'    => 'nullable|numeric',
            'total_pdf'     => 'nullable|numeric',
            'total_note'    => 'nullable|numeric',
            'total_link'    => 'nullable|numeric',
            'total_live'    => 'nullable|numeric',
            'total_zip'     => 'nullable|numeric',
            'total_class'   => 'nullable|numeric',
            'total_hours'   => 'nullable|numeric',
            'total_file'    => 'nullable|numeric',
            'total_written_exam'    => 'nullable|numeric',
            'is_featured'   => '',
            'slug'  => '',
            'status'    => '',
            'is_approved'   => '',
            'is_paid'   => '',
            'show_home_slider'  => '',
            'discount_start_date'   => '',
            'discount_end_date' => '',
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
