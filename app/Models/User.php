<?php

namespace App\Models;

use PDO;

class User extends Model_Base
{
	private $_login;
	private $_password;
	const USER_TABLE="users";

	public function __construct($login,$password){
		$this->_login=$login;
		$this->_password=$password;
	}
	public function getLogin(){
		return $this->_login;
	}

	public function getPassword(){
		return $this->_password;
	}

	public function setLogin($login){
		$this->_login = $login;
	}

	public function setPassword($password){
		$this->_password = $password;
	}
	public function exists(){
		$query="SELECT password FROM ".self::USER_TABLE." WHERE login=:login";
		$statement = self::$_db->prepare($query);
		$statement->bindValue(':login',$this->_login,PDO::PARAM_STR);
		$statement->execute();
		if(!$statement)
			return false;
		$res = $statement->fetch();
		if(!$res)
			return false;
		return password_verify($this->_password, $res['password']);
	}
	public function create(){
		$query="INSERT INTO users(login,password) VALUES (:login,:password)";
		$statement = self::$_db->prepare($query);
		$statement->bindValue(':login',$this->_login,PDO::PARAM_STR);
		$statement->bindValue(':password',password_hash($this->_password,PASSWORD_DEFAULT),PDO::PARAM_STR);
		if(!$statement->execute()){
			throw new Exception(mysql_error(self::$_db));
			return;
		}
	}
	public function changePassword($newpassword){
		if(!($newpassword=password_hash($newpassword,PASSWORD_DEFAULT))){
			throw new Exception();
			return;
		}
		$query="UPDATE users SET password=:password WHERE login=:login";
		$statement = self::$_db->prepare($query);
		$statement->bindValue(':login',$this->_login,PDO::PARAM_STR);
		$statement->bindValue(':password',$newpassword,PDO::PARAM_STR);
		if(!$statement->execute()){
			throw new Exception(mysql_error(self::$_db));
			return;
		}
		$this->_password=$newpassword;
	}
	public function delete(){
		$query="DELETE FROM users WHERE login=:login";
		$statement = self::$_db->prepare($query);
		$statement->bindValue(':login',$this->_login,PDO::PARAM_STR);
		if(!$statement->execute()){
			throw new Exception(mysql_error(self::$_db));
			return;
		}
	}
}
?>