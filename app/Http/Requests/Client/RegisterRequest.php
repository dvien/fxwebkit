<?php namespace Fxweb\Http\Requests\Client;

use Fxweb\Http\Requests\Request;

class RegisterRequest extends Request {

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
			'first_name'    => 'required',
			'last_name'	=> 'required',
			'email'	        => 'required|email|unique:users,email',
			'password'	=> 'required|min:8|confirmed',
			'password_confirmation'=>'required|min:8',
                        'address'	=> 'required',
                        'nickname'	=> 'required',
                        'phone'  	=> 'required',
                        'city'	        => 'required',
                        'country'	=> 'required',
                        'zip_code'	=> 'required',
                        'gender'	=> 'required',
                        'birthday'	=> 'required',
                        'agreement'     => 'required',
		'g-recaptcha-response' => 'required|recaptcha',
		];
	}

}
