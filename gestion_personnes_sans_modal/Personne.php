<?php 
	require_once('DBConfig.php');

	class Personne extends DBConfig
	{
		private $_cin;
		private $_nom;
		private $_tel;
		private $_adresse;
		private static $_listePersonnes;

	    public function setCin($cin) {
	    	$this->_cin = $cin;
	    }
	    public function setNom($nom) {
	    	$this->_nom = $nom;
	    }
	    public function setTel($tel) {
	    	$this->_tel = $tel;
    	}
    	public function setAdresse($adresse) {
	    	$this->_adresse = $adresse;
	    }

		public function getCin() {
	    	return $this->_cin;
	    }
	    public function getNom() {
	    	return $this->_nom;
	    }
	    public function getTel() {
	    	return $this->_tel;
    	}
    	public function getAdresse() {
	    	return $this->_adresse;
	    }
	    public static function getListe() {
	    	return self::$_listePersonnes;
	    }	    

	    public static function charger() {
	    	$i = 0;
	    	$bd = new DBConfig();
	    	self::$_listePersonnes = array();

	    	$datas = $bd->getData('personnes');

	    	foreach ($datas as $data) {
	    		$p = new Personne;

	    		$p->setCin($data["cin"]);
	    		$p->setNom($data["nom"]);
	    		$p->setTel($data["tel"]);
	    		$p->setAdresse($data["adresse"]);
	    		
	    		self::$_listePersonnes[$i++] = $p;
	    	}
	    }

	    public static function getPersonneByCin($cin) {
	    	self::charger();
	    	$personnes = self::getListe();

	    	foreach ($personnes as $personne) {
	    		if ($personne->getCin() == $cin) {
	    			return $personne;
	    		}
	    	}
	    }

	    public function update($cin, $nom, $tel, $adresse) {
	    	$bd = new DBConfig();
	    	$data = array(
	    		"cin"     => $cin,
	    		"nom"     => $nom,
	    		"tel"     => $tel,
	    		"adresse" => $adresse
	    	);

	    	return $bd->updateData('personnes', $data);
	    }

	    public function delete($cin) {
	    	$bd = new DBConfig();
	    	$data = array(
	    		"cin" => $cin
	    	);

	    	return $bd->deleteData('personnes', $data);
	    }

	    public function create() {
	    	$bd = new DBConfig();
	    	$data = array(
	    		"cin"     => $this->_cin,
	    		"nom"     => $this->_nom,
	    		"tel"     => $this->_tel,
	    		"adresse" => $this->_adresse
	    	);

	    	return $bd->createData('personnes', $data);
	    }
	}
?>