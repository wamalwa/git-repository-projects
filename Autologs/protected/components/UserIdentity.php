<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $username;
	public $_id;
	
	public function authenticate()
	{
		$record= Users::model()->findByAttributes(array('username'=>$this->username));
		$record= Users::model()->findByAttributes(array('userpassword'=>$this->password));
if($record===null)
          $this->errorCode=self::ERROR_USERNAME_INVALID;
  else if($record->userpassword!==$this->password)
          $this->errorCode=self::ERROR_PASSWORD_INVALID;
  else
    {
          $this->_id=$record->userid;
          $this->setState('userid', $record->userid);
          $this->errorCode=self::ERROR_NONE;
        }
       return !$this->errorCode;
	}
}