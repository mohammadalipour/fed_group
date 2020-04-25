<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LoginUserRequest extends FormRequest
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
			'email' => 'required|email',
			'password' => 'required|string|min:6|max:10'
		];
	}
	
	/**
	 *  Filters to be applied to the input.
	 *
	 * @return array
	 */
	public function filters()
	{
		return [
			'email' => 'trim|lowercase',
		];
	}
	
	/**
	 * @param Validator $validator
	 */
	protected function failedValidation(Validator $validator)
	{
		$errors = (new ValidationException($validator))->errors();
		
		throw new HttpResponseException(
			response()->json(
				['errors' => $errors],
				JsonResponse::HTTP_UNPROCESSABLE_ENTITY
			)
		);
	}
}
