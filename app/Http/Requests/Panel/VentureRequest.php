<?php

namespace App\Http\Requests\Panel;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;


class VentureRequest extends FormRequest
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
			'venture_id' => 'required|exists:ventures,id|numeric'
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
			'venture_id' => 'trim'
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
