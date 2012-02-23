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
	public function authenticate()
	{
		$condition = 'social_profile=:social_profile and local_key=:local_key';
		$params    = array(':social_profile'=>$this->username, ':local_key'=>$this->password);
        $user      = User::model()->find($condition,$params);

		if ( $user === null ) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
		    $this->setState('username', $user->social_profile);
		    $this->setState('name', $user->name);
		    $this->setState('social', $user->social_flag);
		    $this->setState('img', $user->social_img);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
    public function authenticateFacebookUser($user) 
    {
        if ( !$user ) return;
        
		$condition = 'social_profile=:social_profile and local_key=:local_key';
		$params    = array(':social_profile'=>$this->username, ':local_key'=>$this->password);
        $user      = User::model()->find($condition,$params);

    
        $this->errorCode = self::ERROR_USERNAME_INVALID;

		if ( $facebook->getUser() ) {
		    $this->setState('username', $user->social_profile);
		    $this->setState('name', $user->name);
		    $this->setState('social', $user->social_flag);
		    $this->setState('img', $user->social_img);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
	
	public function getFacebookUser($facebook)
	{
	    //@todo
//	    $facebook->getAccessToken();
		if ( !$facebook->getUser() ) die('no user'); return null;
	    $user = $this->getFacebookUserData($facebook->api('/me'));
	    var_dump($user); die();
	}
}