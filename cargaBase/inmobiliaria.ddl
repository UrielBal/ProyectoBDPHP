CREATE SEQUENCE cuenta_pk_sec;
CREATE TABLE CUENTA(
	id_cuenta 	INT				DEFAULT nextval( 'cuenta_pk_sec' ),
	usuario		VARCHAR( 70 )	NOT NULL,
	password 	VARCHAR( 100 )	NOT NULL,
	tipo_cuenta	VARCHAR( 20 )	NOT NULL,

	CONSTRAINT chk_tipo_cuenta CHECK( tipo_cuenta IN( 'ADMINISTRADOR', 'EMPLEADO', 'CLIENTE' ) )
);
ALTER TABLE CUENTA ADD CONSTRAINT cuenta_pk  PRIMARY KEY( id_cuenta );

CREATE SEQUENCE administrador_pk;
CREATE TABLE ADMINISTRADOR(
	id_administrador	INT 				DEFAULT nextval( 'administrador_pk' ),
	nombre 				VARCHAR( 100 )		NOT NULL,
	apellido_paterno	VARCHAR( 50 )		NOT NULL,
	apellido_materno	VARCHAR( 50 ),
	id_cuenta			INT 				NOT NULL
);

CREATE SEQUENCE direccion_pk_sec;
CREATE TABLE DIRECCION(
	id_direccion	 INT 			DEFAULT nextval( 'direccion_pk_sec' ),
	ciudad			VARCHAR( 70 )	NOT NULL,
	colonia			VARCHAR( 70 )	NOT NULL,
	calle			VARCHAR( 70 )	NOT NULL,
	numero			VARCHAR( 10 )	NOT NULL
);
ALTER TABLE DIRECCION ADD CONSTRAINT direccion_pk PRIMARY KEY( id_direccion );

CREATE SEQUENCE telefono_pk_sec;
CREATE TABLE TELEFONO(
	id_telefono 	INT 			DEFAULT nextval( 'telefono_pk_sec' ),
	id_direccion 	INT 			NOT NULL,
	telefono 		VARCHAR( 20 )	NOT NULL,

	CONSTRAINT telefono_fk FOREIGN KEY( id_direccion )
		REFERENCES DIRECCION( id_direccion )
);
ALTER TABLE TELEFONO ADD CONSTRAINT telefono_pk PRIMARY KEY( id_telefono );

CREATE SEQUENCE agencia_pk_sec;
CREATE TABLE AGENCIA(
	id_agencia	 	INT 			DEFAULT nextval( 'agencia_pk_sec' ),
	fax			 	VARCHAR( 50 )	NOT NULL,
	id_direccion	INT 			NOT NULL,
	id_titular		INT 			NOT NULL,
	id_zona   		INT 			NOT NULL
);

ALTER TABLE AGENCIA ADD CONSTRAINT agencia_fk PRIMARY KEY( id_agencia );

CREATE SEQUENCE empleado_pk_sec;
CREATE TABLE EMPLEADO(
	id_empleado 		INT 				DEFAULT nextval( 'empleado_pk_sec' ),
	id_agencia 			INT 				NOT NULL,
	nombre 				VARCHAR( 60 )		NOT NULL,
	apellido_paterno	VARCHAR( 60 )		NOT NULL,
	apellido_materno	VARCHAR( 60 ),
	tipo_empleado		VARCHAR( 60 )		NOT NULL,
	id_cuenta			INT 				NOT NULL,

	CONSTRAINT empleado_fk FOREIGN KEY( id_agencia )
		REFERENCES AGENCIA( id_agencia ) 
);

ALTER TABLE EMPLEADO ADD CONSTRAINT empleado_pk PRIMARY KEY( id_empleado );

CREATE SEQUENCE titular_pk_sec;
CREATE TABLE TITULAR(
	id_titular 	INT 	DEFAULT nextval( 'titular_pk_sec' ),
	id_empleado INT 	NOT NULL,

	CONSTRAINT titular_fk FOREIGN KEY( id_empleado )
		REFERENCES EMPLEADO( id_empleado )
);

ALTER TABLE TITULAR ADD CONSTRAINT titular_pk PRIMARY KEY( id_titular );

CREATE SEQUENCE vendedor_pk_sec;
CREATE TABLE VENDEDOR(
	id_vendedor 	INT 	DEFAULT nextval( 'vendedor_pk_sec' ),
	id_empleado		INT 	NOT NULL,

	CONSTRAINT vendedor_fk FOREIGN KEY( id_empleado )
		REFERENCES EMPLEADO( id_empleado )
);

ALTER TABLE VENDEDOR ADD CONSTRAINT vendedor_pk PRIMARY KEY( id_vendedor );

CREATE SEQUENCE cliente_pk_sec;
CREATE TABLE CLIENTE(
	id_cliente 			INT 				DEFAULT nextval( 'cliente_pk_sec' ),
	id_vendedor			INT,
	nombre 				VARCHAR( 60 )       NOT NULL,
	apellido_paterno	VARCHAR( 60 )		NOT NULL,
	apellido_materno	VARCHAR( 60 ),
	correo				VARCHAR( 60 )		NOT NULL,
	id_cuenta			INT,
	id_direccion 		INT,

	CONSTRAINT cliente_fk FOREIGN KEY( id_vendedor )
		REFERENCES VENDEDOR( id_vendedor )
);
ALTER TABLE CLIENTE ADD CONSTRAINT cliente_pk PRIMARY KEY( id_cliente );

CREATE SEQUENCE zona_pk_sec;
CREATE TABLE ZONA(
	id_zona 		INT 			DEFAULT nextval( 'zona_pk_sec' ),
	nombre_zona		VARCHAR( 60 )	NOT NULL
);

ALTER TABLE ZONA ADD CONSTRAINT zona_pk PRIMARY KEY( id_zona );

CREATE SEQUENCE inmueble_pk_Sec;
CREATE TABLE INMUEBLE(
	id_inmueble 		INT 			DEFAULT nextval( 'inmueble_pk_Sec' ),
	id_zona 			INT 			NOT NULL,
	id_cliente 			INT,
	propietario			VARCHAR( 100 )	NOT NULL,
	tipo_renta_venta	VARCHAR( 15 )	NOT NULL,
	tipo_local_piso	VARCHAR( 20 )	NOT NULL,

	CONSTRAINT chk_tipo_inmueble 
		CHECK( tipo_local_piso = 'LOCAL' OR tipo_local_piso = 'PISO' ),
	CONSTRAINT refzona_fk FOREIGN KEY( id_zona )
		REFERENCES ZONA( id_zona ),
	CONSTRAINT refcliente_fk FOREIGN KEY( id_cliente )
		REFERENCES CLIENTE( id_cliente )
);

ALTER TABLE INMUEBLE ADD CONSTRAINT inmueble_pk PRIMARY KEY( id_inmueble );

CREATE SEQUENCE local_pk_sec;
CREATE TABLE LOCAL(
	id_local		INT 		DEFAULT nextval( 'local_pk_sec' ),
	id_inmueble 	INT 		NOT NULL,
	licencia		INT,

	CONSTRAINT local_fk FOREIGN KEY( id_inmueble )
		REFERENCES INMUEBLE( id_inmueble )
);

ALTER TABLE LOCAL ADD CONSTRAINT local_pk PRIMARY KEY( id_local );

CREATE SEQUENCE piso_pk_sec;
CREATE TABLE PISO(
	id_piso 			INT 			DEFAULT nextval( 'piso_pk_sec' ),
	id_inmueble 		INT 			NOT NULL,
	num_habitaciones	INT 			NOT NULL,
	num_banios 			INT 			NOT NULL,
	tipo_ambiente 		VARCHAR( 10 ) 	NOT NULL,
	tipo_gas 			VARCHAR( 10 )	NOT NULL,

	CONSTRAINT chk_tipo_ambiente CHECK( tipo_ambiente = 'INTERIOR' or tipo_ambiente = 'EXTERIOR' ),
	CONSTRAINT chk_tipo_gas	CHECK( tipo_gas IN( 'NATURAL', 'CIUDAD', 'BUTANO' ) ),
	CONSTRAINT	piso_fk FOREIGN KEY( id_inmueble )
		REFERENCES INMUEBLE( id_inmueble )	
);

ALTER TABLE PISO ADD CONSTRAINT piso_pk PRIMARY KEY( id_piso );

CREATE SEQUENCE venta_pk_sec;
CREATE TABLE VENTA(
	id_venta		INT 			DEFAULT nextval( 'venta_pk_sec' ),
	id_inmueble 	INT 			NOT NULL,
	precio_venta 	INT,
	hipotecado 		VARCHAR( 10 ),

	CONSTRAINT venta_fk FOREIGN KEY( id_inmueble )
		REFERENCES INMUEBLE( id_inmueble )
);

ALTER TABLE VENTA ADD CONSTRAINT venta_pk PRIMARY KEY( id_venta);

CREATE SEQUENCE alquiler_pk_sec;
CREATE TABLE ALQUILER(
	id_alquiler 		INT 		DEFAULT nextval( 'alquiler_pk_sec' ),
	id_inmueble 		INT 		NOT NULL,
	precio_alquiler		INT 		NOT NULL,
	fianza				INT 		NOT NULL,

	CONSTRAINT alquiler_fk FOREIGN KEY( id_inmueble )
		REFERENCES INMUEBLE( id_inmueble )
);

ALTER TABLE ALQUILER ADD CONSTRAINT alquiler_pk PRIMARY KEY( id_alquiler );