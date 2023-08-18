<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'guide_number' => 'unique:report,guide_number',
            'date_purchase' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'debt_value' => 'required'
        ];
    }
}
