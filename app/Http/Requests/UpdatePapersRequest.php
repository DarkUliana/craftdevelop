<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePapersRequest extends FormRequest {

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
            'translations.*.title' => 'required',
            'translations.*.preview' => 'required',
            'translations.*.text' => 'required',
            'tag_id' => 'required',
            'date' => 'required',
            'views' => 'required'
		];
	}
}
