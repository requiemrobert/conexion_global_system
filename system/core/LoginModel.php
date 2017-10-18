<?php	

/**
* 
*/
abstract class LoginModel
{

	 # métodos abstractos para ABM de clases que hereden
	 abstract protected function getLogin();
	 abstract protected function set();
	 abstract protected function edit();
	 abstract protected function delete();	

}