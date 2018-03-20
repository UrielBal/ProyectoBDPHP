<?php
	class Cliente{
		private $id_cliente;
		private $id_vendedor;
		private $nombre;
		private $apellido_paterno;
		private $apellido_materno;
		private $correo;
		private $id_cuenta;
		private $id_direccion;

		function __construct( $id_cliente, $id_vendedor, $nombre, $apellido_paterno, $apellido_materno, $correo, $id_cuenta, $id_direccion ){
			$this->id_cliente  = $id_cliente;
			$this->id_vendedor = $id_vendedor;
			$this->nombre = $nombre;
			$this->apellido_paterno = $apellido_paterno;
			$this->apellido_materno = $apellido_materno;
			$this->correo = $correo;
			$this->id_cuenta = $id_cuenta;
			$this->id_direccion = $id_direccion;
		}

		public function setIdCliente( $id_cliente ){
			$this->id_cliente = $id_cliente;
		}

		public function setIdVendedor( $id_vendedor ){
			$this->id_vendedor = $id_vendedor;
		}  

		public function setNombre( $nombre ){
			$this->nombre = $nombre;
		} 

		public function setApellidoPaterno( $iapellido_paterno ){
			$this->apellido_paterno = $apellido_paterno;
		} 

		public function setApellidoMaterno( $apellido_materno ){
			$this->apellido_materno = $apellido_paterno;
		} 

		public function setCorreo( $correo ){
			$this->correo = $correo;
		} 

		public function setIdCuenta( $id_cuenta ){
			$this->id_cuenta = $id_cuenta;
		} 

		public function setIdDireccion( $id_direccion ){
			$this->id_direccion = $id_direccion;
		}

		public function getIdCliente(){
			return $this->id_cliente;
		}

		public function getIdVendedor(){
			return $this->id_vendedor;
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

		public function getCorreo(){
			return $this->correo;
		}

		public function getIdCuenta(){
			return $this->id_cuenta;
		}

		public function getIdDireccion(){
			return $this->id_direccion;
		}
	}
?>