<?php

/**
 * PasswordReset class.
 * Password Reset form data. 
 */
class PasswordReset extends CFormModel
{
	public $username;
	public $email;
	public $verifyCode;
    //public $activationcode;
    public $password;
    public $confirmPassword;
	//private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			//array('username, email', 'required'),
                        array('email', 'required'),
			// active code,password,confirm password required
			//array('activationcode, password, confirmPassword', 'required'),
			// e-mail should be valid
			array('email', 'email'),
			// password needs to be authenticated
			//array('username, email', 'authenticate'),
			array('password', 'compare', 'compareAttribute'=>'confirmPassword','on'=>'resetpassword'),
		);
	}

}
