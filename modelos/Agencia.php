<?php
	class Agencia{
		private $id_agencia;
		private $fax;
		private $id_direccion;
		private $id_titular;
		private $id_zona;

		function __construct( $id_agencia, $fax, $id_direccion, $id_titular, $id_zona ){
			$this->id_agencia = $id_agencia;
			$this->fax = $fax;
			$this->id_direccion = $id_direccion;
			$this->id_titular = $id_titular;
			$this->id_zona = $id_zona;
		}

		public function setIdAgencia( $id_agencia ){
			$this->id_agencia = $id_agencia;
		}

		public function setFax( $fax ){
			$this->fax = $fax;
		}

		public function setIdDireccion( $id_direccion ){
			$this->id_direccion = $id_direccion;
		}

		public function setIdTitular( $id_titular ){
			$this->id_titular = $id_titular;
		}

		public function setIdZona( $id_zona ){
			$this->id_zona = $id_zona;
		}

		public function getIdAgencia(){
			return $this->id_agencia;
		}

		public function getFax(){
			return $this->fax;
		}

		public function getIdDireccion(){
			return $this->id_direccion;
		}

		public function getIdTitular(){
			return $this->id_titular;
		}

		public function getIdZona(){
			return $this->id_zona;
		}
	}
?>