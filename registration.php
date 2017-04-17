<?php
/**
* Класс для регистрации и авторизации пользователя
*/
class Registration
{
	function __construct($params)
	{
		$this->registration = false;
		if(!empty($params['login']) && !empty($params['password']))
			$this->registration = true;
	}

	public function statusRegistration()
	{
		return $this->registration;
	}
}