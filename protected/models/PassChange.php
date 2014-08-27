<?php 
/**
 * PassChange class.
 * PassChange is the data structure for keeping
 * Password Change data. It is used by the 'passChange' action of 'UserController'.
 */
?>
<?php 
class PassChange extends CFormModel
{
	public $password;
	public $confirmPassword;
	public $currentPassword;
	public function rules()
	{
		return array(
				array('currentPassword, password, confirmPassword', 'required'),
				array('password, confirmPassword', 'unique'),
			    array('password, confirmPassword', 'length', 'max'=>255),
				array('confirmPassword', 'compare', 'compareAttribute'=>'password'),
                     
				
		);
	}
	
}
?>
