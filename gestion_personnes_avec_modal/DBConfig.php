<?php  
	class DBConfig {
		private static $_dbconnection;

		public function __construct(){
			self::$_dbconnection = new PDO('mysql:host=localhost;dbname=tp-crud;charset=utf8', 'root', '');
			self::$_dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		}

		protected function getStatus(){
			return (self::$_dbconnection)? 'Connected' : 'Not Connected';
		}

		protected function getData($table) {
			try {
				$datas = array();
				$i = 0;

				$req = (self::$_dbconnection)->prepare('SELECT * FROM ' . $table);
				$req->execute();

				while($data = $req->fetch(PDO::FETCH_ASSOC)){
					$datas[$i++] = $data;
				}
				return $datas;
			} catch (Exception $e) {
				echo var_dump($e);
				return null;
			}
		}

		protected function updateData($table, $data) {
			try {
				$req = (self::$_dbconnection)->prepare('UPDATE `' . $table . '` SET `nom`="'.
					$data["nom"].'",`tel`="'.
					$data["tel"].'",`adresse`="'.
					$data["adresse"].'" WHERE `cin`="'.
					$data["cin"].'"');
				$req->execute();
			} catch (Exception $e) {
				echo var_dump($e);
				return null;
			}
		}

		protected function deleteData($table, $data) {
			try {
				$req = (self::$_dbconnection)->prepare('DELETE FROM `' . $table . '` WHERE `cin` = "' . $data['cin'] . '"');
				$req->execute();
			} catch (Exception $e) {
				echo var_dump($e);
				return null;
			}
		}

		protected function createData($table, $data) {
			try {
				$req = (self::$_dbconnection)->prepare('INSERT INTO `' . $table . '`(`cin`, `nom`, `tel`, `adresse`) VALUES ("'.
					$data["cin"].'","'.
					$data["nom"].'","'.
					$data["tel"].'","'.
					$data["adresse"].'");');
				$req->execute();
			} catch (Exception $e) {
				echo var_dump($e);
				return null;
			}
		}
	}
?>