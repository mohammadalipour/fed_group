<?php
	
	namespace App\Http\Requests;
	
	use Illuminate\Contracts\Validation\Validator;
	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Http\Exceptions\HttpResponseException;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Validation\ValidationException;
	
	class RegisterUserRequest extends FormRequest
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
				'name'          => 'required|string',
				'email'         => 'sometimes|email',
				'mobile_number' => 'required|numeric|unique:users|regex:/(09)[0-9]{9}/',
				'password'      => 'sometimes|string|min:6|max:10'
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
				'email'         => 'trim|lowercase',
				'mobile_number' => 'trim',
				'name'          => 'trim|capitalize|escape'
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
