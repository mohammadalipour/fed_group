<?php
	
	namespace App\Http\Requests;
	
	use Illuminate\Contracts\Validation\Validator;
	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Http\Exceptions\HttpResponseException;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Validation\ValidationException;
	
	class AddToCartRequest extends FormRequest
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
				'user_id'  => 'required|exists:users,id|numeric',
				'type'     => 'required|in:venture,package',
				'usage_id' => 'required|numeric',
				'count'    => 'required|numeric',
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
				'user_id'  => 'trim|lowercase',
				'type'     => 'trim',
				'usage_id' => 'trim',
				'count'    => 'trim'
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
