<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
;

class PermissionSetupRequest extends FormRequest
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
        if($this->getMethod() == "POST"){
            $rules = [
                'chapter' => [
                    'required'
                ],
                'user' => [
                    'required'
                ],
            ];
        } else{
            if(!is_null($this->input('status'))){ return []; }
            $rules = [
                'chapter' => [
                    'required'
                ],
                'user' => [
                    'required'
                ],
            ];
        }
        return $rules;
    }

    protected function failedValidation(Validator $validator) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
    }
}
