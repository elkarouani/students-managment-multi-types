<?php  
	session_start();
	class User {
		private static $_name;
		private static $_email;
		private static $_password;

		public static function setName($name) {
			self::$_name = $name;
		}
		public static function setEmail($email) {
			self::$_email = $email;
			$_SESSION['email'] = $email;
		}
		public static function setPassword($password) {
			self::$_password = $password;
			$_SESSION['password'] = $password;
		}
		public static function getEmail() {
			if(isset($_SESSION['email'])){return $_SESSION['email'];}
		}
		public static function getPassword() {
			if(isset($_SESSION['password'])){return $_SESSION['password'];}
		}
	}
?>