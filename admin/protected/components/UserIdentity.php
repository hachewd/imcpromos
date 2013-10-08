<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$usuarios=Usuarios::model()->findByAttributes(array('username'=>$this->username, 'activo'=>1));
                
		
		if($usuarios==NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($usuarios->clave!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$usuarios->id_usuario;
			$this->setState('title', $usuarios->username);
			$this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}
        
        public function getId() {
            return $this->_id;
        }
}