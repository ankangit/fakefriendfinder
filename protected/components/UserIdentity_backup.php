<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public $_id;

	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
		*/
		$this->password = md5($this->password);
		$user = Users::model()->findByAttributes(array('username'=>$this->username,'active'=>'1'));
		if($user === null){
          	$user1 = Users::model()->findByAttributes(array('email'=>$this->username,'active'=>'1'));
          	
          	if($user1 === null){
             	
             	$this->errorCode=self::ERROR_USERNAME_INVALID;
            }elseif ($user1->password !== $this->password){
            	
            	$this->errorCode=self::ERROR_PASSWORD_INVALID;	
            }else{
                
            	$this->setState('username',$user1->username);
            	$this->_id = $user1->id;
              	$this->errorCode=self::ERROR_NONE;
            }
        }elseif ($user->password !== $this->password){

			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else{
         $this->_id=$user->id;
         $this->setState('username',$user->username);
         
         $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	    
	}
    


	public function authenticateAdmin()
	{
		
		$this->password = md5($this->password);
		
		$user = AdminUser::model()->findByAttributes(array('username'=>$this->username,'active'=>'1'));
		if($user === null){
          	$user1 = Users::model()->findByAttributes(array('email'=>$this->username,'active'=>'1'));
          	
          	if($user1 === null){
             	
             	$this->errorCode=self::ERROR_USERNAME_INVALID;
            }elseif ($user1->password !== $this->password){
            	
            	$this->errorCode=self::ERROR_PASSWORD_INVALID;	
            }else{
            	$this->setState('username',$user1->username);
              	$this->errorCode=self::ERROR_NONE;
            }
        }elseif ($user->password !== $this->password){

			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else{
         $this->setState('username',$user->username);
         $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	    
	}
	// Return user id
	public function getId()
    {
        return $this->_id;
    }  
}
