<?php namespace Modules\Reports\Http\Requests\Admin;

use Fxweb\Http\Requests\Request;

class AccountsRequest extends Request {

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
			'from_login' => 'integer',
			'to_login' => 'integer',
			'from_date' => 'date',
			'to_date' => 'date',
		];
	}

}
