<?php
	
	namespace App\Http\Requests\Panel;
	
	use Illuminate\Contracts\Validation\Validator;
	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Http\Exceptions\HttpResponseException;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Validation\ValidationException;
	
	class UpdateVoucherRequest extends FormRequest
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
				'voucher_id' => 'required|numeric',
				'title'      => 'sometimes|string',
				'capacity'   => 'sometimes|numeric',
				'max_off'    => 'sometimes|numeric',
				'expired_at' => 'sometimes|date',
				'user_id'    => 'sometimes'
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
				'voucher_id' => 'trim',
				'title'      => 'trim|lowercase',
				'capacity'   => 'trim',
				'max_off'    => 'trim',
				'expired_at' => 'trim'
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
