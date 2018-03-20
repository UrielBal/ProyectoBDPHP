<?php
	class Empleado{
		private $id_empleado;
		private $id_agencia;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $tipo_empleado;
		private $id_cuenta;

		function __construct( $id_empleado, $id_agencia, $nombre, $apellido_paterno, $apellido_materno, $tipo_empleado, $id_cuenta ){
			$this->id_empleado = $id_empleado;
			$this->id_agencia  = $id_agencia;
			$this->nombre 	   = $nombre;
			$this->apellido_paterno = $apellido_paterno;
			$this->apellido_materno = $apellido_materno;
			$this->tipo_empleado 	= $tipo_empleado;
			$this->id_cuenta   = $id_cuenta; 
		}

		public function setIdEmpleado( $id_empleado ){
			$this->id_empleado = $id_empleado;
		}

		public function setIdAgencia( $id_agencia ){
			$this->id_agencia = $id_agencia;
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

		public function setTipoEmpleado( $tipo_empleado ){
			$this->tipo_empleado = $tipo_empleado;
		} 

		public function setIdCuenta( $id_cuenta ){
			$this->id_cuenta = $id_cuenta;
		} 

		public function getIdEmpleado(){
			return $this->id_empleado;
		}

		public function getIdAgencia(){
			return $this->id_agencia;
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

		public function getTipoEmpleado(){
			return $this->tipo_empleado;
		}

		public function getIdCuenta(){
			return $this->id_cuenta;
		}
	}
?>
