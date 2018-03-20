<?php
	class Administrador{
		private $id_administrador;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $id_cuenta;

		function __construct( $id_administrador, $nombre, $apellido_paterno, $apellido_materno, $id_cuenta ){
			$this->id_administrador = $id_administrador;
			$this->nombre 	   = $nombre;
			$this->apellido_paterno = $apellido_paterno;
			$this->apellido_materno = $apellido_materno;
			$this->id_cuenta   = $id_cuenta; 
		}

		public function setIdAdministrador( $id_administrador ){
			$this->id_administrador = $id_administrador;
		}

		public function setNombre( $nombre ){
			$this->nombre = $nombre;
		} 

		public function setApellidoPaterno( $iapellido_paterno ){
			$this->apellido_paterno = $apellido_paterno;
		} 

		public function setApellidoMaterno( $apellido_materno ){
			$this->apellido_materno = $apellido_materno;
		} 

		public function setIdCuenta( $id_cuenta ){
			$this->id_cuenta = $id_cuenta;
		} 

		public function getIdAdministrador(){
			return $this->id_administrador;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function getApellidoPaterno(){
			return $this->apellido_paterno;
		}

		public function getApellidoMaterno(){
			return $this->apellido_materno;
		}

		public function getIdCuenta(){
			return $this->id_cuenta;
		}
	}
?>
