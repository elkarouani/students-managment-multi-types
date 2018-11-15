<?php  
	require_once('DBConfig.php');

	class User extends DBConfig{
		public static function setUser($data) {
			$bd = new DBConfig();
	
			$bd->setData("users", $data);
		}

		public static function getUserByEmail($email) {
			$bd = new DBConfig();
	
			$users = $bd->getData("users");

			foreach ($users as $user) {
				if ($user['email'] == $email) {
					return array(
						'email' => $user['email'],
						'password' => $user['password'] 
					);
				}
			}
		}
	}
?>