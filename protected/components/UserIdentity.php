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

        private $_id;


        public function authenticate(){
            
     /*   $record =  Usuarios::model()->findByAttributes(array('username'=>$this->username));
            if($record===null)
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            else if(!CPasswordHelper::verifyPassword($this->password,$record->password))
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else
            {
                $this->_id=$record->id;
                $this->setState('title', $record->title);
                $this->errorCode=self::ERROR_NONE;
            }
            return !$this->errorCode;
        }*/
 
     
		/*$users= Usuarios::model()->find('LOWER(username)=?',array(strtolower($this->username)));
                //var_dump($users->username);die;
		if(!isset($users->username))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->username!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
                    */

		
		$users= Usuarios::model()->find('LOWER(username)=?',array(strtolower($this->username)));
               
		if($users===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$users->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$users->id_usuario;
			echo Yii::app()->user->id; // id del usuario logeado
				$this->setState('nombre', $users->nombre);
				$this->setState('apellido', $users->apellido);
			echo Yii::app()->user->getState('nombre'); // nombre del usuario logeado
				
			$this->username=$users->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
		
	}
        
        public function getId()
	{
		return $this->_id;
	}
        
        
	
}
