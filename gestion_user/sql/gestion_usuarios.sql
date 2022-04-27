create database gestion_usuarios;
use gestion_usuarios;

/*CREATE TABLE actividad(
    id_actividad          INT             AUTO_INCREMENT,
    descripcion           VARCHAR(100),
    PRIMARY KEY (id_actividad)
)ENGINE=INNODB
;

CREATE TABLE barrio(
    id_barrio       INT            AUTO_INCREMENT,
    descripcion     VARCHAR(50),
    id_localidad    INT,
    PRIMARY KEY (id_barrio)
)ENGINE=INNODB
;

CREATE TABLE categoria(
    id_categoria    INT            AUTO_INCREMENT,
    descripcion     VARCHAR(10),
    PRIMARY KEY (id_categoria)
)ENGINE=INNODB
;

CREATE TABLE cliente(
    id_cliente       INT     AUTO_INCREMENT,
    fecha_de_alta    DATE,
    id_persona       INT,
    PRIMARY KEY (id_cliente)
)ENGINE=INNODB
;
CREATE TABLE detalle_factura_impuesto(
    id_detalle_factura_impuesto    INT    AUTO_INCREMENT,
    id_tipo_impositivos            INT,
    id_factura                     INT,
    PRIMARY KEY (id_detalle_factura_impuesto)
)ENGINE=INNODB
;

CREATE TABLE domicilio(
    id_domicilio    INT             AUTO_INCREMENT,
    calle        VARCHAR(30)	NOT NULL,
    altura		INT(11),
    manzana		int(11),
    numero_casa int(11),
    torre		int(11),
    piso		varchar(10),
    observaciones varchar(150),
    id_barrio       INT,
    PRIMARY KEY (id_domicilio)
)ENGINE=INNODB
;
CREATE TABLE domicilio_detalle(
    id_domicilio_detalle     INT             AUTO_INCREMENT,
    valor                    VARCHAR(100),
    id_domicilio             INT,
    id_atributo_domicilio    INT,
    PRIMARY KEY (id_domicilio_detalle)
)ENGINE=INNODB
;



CREATE TABLE empleado(
    id_empleado      INT     AUTO_INCREMENT,
    fecha_alta       DATE,
    numero_legajo    INT,
    id_persona       INT,
    PRIMARY KEY (id_empleado)
)ENGINE=INNODB
;
CREATE TABLE estado_pago(
    id_estado_pago    INT             AUTO_INCREMENT,
    descripcion       VARCHAR(100),
    PRIMARY KEY (id_estado_pago)
)ENGINE=INNODB
;

CREATE TABLE factura(
    id_factura        INT     AUTO_INCREMENT,
    numero            INT,
    fecha_emision     DATE,
    id_estado_pago    INT,
    id_periodo        INT,
    id_medidor        INT,
    PRIMARY KEY (id_factura)
)ENGINE=INNODB
;
CREATE TABLE factura_vencimiento(
    id_factura_venicimiento    INT     AUTO_INCREMENT,
    fecha_vencimiento          DATE,
    id_factura                 INT,
    id_tipo_vencimiento        INT,
    PRIMARY KEY (id_factura_venicimiento)
)ENGINE=INNODB
;

CREATE TABLE localidad(
    id_localidad    INT            AUTO_INCREMENT,
    descripcion     VARCHAR(50),
    id_provincia    INT,
    PRIMARY KEY (id_localidad)
)ENGINE=INNODB
;

CREATE TABLE medidor(
    id_medidor              INT            AUTO_INCREMENT,
    numero                  VARCHAR(50)    NOT NULL,
    id_cliente              INT,
    id_persona_domicilio    INT,
    PRIMARY KEY (id_medidor)
)ENGINE=INNODB
;
CREATE TABLE medidor_domicilio(
    id_medidor_domicilio    INT    AUTO_INCREMENT,
    id_medidor              INT,
    id_domicilio            INT,
    PRIMARY KEY (id_medidor_domicilio)
)ENGINE=INNODB
; 
CREATE TABLE medidor_categoria(
    id_medidor_categoria    INT    AUTO_INCREMENT,
    id_categoria            INT,
    id_medidor              INT,
    PRIMARY KEY (id_medidor_categoria)
)ENGINE=INNODB
;

CREATE TABLE medidor_tipo_servicio(
    id_medidor_tipo_servicio    INT    AUTO_INCREMENT,
    id_servicio                 INT,
    id_medidor                  INT,
    PRIMARY KEY (id_medidor_tipo_servicio)
)ENGINE=INNODB
;

CREATE TABLE modulo(
    id_modulo      INT             AUTO_INCREMENT,
    descripcion    VARCHAR(100),
    directorio     VARCHAR(30),
    PRIMARY KEY (id_modulo)
)ENGINE=INNODB
;

CREATE TABLE pago(
    id_pago        INT            AUTO_INCREMENT,
    numero_pago    VARCHAR(18),
    fecha          DATE,
    id_factura     INT,
    PRIMARY KEY (id_pago)
)ENGINE=INNODB
;


CREATE TABLE pais(
    id_pais        INT             AUTO_INCREMENT,
    descripcion    VARCHAR(100),
    PRIMARY KEY (id_pais)
)ENGINE=INNODB
;

CREATE TABLE perfil(
    id_perfil      INT             AUTO_INCREMENT,
    descripcion    VARCHAR(100),
    PRIMARY KEY (id_perfil)
)ENGINE=INNODB
;

CREATE TABLE perfil_modulo(
    id_perfil_modulo    INT             AUTO_INCREMENT,
    descripcion         VARCHAR(100),
    id_perfil           INT,
    id_modulo           INT,
    PRIMARY KEY (id_perfil_modulo)
)ENGINE=INNODB
;

CREATE TABLE periodo(
    id_periodo              INT     AUTO_INCREMENT,
    fecha                   DATE,
    id_resgistro_medidor    INT,
    PRIMARY KEY (id_periodo)
)ENGINE=INNODB
;

CREATE TABLE persona(
    id_persona          INT            NOT NULL,
    nombre              VARCHAR(20),
    apellido            VARCHAR(10),
    fecha_nacimiento    DATE,
    dni                 INT            NOT NULL,
    estado              INT,
    id_sexo             INT,
    PRIMARY KEY (id_persona)
)ENGINE=INNODB
;

CREATE TABLE persona_domicilio(
    id_persona_domicilio    INT    AUTO_INCREMENT,
    id_domicilio            INT,
    id_persona              INT,
    PRIMARY KEY (id_persona_domicilio)
)ENGINE=INNODB
;

CREATE TABLE persona_tipo_contacto(
    id_personaTipoContacto    INT            AUTO_INCREMENT,
    valor                     VARCHAR(10),
    id_tipoContacto           INT,
    id_persona                INT,
    PRIMARY KEY (id_personaTipoContacto)
)ENGINE=INNODB
;

CREATE TABLE persona_domicilio(
    id_persona_domicilio    INT    AUTO_INCREMENT,
    id_domicilio            INT,
    id_persona              INT,
    PRIMARY KEY (id_persona_domicilio)
)ENGINE=INNODB
;

CREATE TABLE provincia(
    id_provincia    INT         AUTO_INCREMENT,
    descripcion     CHAR(50),
    id_pais         INT,
    PRIMARY KEY (id_provincia)
)ENGINE=INNODB
;


CREATE TABLE registro_medidor(
    id_resgistro_medidor    INT            AUTO_INCREMENT,
    fecha			        DATETIME,
    lectura_actual          VARCHAR(10),
    id_medidor              INT,
    id_empleado             INT,
    PRIMARY KEY (id_resgistro_medidor)
)ENGINE=INNODB
;

CREATE TABLE sexo(
    id_sexo        INT            AUTO_INCREMENT,
    descripcion    VARCHAR(50),
    PRIMARY KEY (id_sexo)
)ENGINE=INNODB
;

CREATE TABLE simulador(
    id_simulador    INT    AUTO_INCREMENT,
    id_cliente      INT,
    id_actividad    INT,
    PRIMARY KEY (id_simulador)
)ENGINE=INNODB
;

CREATE TABLE tipo_contacto(
    id_tipoContacto    INT            AUTO_INCREMENT,
    descripcion        VARCHAR(50),
    PRIMARY KEY (id_tipoContacto)
)ENGINE=INNODB
;

CREATE TABLE tipo_servicio(
    id_servicio           INT            AUTO_INCREMENT,
    descripcion           VARCHAR(50),
    valor_metro_cubico    FLOAT(8, 0),
    PRIMARY KEY (id_servicio)
)ENGINE=INNODB
;

CREATE TABLE tipo_vencimiento(
    id_tipo_vencimiento    INT             AUTO_INCREMENT,
    descripcion            VARCHAR(100),
    porcentaje             VARCHAR(100),
    PRIMARY KEY (id_tipo_vencimiento)
)ENGINE=INNODB
;

CREATE TABLE tipos_impositivos(
    id_tipo_impositivos    INT             AUTO_INCREMENT,
    descripcion            VARCHAR(100),
    porcentaje             VARCHAR(100),
    PRIMARY KEY (id_tipo_impositivos)
)ENGINE=INNODB
;

CREATE TABLE usuario(
    id_usuario    INT            AUTO_INCREMENT,
    username      VARCHAR(50),
    password      VARCHAR(15),
    id_persona    INT,
    id_perfil     INT,
    PRIMARY KEY (id_usuario)
)ENGINE=INNODB
;


CREATE INDEX Ref34120 ON barrio(id_localidad)
;

CREATE INDEX Ref2091 ON cliente(id_persona)
;
CREATE INDEX Ref54148 ON detalle_factura_impuesto(id_tipo_impositivos)
;
CREATE INDEX Ref42155 ON detalle_factura_impuesto(id_factura)
;
CREATE INDEX Ref35121 ON domicilio(id_barrio)
;

CREATE INDEX Ref14112 ON domicilio_detalle(id_domicilio)
;
CREATE INDEX Ref41113 ON domicilio_detalle(id_atributo_domicilio)
;
CREATE INDEX Ref20114 ON empleado(id_persona)
;
CREATE INDEX Ref10162 ON factura(id_medidor)
;
CREATE INDEX Ref55141 ON factura(id_estado_pago)
;

CREATE INDEX Ref47159 ON factura(id_periodo)
;
CREATE INDEX Ref42145 ON factura_vencimiento(id_factura)
;

CREATE INDEX Ref52146 ON factura_vencimiento(id_tipo_vencimiento)
;

CREATE INDEX Ref33119 ON localidad(id_provincia)
;

CREATE INDEX Ref19108 ON medidor(id_cliente)
;

CREATE INDEX Ref31139 ON medidor_categoria(id_categoria)
;

CREATE INDEX Ref10140 ON medidor_categoria(id_medidor)
;

CREATE INDEX Ref3137 ON medidor_tipo_servicio(id_servicio)
;
CREATE INDEX Ref10138 ON medidor_tipo_servicio(id_medidor)
;

CREATE INDEX Ref42142 ON pago(id_factura)
;

CREATE INDEX Ref36106 ON perfil_modulo(id_perfil)
;
CREATE INDEX Ref38107 ON perfil_modulo(id_modulo)
;

CREATE INDEX Ref11163 ON periodo(id_resgistro_medidor)
;

CREATE INDEX Ref26164 ON persona(id_sexo)
;

CREATE INDEX Ref14150 ON persona_domicilio(id_domicilio)
;

CREATE INDEX Ref20151 ON persona_domicilio(id_persona)
;

CREATE INDEX Ref2376 ON persona_tipo_contacto(id_tipoContacto)
;

CREATE INDEX Ref2078 ON persona_tipo_contacto(id_persona)
;

CREATE INDEX Ref32118 ON provincia(id_pais)
;
CREATE INDEX Ref10111 ON registro_medidor(id_medidor)
;
CREATE INDEX Ref39115 ON registro_medidor(id_empleado)
;

CREATE INDEX Ref19160 ON simulador(id_cliente)
;

CREATE INDEX Ref62161 ON simulador(id_actividad)
;

CREATE INDEX Ref2089 ON usuario(id_persona)
;


CREATE INDEX Ref36105 ON usuario(id_perfil)
;

ALTER TABLE barrio ADD CONSTRAINT Reflocalidad120 
    FOREIGN KEY (id_localidad)
    REFERENCES localidad(id_localidad)
;

ALTER TABLE cliente ADD CONSTRAINT Refpersona91 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;

ALTER TABLE detalle_factura_impuesto ADD CONSTRAINT Reftipos_impositivos148 
    FOREIGN KEY (id_tipo_impositivos)
    REFERENCES tipos_impositivos(id_tipo_impositivos)
;

ALTER TABLE detalle_factura_impuesto ADD CONSTRAINT Reffactura155 
    FOREIGN KEY (id_factura)
    REFERENCES factura(id_factura)
;

ALTER TABLE domicilio ADD CONSTRAINT Refbarrio121 
    FOREIGN KEY (id_barrio)
    REFERENCES barrio(id_barrio)
;

ALTER TABLE domicilio_detalle ADD CONSTRAINT Refdomicilio112 
    FOREIGN KEY (id_domicilio)
    REFERENCES domicilio(id_domicilio)
;

ALTER TABLE domicilio_detalle ADD CONSTRAINT Refatributo_domicilio113 
    FOREIGN KEY (id_atributo_domicilio)
    REFERENCES atributo_domicilio(id_atributo_domicilio)
;

ALTER TABLE empleado ADD CONSTRAINT Refpersona114 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;

ALTER TABLE factura ADD CONSTRAINT Refmedidor162 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;

ALTER TABLE factura ADD CONSTRAINT Refestado_pago141 
    FOREIGN KEY (id_estado_pago)
    REFERENCES estado_pago(id_estado_pago)
;

ALTER TABLE factura ADD CONSTRAINT Refperiodo159 
    FOREIGN KEY (id_periodo)
    REFERENCES periodo(id_periodo)
;

ALTER TABLE factura_vencimiento ADD CONSTRAINT Reffactura145 
    FOREIGN KEY (id_factura)
    REFERENCES factura(id_factura)
;

ALTER TABLE factura_vencimiento ADD CONSTRAINT Reftipo_vencimiento146 
    FOREIGN KEY (id_tipo_vencimiento)
    REFERENCES tipo_vencimiento(id_tipo_vencimiento)
;
ALTER TABLE localidad ADD CONSTRAINT Refprovincia119 
    FOREIGN KEY (id_provincia)
    REFERENCES provincia(id_provincia)
;

ALTER TABLE medidor ADD CONSTRAINT Refcliente108 
    FOREIGN KEY (id_cliente)
    REFERENCES cliente(id_cliente)
;


ALTER TABLE medidor_categoria ADD CONSTRAINT Refcategoria139 
    FOREIGN KEY (id_categoria)
    REFERENCES categoria(id_categoria)
;

ALTER TABLE medidor_categoria ADD CONSTRAINT Refmedidor140 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;

ALTER TABLE medidor_tipo_servicio ADD CONSTRAINT Reftipo_servicio137 
    FOREIGN KEY (id_servicio)
    REFERENCES tipo_servicio(id_servicio)
;

ALTER TABLE medidor_tipo_servicio ADD CONSTRAINT Refmedidor138 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;
ALTER TABLE pago ADD CONSTRAINT Reffactura142 
    FOREIGN KEY (id_factura)
    REFERENCES factura(id_factura)
;
ALTER TABLE perfil_modulo ADD CONSTRAINT Refperfil106 
    FOREIGN KEY (id_perfil)
    REFERENCES perfil(id_perfil)
;

ALTER TABLE perfil_modulo ADD CONSTRAINT Refmodulo107 
    FOREIGN KEY (id_modulo)
    REFERENCES modulo(id_modulo)
;
ALTER TABLE periodo ADD CONSTRAINT Refregistro_medidor163 
    FOREIGN KEY (id_resgistro_medidor)
    REFERENCES registro_medidor(id_resgistro_medidor)
;

ALTER TABLE persona ADD CONSTRAINT Refsexo164 
    FOREIGN KEY (id_sexo)
    REFERENCES sexo(id_sexo)
;


ALTER TABLE persona_domicilio ADD CONSTRAINT Refdomicilio150 
    FOREIGN KEY (id_domicilio)
    REFERENCES domicilio(id_domicilio)
;

ALTER TABLE persona_domicilio ADD CONSTRAINT Refpersona151 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;


ALTER TABLE persona_tipo_contacto ADD CONSTRAINT Reftipo_contacto76 
    FOREIGN KEY (id_tipoContacto)
    REFERENCES tipo_contacto(id_tipoContacto)
;

ALTER TABLE persona_tipo_contacto ADD CONSTRAINT Refpersona78 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;

ALTER TABLE provincia ADD CONSTRAINT Refpais118 
    FOREIGN KEY (id_pais)
    REFERENCES pais(id_pais)
;

ALTER TABLE registro_medidor ADD CONSTRAINT Refmedidor111 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;

ALTER TABLE registro_medidor ADD CONSTRAINT Refempleado115 
    FOREIGN KEY (id_empleado)
    REFERENCES empleado(id_empleado)
;
ALTER TABLE simulador ADD CONSTRAINT Refcliente160 
    FOREIGN KEY (id_cliente)
    REFERENCES cliente(id_cliente)
;

ALTER TABLE simulador ADD CONSTRAINT Refactividad161 
    FOREIGN KEY (id_actividad)
    REFERENCES actividad(id_actividad)
;

ALTER TABLE usuario ADD CONSTRAINT Refpersona89 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;

ALTER TABLE usuario ADD CONSTRAINT Refperfil105 
    FOREIGN KEY (id_perfil)
    REFERENCES perfil(id_perfil)
;*/


CREATE TABLE barrio(
    id_barrio       INT            AUTO_INCREMENT,
    descripcion     VARCHAR(50),
    id_localidad    INT,
    PRIMARY KEY (id_barrio)
)ENGINE=INNODB
;



-- 
-- TABLE: categoria 
--

CREATE TABLE categoria(
    id_categoria    INT            AUTO_INCREMENT,
    descripcion     VARCHAR(10),
    PRIMARY KEY (id_categoria)
)ENGINE=INNODB
;



-- 
-- TABLE: cliente 
--

CREATE TABLE cliente(
    id_cliente    INT    AUTO_INCREMENT,
    id_persona    INT,
    PRIMARY KEY (id_cliente)
)ENGINE=INNODB
;



-- 
-- TABLE: domicilio 
--

CREATE TABLE domicilio(
    id_domicilio    INT            AUTO_INCREMENT,
    calle           VARCHAR(30)    NOT NULL,
    altura          INT            NOT NULL,
    manzana         VARCHAR(10)    NOT NULL,
    numero_casa     INT            NOT NULL,
    piso            INT            NOT NULL,
    torre           VARCHAR(10),
    id_barrio       INT,
    PRIMARY KEY (id_domicilio)
)ENGINE=INNODB
;



-- 
-- TABLE: empleado 
--

CREATE TABLE empleado(
    id_empleado      INT     AUTO_INCREMENT,
    fecha_alta       DATE,
    numero_legajo    INT,
    id_persona       INT,
    PRIMARY KEY (id_empleado)
)ENGINE=INNODB
;



-- 
-- TABLE: estado_pago 
--

CREATE TABLE estado_pago(
    id_estado_pago    INT             AUTO_INCREMENT,
    descripcion       VARCHAR(100),
    PRIMARY KEY (id_estado_pago)
)ENGINE=INNODB
;



-- 
-- TABLE: factura 
--

CREATE TABLE factura(
    id_factura              INT            AUTO_INCREMENT,
    numero                  INT,
    fecha_emision           DATE,
    `1er_vencimiento`       FLOAT(8, 0),
    `2do_vencimiento`       FLOAT(8, 0),
    iva                     FLOAT(8, 0),
    canon                   CHAR(10),
    id_estado_pago          INT,
    id_periodo              INT,
    id_medidor              INT,
    id_resgistro_medidor    INT,
    PRIMARY KEY (id_factura)
)ENGINE=INNODB
;



-- 
-- TABLE: localidad 
--

CREATE TABLE localidad(
    id_localidad    INT            AUTO_INCREMENT,
    descripcion     VARCHAR(50),
    id_provincia    INT,
    PRIMARY KEY (id_localidad)
)ENGINE=INNODB
;



-- 
-- TABLE: medidor 
--

CREATE TABLE medidor(
    id_medidor      INT            AUTO_INCREMENT,
    numero          VARCHAR(50)    NOT NULL,
    id_cliente      INT,
    id_categoria    INT,
    PRIMARY KEY (id_medidor)
)ENGINE=INNODB
;



-- 
-- TABLE: medidor_domicilio 
--

CREATE TABLE medidor_domicilio(
    id_medidor_domicilio    INT    AUTO_INCREMENT,
    id_medidor              INT,
    id_domicilio            INT,
    PRIMARY KEY (id_medidor_domicilio)
)ENGINE=INNODB
;



-- 
-- TABLE: medidor_tipo_servicio 
--

CREATE TABLE medidor_tipo_servicio(
    id_medidor_tipo_servicio    INT    AUTO_INCREMENT,
    id_servicio                 INT,
    id_medidor                  INT,
    PRIMARY KEY (id_medidor_tipo_servicio)
)ENGINE=INNODB
;



-- 
-- TABLE: modulo 
--

CREATE TABLE modulo(
    id_modulo      INT             AUTO_INCREMENT,
    descripcion    VARCHAR(100),
    directorio     VARCHAR(30),
    PRIMARY KEY (id_modulo)
)ENGINE=INNODB
;



-- 
-- TABLE: pais 
--

CREATE TABLE pais(
    id_pais        INT             AUTO_INCREMENT,
    descripcion    VARCHAR(100),
    PRIMARY KEY (id_pais)
)ENGINE=INNODB
;



-- 
-- TABLE: perfil 
--

CREATE TABLE perfil(
    id_perfil      INT             AUTO_INCREMENT,
    descripcion    VARCHAR(100),
    PRIMARY KEY (id_perfil)
)ENGINE=INNODB
;



-- 
-- TABLE: perfil_modulo 
--

CREATE TABLE perfil_modulo(
    id_perfil_modulo    INT    AUTO_INCREMENT,
    id_perfil           INT,
    id_modulo           INT,
    PRIMARY KEY (id_perfil_modulo)
)ENGINE=INNODB
;



-- 
-- TABLE: periodo 
--

CREATE TABLE periodo(
    id_periodo    INT     AUTO_INCREMENT,
    fecha         DATE,
    PRIMARY KEY (id_periodo)
)ENGINE=INNODB
;



-- 
-- TABLE: persona 
--

CREATE TABLE persona(
    id_persona          INT            AUTO_INCREMENT,
    nombre              VARCHAR(20),
    apellido            VARCHAR(10),
    fecha_nacimiento    DATE,
    dni                 INT            NOT NULL,
    estado              INT,
    id_sexo             INT,
    PRIMARY KEY (id_persona)
)ENGINE=INNODB
;



-- 
-- TABLE: persona_contacto 
--

CREATE TABLE persona_contacto(
    id_persona_contacto    INT            AUTO_INCREMENT,
    valor                  VARCHAR(10),
    id_contacto            INT,
    id_persona             INT,
    PRIMARY KEY (id_persona_contacto)
)ENGINE=INNODB
;



-- 
-- TABLE: persona_domicilio 
--

CREATE TABLE persona_domicilio(
    id_persona_domicilio    INT    AUTO_INCREMENT,
    id_domicilio            INT,
    id_persona              INT,
    PRIMARY KEY (id_persona_domicilio)
)ENGINE=INNODB
;



-- 
-- TABLE: provincia 
--

CREATE TABLE provincia(
    id_provincia    INT         AUTO_INCREMENT,
    descripcion     CHAR(50),
    id_pais         INT,
    PRIMARY KEY (id_provincia)
)ENGINE=INNODB
;



-- 
-- TABLE: registro_medidor 
--

CREATE TABLE registro_medidor(
    id_resgistro_medidor    INT            AUTO_INCREMENT,
    fecha                   DATETIME,
    lectura_actual          VARCHAR(10),
    consumo                 INT,
    id_medidor              INT,
    id_empleado             INT,
    PRIMARY KEY (id_resgistro_medidor)
)ENGINE=INNODB
;



-- 
-- TABLE: sexo 
--

CREATE TABLE sexo(
    id_sexo        INT            AUTO_INCREMENT,
    descripcion    VARCHAR(50),
    PRIMARY KEY (id_sexo)
)ENGINE=INNODB
;



-- 
-- TABLE: tipo_contacto 
--

CREATE TABLE tipo_contacto(
    id_contacto    INT            AUTO_INCREMENT,
    descripcion    VARCHAR(50),
    PRIMARY KEY (id_contacto)
)ENGINE=INNODB
;



-- 
-- TABLE: tipo_servicio 
--

CREATE TABLE tipo_servicio(
    id_servicio       INT            AUTO_INCREMENT,
    descripcion       VARCHAR(50),
    cargo_fijo        FLOAT(8, 0),
    cargo_variable    FLOAT(8, 0),
    PRIMARY KEY (id_servicio)
)ENGINE=INNODB
;



-- 
-- TABLE: usuario 
--

CREATE TABLE usuario(
    id_usuario    INT            AUTO_INCREMENT,
    username      VARCHAR(50),
    password      VARCHAR(15),
    id_persona    INT,
    id_perfil     INT,
    PRIMARY KEY (id_usuario)
)ENGINE=INNODB
;



-- 
-- INDEX: Ref34120 
--

CREATE INDEX Ref34120 ON barrio(id_localidad)
;
-- 
-- INDEX: Ref2091 
--

CREATE INDEX Ref2091 ON cliente(id_persona)
;
-- 
-- INDEX: Ref35121 
--

CREATE INDEX Ref35121 ON domicilio(id_barrio)
;
-- 
-- INDEX: Ref20114 
--

CREATE INDEX Ref20114 ON empleado(id_persona)
;
-- 
-- INDEX: Ref47159 
--

CREATE INDEX Ref47159 ON factura(id_periodo)
;
-- 
-- INDEX: Ref10162 
--

CREATE INDEX Ref10162 ON factura(id_medidor)
;
-- 
-- INDEX: Ref11171 
--

CREATE INDEX Ref11171 ON factura(id_resgistro_medidor)
;
-- 
-- INDEX: Ref55141 
--

CREATE INDEX Ref55141 ON factura(id_estado_pago)
;
-- 
-- INDEX: Ref33119 
--

CREATE INDEX Ref33119 ON localidad(id_provincia)
;
-- 
-- INDEX: Ref31170 
--

CREATE INDEX Ref31170 ON medidor(id_categoria)
;
-- 
-- INDEX: Ref19108 
--

CREATE INDEX Ref19108 ON medidor(id_cliente)
;
-- 
-- INDEX: Ref10168 
--

CREATE INDEX Ref10168 ON medidor_domicilio(id_medidor)
;
-- 
-- INDEX: Ref14169 
--

CREATE INDEX Ref14169 ON medidor_domicilio(id_domicilio)
;
-- 
-- INDEX: Ref3137 
--

CREATE INDEX Ref3137 ON medidor_tipo_servicio(id_servicio)
;
-- 
-- INDEX: Ref10138 
--

CREATE INDEX Ref10138 ON medidor_tipo_servicio(id_medidor)
;
-- 
-- INDEX: Ref36106 
--

CREATE INDEX Ref36106 ON perfil_modulo(id_perfil)
;
-- 
-- INDEX: Ref38107 
--

CREATE INDEX Ref38107 ON perfil_modulo(id_modulo)
;
-- 
-- INDEX: Ref26164 
--

CREATE INDEX Ref26164 ON persona(id_sexo)
;
-- 
-- INDEX: Ref2376 
--

CREATE INDEX Ref2376 ON persona_contacto(id_contacto)
;
-- 
-- INDEX: Ref2078 
--

CREATE INDEX Ref2078 ON persona_contacto(id_persona)
;
-- 
-- INDEX: Ref14150 
--

CREATE INDEX Ref14150 ON persona_domicilio(id_domicilio)
;
-- 
-- INDEX: Ref20151 
--

CREATE INDEX Ref20151 ON persona_domicilio(id_persona)
;
-- 
-- INDEX: Ref32118 
--

CREATE INDEX Ref32118 ON provincia(id_pais)
;
-- 
-- INDEX: Ref10111 
--

CREATE INDEX Ref10111 ON registro_medidor(id_medidor)
;
-- 
-- INDEX: Ref39115 
--

CREATE INDEX Ref39115 ON registro_medidor(id_empleado)
;
-- 
-- INDEX: Ref2089 
--

CREATE INDEX Ref2089 ON usuario(id_persona)
;
-- 
-- INDEX: Ref36105 
--

CREATE INDEX Ref36105 ON usuario(id_perfil)
;
-- 
-- TABLE: barrio 
--

ALTER TABLE barrio ADD CONSTRAINT Reflocalidad1201 
    FOREIGN KEY (id_localidad)
    REFERENCES localidad(id_localidad)
;


-- 
-- TABLE: cliente 
--

ALTER TABLE cliente ADD CONSTRAINT Refpersona911 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;


-- 
-- TABLE: domicilio 
--

ALTER TABLE domicilio ADD CONSTRAINT Refbarrio1211 
    FOREIGN KEY (id_barrio)
    REFERENCES barrio(id_barrio)
;


-- 
-- TABLE: empleado 
--

ALTER TABLE empleado ADD CONSTRAINT Refpersona1141 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;


-- 
-- TABLE: factura 
--

ALTER TABLE factura ADD CONSTRAINT Refperiodo1591 
    FOREIGN KEY (id_periodo)
    REFERENCES periodo(id_periodo)
;

ALTER TABLE factura ADD CONSTRAINT Refmedidor1621 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;

ALTER TABLE factura ADD CONSTRAINT Refregistro_medidor1711 
    FOREIGN KEY (id_resgistro_medidor)
    REFERENCES registro_medidor(id_resgistro_medidor)
;

ALTER TABLE factura ADD CONSTRAINT Refestado_pago1411 
    FOREIGN KEY (id_estado_pago)
    REFERENCES estado_pago(id_estado_pago)
;


-- 
-- TABLE: localidad 
--

ALTER TABLE localidad ADD CONSTRAINT Refprovincia1191 
    FOREIGN KEY (id_provincia)
    REFERENCES provincia(id_provincia)
;


-- 
-- TABLE: medidor 
--

ALTER TABLE medidor ADD CONSTRAINT Refcategoria1701 
    FOREIGN KEY (id_categoria)
    REFERENCES categoria(id_categoria)
;

ALTER TABLE medidor ADD CONSTRAINT Refcliente1081 
    FOREIGN KEY (id_cliente)
    REFERENCES cliente(id_cliente)
;


-- 
-- TABLE: medidor_domicilio 
--

ALTER TABLE medidor_domicilio ADD CONSTRAINT Refmedidor1681 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;

ALTER TABLE medidor_domicilio ADD CONSTRAINT Refdomicilio1691 
    FOREIGN KEY (id_domicilio)
    REFERENCES domicilio(id_domicilio)
;


-- 
-- TABLE: medidor_tipo_servicio 
--

ALTER TABLE medidor_tipo_servicio ADD CONSTRAINT Reftipo_servicio1371 
    FOREIGN KEY (id_servicio)
    REFERENCES tipo_servicio(id_servicio)
;

ALTER TABLE medidor_tipo_servicio ADD CONSTRAINT Refmedidor1381 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;


-- 
-- TABLE: perfil_modulo 
--

ALTER TABLE perfil_modulo ADD CONSTRAINT Refperfil1061 
    FOREIGN KEY (id_perfil)
    REFERENCES perfil(id_perfil)
;

ALTER TABLE perfil_modulo ADD CONSTRAINT Refmodulo1071 
    FOREIGN KEY (id_modulo)
    REFERENCES modulo(id_modulo)
;


-- 
-- TABLE: persona 
--

ALTER TABLE persona ADD CONSTRAINT Refsexo1641 
    FOREIGN KEY (id_sexo)
    REFERENCES sexo(id_sexo)
;


-- 
-- TABLE: persona_contacto 
--

ALTER TABLE persona_contacto ADD CONSTRAINT Reftipo_contacto761 
    FOREIGN KEY (id_contacto)
    REFERENCES tipo_contacto(id_contacto)
;

ALTER TABLE persona_contacto ADD CONSTRAINT Refpersona781 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;


-- 
-- TABLE: persona_domicilio 
--

ALTER TABLE persona_domicilio ADD CONSTRAINT Refdomicilio1501 
    FOREIGN KEY (id_domicilio)
    REFERENCES domicilio(id_domicilio)
;

ALTER TABLE persona_domicilio ADD CONSTRAINT Refpersona1511 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;


-- 
-- TABLE: provincia 
--

ALTER TABLE provincia ADD CONSTRAINT Refpais1181 
    FOREIGN KEY (id_pais)
    REFERENCES pais(id_pais)
;


-- 
-- TABLE: registro_medidor 
--

ALTER TABLE registro_medidor ADD CONSTRAINT Refmedidor1111 
    FOREIGN KEY (id_medidor)
    REFERENCES medidor(id_medidor)
;

ALTER TABLE registro_medidor ADD CONSTRAINT Refempleado1151 
    FOREIGN KEY (id_empleado)
    REFERENCES empleado(id_empleado)
;


-- 
-- TABLE: usuario 
--

ALTER TABLE usuario ADD CONSTRAINT Refpersona891 
    FOREIGN KEY (id_persona)
    REFERENCES persona(id_persona)
;

ALTER TABLE usuario ADD CONSTRAINT Refperfil1051 
    FOREIGN KEY (id_perfil)
    REFERENCES perfil(id_perfil)
;



select * from sexo;

SELECT persona.id_persona, persona.nombre, persona.apellido,
persona.fecha_nacimiento, usuario.id_usuario, usuario.username,
usuario.id_perfil FROM usuario 
JOIN persona ON persona.id_persona = usuario.id_persona;

SELECT persona.id_persona, persona.nombre, persona.apellido, 
persona.fecha_nacimiento, usuario.id_usuario, usuario.username,
usuario.id_perfil FROM usuario 
JOIN persona ON persona.id_persona = usuario.id_persona
WHERE username = '{$username}' and password = '{$password}' and persona.estado=1;

SELECT persona.id_persona, persona.nombre, persona.apellido,
persona.fecha_nacimiento, persona.id_sexo, empleado.id_empleado,
empleado.numero_legajo
FROM empleado
JOIN persona ON persona.id_persona = empleado.id_persona
WHERE id_empleado= id_empleado;

SELECT persona.id_persona, persona.nombre, persona.apellido,
persona.fecha_nacimiento, usuario.id_usuario, usuario.username,
usuario.id_perfil FROM usuario 
JOIN persona ON persona.id_persona = usuario.id_persona;
WHERE id_usuario= . $id;

INSERT INTO empleado (`id_empleado`, `id_persona`, `numero_legajo`) VALUES (NULL, "", "");

SELECT persona.id_persona, persona.nombre, persona.apellido,
persona.fecha_nacimiento, empleado.id_empleado, empleado.numero_legajo
FROM empleado JOIN persona ON persona.id_persona = empleado.id_persona;

#insert
#SEXO
INSERT INTO `gestion_usuarios`.`sexo` (`id_sexo`, `descripcion`) VALUES ('1', 'Femenino');
INSERT INTO `gestion_usuarios`.`sexo` (`id_sexo`, `descripcion`) VALUES ('2', 'Masculino');
INSERT INTO `gestion_usuarios`.`sexo` (`id_sexo`, `descripcion`) VALUES ('3', 'Otro');
#PERSONAS
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('1', 'Marcos', 'Amarilla', '1993-12-13', '84848484', '1', '2');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('2', 'Yamila', 'Zarate', '1997-03-11', '40190759', '1', '1');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('3', 'Roxana', 'Altamirano', '1971-03-12', '21789765', '1', '1');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('4', 'Luis', 'Zarate', '1971-08-25', '21565087', '1', '2');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('5', 'Luisa', 'Zarate', '1996-07-02', '37833737', '1', '1');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('6', 'Josefina', 'Olmedo', '1990-01-25', '35987789', '1', '1');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('7', 'Omar ', 'Riquelme', '1985-09-09', '29098765', '1', '2');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('8', 'Beatriz', 'Olmedo', '1990-01-24', '38765456', '1', '1');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('9', 'Jose', 'Perez', '1989-02-29', '5678876', '1', '2');
INSERT INTO `gestion_usuarios`.`persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `estado`, `id_sexo`) VALUES ('10', 'Debora', 'Mansilla', '199-05-24', '41989023', '1', '1');

#EMPLEADO
INSERT INTO `gestion_usuarios`.`empleado` (`id_empleado`, `numero_legajo`, `id_persona`) VALUES ('1', '1234', '1');
INSERT INTO `gestion_usuarios`.`empleado` (`id_empleado`, `numero_legajo`, `id_persona`) VALUES ('2', '4321', '2');
INSERT INTO `gestion_usuarios`.`empleado` (`id_empleado`, `numero_legajo`, `id_persona`) VALUES ('3', '7896', '3');
INSERT INTO `gestion_usuarios`.`empleado` (`id_empleado`, `numero_legajo`, `id_persona`) VALUES ('4', '3455', '4');
INSERT INTO `gestion_usuarios`.`empleado` (`id_empleado`, `numero_legajo`, `id_persona`) VALUES ('5', '2345', '5');
INSERT INTO `gestion_usuarios`.`empleado` (`id_empleado`, `numero_legajo`, `id_persona`) VALUES ('6', '4556', '6');

#cliente
INSERT INTO `gestion_usuarios`.`cliente` (`id_cliente`, `id_persona`) VALUES ('1', '7');
INSERT INTO `gestion_usuarios`.`cliente` (`id_cliente`, `id_persona`) VALUES ('2', '8');
INSERT INTO `gestion_usuarios`.`cliente` (`id_cliente`, `id_persona`) VALUES ('3', '9');
INSERT INTO `gestion_usuarios`.`cliente` (`id_cliente`, `id_persona`) VALUES ('4', '10');

#categorias
INSERT INTO `gestion_usuarios`.`categoria` (`id_categoria`, `descripcion`) VALUES ('1', 'Residencial');
INSERT INTO `gestion_usuarios`.`categoria` (`id_categoria`, `descripcion`) VALUES ('2', 'Industrial');

#servicio
INSERT INTO `gestion_usuarios`.`tipo_servicio` (`id_servicio`, `descripcion`, `cargo_fijo`, `cargo_variable`) VALUES ('1', 'agua potable', '600', '200');
INSERT INTO `gestion_usuarios`.`tipo_servicio` (`id_servicio`, `descripcion`, `cargo_fijo`, `cargo_variable`) VALUES ('2', 'cloacas', '400', '200');

#medidor
INSERT INTO `gestion_usuarios`.`medidor` (`id_medidor`, `numero`, `id_cliente`, `id_categoria`) VALUES ('1', '999', '1', '1');
INSERT INTO `gestion_usuarios`.`medidor` (`id_medidor`, `numero`, `id_cliente`, `id_categoria`) VALUES ('2', '3333', '2', '1');
INSERT INTO `gestion_usuarios`.`medidor` (`id_medidor`, `numero`, `id_cliente`, `id_categoria`) VALUES ('3', '991', '3', '2');
INSERT INTO `gestion_usuarios`.`medidor` (`id_medidor`, `numero`, `id_cliente`, `id_categoria`) VALUES ('4', '1234', '4', '1');

#perfil
INSERT INTO `gestion_usuarios`.`perfil` (`id_perfil`, `descripcion`) VALUES ('1', 'Administrador');
INSERT INTO `gestion_usuarios`.`perfil` (`id_perfil`, `descripcion`) VALUES ('2', 'Cliente');
INSERT INTO `gestion_usuarios`.`perfil` (`id_perfil`, `descripcion`) VALUES ('3', 'Empleado');

#usuario
INSERT INTO `gestion_usuarios`.`usuario` (`id_usuario`, `username`, `password`, `id_persona`, `id_perfil`) VALUES ('1', 'Erajoy', '12345', '1', '1');
INSERT INTO `gestion_usuarios`.`usuario` (`id_usuario`, `username`, `password`, `id_persona`, `id_perfil`) VALUES ('2', 'Lmendez', '12121', '2', '2');
INSERT INTO `gestion_usuarios`.`usuario` (`id_usuario`, `username`, `password`, `id_persona`, `id_perfil`) VALUES ('3', 'Alescano', '12345', '3', '3');
INSERT INTO `gestion_usuarios`.`usuario` (`id_usuario`, `username`, `password`, `id_persona`, `id_perfil`) VALUES ('4', 'Jmorinigo', '12345', '4', '2');
INSERT INTO `gestion_usuarios`.`usuario` (`id_usuario`, `username`, `password`, `id_persona`, `id_perfil`) VALUES ('5', 'Mamarilla', '12345', '5', '3');

#modulo
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('1', 'Facturacion', 'facturacion');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('2', 'Tipos de servicios', 'tipos de servicios');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('3', 'Clientes', 'clientes');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('4', 'Empleados', 'empleados');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('5', 'Registro del medidor', 'registro del medidor');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('6', 'Actividades', 'actividades');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('7', 'Contactos', 'contactos');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('8', 'Medidores', 'medidores');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('9', 'Perfiles', 'perfiles');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('10', 'Periodos', 'periodos');
INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('11', 'Simulador', 'simulador');

#perfil_modulo
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('1', '1', '1');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('2', '2', '2');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('3', '1', '3');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('4', '3', '4');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('5', '2', '5');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('6', '1', '2');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('7', '1', '4');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('8', '1', '5');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('9', '1', '6');
############
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('1', '1', '1');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('2', '1', '2');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('3', '1', '3');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('4', '1', '4');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('5', '1', '5');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('6', '1', '6');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('7', '1', '7');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('8', '1', '8');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('9', '1', '9');
INSERT INTO `gestion_usuarios`.`perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES ('10', '1', '10');

#tiposervicio
INSERT INTO `gestion_usuarios`.`tipo_servicio` (`id_servicio`, `descripcion`, `valor_metro_cubico`) VALUES ('1', 'Agua potable', '157');
INSERT INTO `gestion_usuarios`.`tipo_servicio` (`id_servicio`, `descripcion`, `valor_metro_cubico`) VALUES ('2', 'cloacas', '119');

#actividad
INSERT INTO `gestion_usuarios`.`actividad` (`id_actividad`, `descripcion`) VALUES ('1', 'Aseo personal');
INSERT INTO `gestion_usuarios`.`actividad` (`id_actividad`, `descripcion`) VALUES ('2', 'Aseo de la casa');
INSERT INTO `gestion_usuarios`.`actividad` (`id_actividad`, `descripcion`) VALUES ('3', 'Lavado de platos');
INSERT INTO `gestion_usuarios`.`actividad` (`id_actividad`, `descripcion`) VALUES ('4', 'Lavado de ropas');
INSERT INTO `gestion_usuarios`.`actividad` (`id_actividad`, `descripcion`) VALUES ('5', 'baño al perro');
INSERT INTO `gestion_usuarios`.`actividad` (`id_actividad`, `descripcion`) VALUES ('6', 'cocina y consumo personal');
INSERT INTO `gestion_usuarios`.`actividad` (`id_actividad`, `descripcion`) VALUES ('7', 'lavado de vehiculo');

#tipo vencimiento
INSERT INTO `gestion_usuarios`.`tipo_vencimiento` (`id_tipo_vencimiento`, `descripcion`, `porcentaje`) VALUES ('1', '1er vencimiento', '0%');
INSERT INTO `gestion_usuarios`.`tipo_vencimiento` (`id_tipo_vencimiento`, `descripcion`, `porcentaje`) VALUES ('2', '2do vencimiento', '1%');


SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento, persona.id_sexo, cliente.id_cliente, cliente.fecha_de_alta
FROM persona JOIN cliente ON persona.id_persona = cliente.id_persona WHERE id_cliente= 1;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento, 
empleado.id_empleado, empleado.numero_legajo 
FROM empleado JOIN persona ON persona.id_persona = empleado.id_persona;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento, 
persona.id_sexo, cliente.id_cliente, cliente.fecha_de_alta 
FROM cliente JOIN persona ON persona.id_persona = cliente.id_cliente 
WHERE id_cliente= id_cliente;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento, 
usuario.id_usuario, usuario.username,
usuario.password, usuario.id_perfil FROM 
usuario JOIN persona ON persona.id_persona = usuario.id_persona;

SELECT persona.id_persona, persona.nombre, persona.apellido, 
persona.fecha_nacimiento,usuario.id_usuario, usuario.username, 
usuario.password,usuario.id_perfil FROM usuario 
JOIN persona ON persona.id_persona = usuario.id_persona;

SELECT persona.id_persona, persona.nombre, persona.apellido, 
persona.fecha_nacimiento, usuario.id_usuario, usuario.username,usuario.password, 
usuario.id_perfil 
FROM usuario JOIN persona ON persona.id_persona = usuario.id_persona
WHERE id_usuario= id_usuario;

INSERT INTO usuario(`id_usuario`,`username`, `password`,`id_persona`,`id_perfil`) VALUES (NULL,"","","0","");

SELECT modulo.id_modulo, modulo.descripcion
FROM modulo JOIN perfil_modulo ON perfil_modulo.id_modulo = modulo.id_modulo
JOIN perfil ON perfil.id_perfil = perfil_modulo.id_perfil 
WHERE perfil_modulo.id_perfil = id_perfil_modulo;


SELECT persona.id_persona, persona.nombre, persona.apellido,
persona.fecha_nacimiento,medidor.id_medidor,medidor.numero 
FROM medidor JOIN persona ON persona.id_persona = medidor.id_persona;


SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,
medidor.id_medidor,medidor.numero 
FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente;

INSERT INTO `medidor` (`id_medidor`, `numero`, `id_cliente`)VALUES (6,'0005','6');
INSERT INTO `medidor` (`id_medidor`, `numero`, `id_cliente`) VALUES ('4', '0004', '4');

UPDATE medidor SET numero = numero WHERE medidor.id_medidor =id_medidor;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,medidor.id_medidor,medidor.numero FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,
medidor.id_medidor, medidor.numero FROM medidor
JOIN cliente ON cliente.id_cliente = medidor.id_cliente
WHERE id_medidor= id_medidor;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,medidor.id_medidor, medidor.numero 
FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente WHERE id_medidor=1;

INSERT INTO `medidor` (`id_medidor`, `numero`, `id_cliente`)VALUES (NULL,'4567','');

SELECT medidor.id_medidor,medidor.numero, 
categoria.id_categoria,categoria.descripcion FROM categoria JOIN medidor 
ON medidor.id_medidor = categoria.id_categoria;

SELECT modulo.id_modulo, modulo.descripcion
FROM modulo JOIN perfil_modulo ON perfil_modulo.id_modulo = modulo.id_modulo
JOIN perfil ON perfil.id_perfil = perfil_modulo.id_perfil
WHERE perfil_modulo.id_perfil = 1;

SELECT modulo.id_modulo, modulo.descripcion,modulo.directorio
FROM modulo JOIN perfil_modulo ON perfil_modulo.id_modulo = modulo.id_modulo 
JOIN perfil ON perfil.id_perfil = perfil_modulo.id_perfil
WHERE perfil_modulo.id_perfil = 1;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento,
persona.dni,persona.estado,persona.id_sexo, usuario.id_usuario, usuario.username, 
usuario.password,usuario.id_perfil 
FROM usuario JOIN persona ON persona.id_persona = usuario.id_persona;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,medidor.id_medidor,
medidor.numero,medidor.id_cliente, medidor.id_servicio, medidor.id_categoria 
FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,medidor.id_medidor,medidor.numero, 
medidor.id_cliente,medidor.id_servicio, medidor.id_categoria 
FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente WHERE id_medidor=1;

UPDATE medidor SET numero = '1111112',id_cliente = '6',id_servicio = ''id_categoria =''WHERE medidor.id_medidor= 1;
UPDATE `gestion_usuarios`.`medidor` SET `numero` = '2222' WHERE (`id_medidor` = '1');
UPDATE medidor SET numero = '1111112'WHERE medidor.id_medidor= 1;

SELECT medidor.id_medidor,medidor.numero,categoria.id_categoria,categoria.descripcion
FROM categoria JOIN medidor ON categoria.id_categoria = medidor.id_categoria
WHERE id_categoria = 1;

SELECT persona.id_persona, persona.nombre, persona.apellido,
persona.fecha_nacimiento, persona.id_sexo, cliente.id_cliente,
cliente.fecha_de_alta
FROM persona JOIN cliente ON persona.id_persona = cliente.id_persona 
WHERE id_cliente=1;

SELECT medidor.id_medidor,medidor.numero, categoria.id_categoria,
categoria.descripcion FROM categoria JOIN medidor 
ON medidor.id_categoria = categoria.id_categoria WHERE categoria.id_categoria=1;

SELECT medidor.id_medidor,medidor.numero, categoria.id_categoria,categoria.descripcion
FROM categoria JOIN medidor ON medidor.id_categoria = categoria.id_categoria WHERE categoria.id_categoria=1;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,medidor.id_medidor,medidor.numero, medidor.id_cliente,medidor.id_servicio,
 medidor.id_categoria FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente WHERE id_medidor=1;
 
 SELECT medidor.id_medidor,medidor.numero,tipo_servicio.id_servicio,tipo_servicio.descripcion,
 tipo_servicio.valor_metro_cubico FROM tipo_servicio JOIN medidor ON medidor.id_medidor = tipo_servicio.id_medidor;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,medidor.id_medidor,
medidor.numero,medidor.id_cliente, 
medidor.id_servicio, medidor.id_categoria FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente;

SELECT medidor.id_medidor,medidor.numero,tipo_servicio.id_servicio,tipo_servicio.descripcion,
tipo_servicio.valor_metro_cubico 
FROM tipo_servicio JOIN medidor ON medidor.id_medidor = tipo_servicio.id_servicio;

SELECT medidor.id_medidor,medidor.numero,tipo_servicio.id_servicio, tipo_servicio.descripcion,
tipo_servicio.valor_metro_cubico
FROM tipo_servicio JOIN medidor ON medidor.id_servicio = tipo_servicio.id_servicio WHERE tipo_servicio.id_servicio= 1;

SELECT medidor.id_medidor,medidor.numero,tipo_servicio.id_servicio, tipo_servicio.descripcion,
tipo_servicio.valor_metro_cubico 
FROM tipo_servicio  JOIN medidor ON medidor.id_servicio = tipo_servicio.id_servicio WHERE tipo_servicio.id_servicio= 1;

UPDATE tipo_servicio SET descripcion = 'agua potable' WHERE tipo_servicio.id_servicio =1;
UPDATE tipo_servicio SET descripcion = 'Agua potable', valor_metro_cubico= '517'WHERE tipo_servicio.id_servicio = 1;
UPDATE `gestion_usuarios`.`tipo_servicio` SET `valor_metro_cubico` = '120' WHERE (`id_servicio` = '2');
UPDATE `gestion_usuarios`.`tipo_servicio` SET `descripcion` = 'CLOACA', `valor_metro_cubico` = '111' WHERE (`id_servicio` = '2');

UPDATE tipo_servicio SET descripcion = 'Agua potable', valor_metro_cubico= '517'WHERE tipo_servicio.id_servicio = 1;
UPDATE tipo_servicio SET descripcion = 'Agua potable,', valor_metro_cubico= '517'WHERE tipo_servicio.id_servicio = 1;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento,persona.dni,
persona.estado,persona.id_sexo, usuario.id_usuario, usuario.username,usuario.id_perfil FROM usuario JOIN persona 
ON persona.id_persona = usuario.id_persona WHERE username = 'Alescano' and password = '12345' and persona.estado=1;

use gestion_usuarios;
SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento,persona.dni,
persona.estado,persona.id_sexo, usuario.id_usuario, usuario.username, usuario.password,usuario.id_perfil 
FROM usuario JOIN persona 
ON persona.id_persona = usuario.id_persona WHERE username = 'Erajoy' and password = '12345' and persona.estado=1;

SELECT medidor.id_medidor,medidor.numero,tipo_servicio.id_servicio, tipo_servicio.descripcion,
tipo_servicio.valor_metro_cubico 
FROM medidor JOIN tipo_servicio ON medidor.id_servicio = tipo_servicio.id_servicio;

select * from tipo_servicio;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento,persona.dni,
persona.estado, usuario.id_usuario, usuario.username, usuario.password,usuario.id_perfil 
FROM usuario JOIN persona ON persona.id_persona = usuario.id_persona WHERE username = 'Erajoy' and password = '12345' and persona.estado=1;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento, cliente.id_cliente, 
cliente.fecha_de_alta FROM persona JOIN cliente ON persona.id_persona = cliente.id_persona WHERE id_cliente= 1;

SELECT medidor.id_medidor,medidor.numero,categoria.id_categoria,categoria.descripcion FROM categoria 
JOIN medidor ON medidor.id_categoria = categoria.id_categoria WHERE categoria.id_categoria=1;

SELECT medidor.id_medidor,medidor.numero,tipo_servicio.id_servicio, tipo_servicio.descripcion,
tipo_servicio.valor_metro_cubico FROM tipo_servicio JOIN medidor ON medidor.id_medidor = tipo_servicio.id_servicio;

SELECT medidor.id_medidor,medidor.numero,tipo_servicio.id_servicio,tipo_servicio.descripcion,
tipo_servicio.valor_metro_cubico 
FROM tipo_servicio JOIN medidor ON medidor.id_servicio = tipo_servicio.id_servicio 
WHERE tipo_servicio.id_servicio= 1;

SELECT * FROM perfil WHERE id_perfil= id_perfil;

select *from tipo_servicio where id_servicio= id_servicio;
select * from categoria where id_categoria= id_categoria;

INSERT INTO `medidor` (`id_medidor`,`numero`, `id_cliente`)VALUES (NULL,'8888','');
INSERT INTO `medidor` (`id_medidor`, `numero`, `id_cliente`) VALUES ('3', '666', '3');
INSERT INTO `medidor` (`id_medidor`, `numero`, `id_cliente`)VALUES (NULL,'8888','');

INSERT INTO categoria (`id_categoria`, `descripcion`) VALUES (NULL, 'otra cat');

INSERT INTO usuario (`id_usuario`, `username`, `password`,`id_persona`, `id_perfil`) VALUES (NULL,'','','0','');

INSERT INTO `gestion_usuarios`.`modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES ('7', 'hgfdsa', 'fddd');
UPDATE `gestion_usuarios`.`modulo` SET `id_modulo` = '', `descripcion` = '', `directorio` = '' WHERE (`id_modulo` = '7');

select * from modulo;

SELECT modulo.id_modulo,modulo.descripcion,modulo.directorio FROM modulo
JOIN perfil_modulo ON perfil_modulo.id_modulo= modulo.id_modulo
JOIN perfil ON perfil.id_perfil = perfil_modulo.id_perfil
WHERE perfil_modulo.id_perfil = 4;

SELECT modulo.id_modulo,modulo.descripcion,modulo.directorio FROM modulo WHERE id_modulo=2;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento,
persona.dni,persona.estado,persona.id_sexo, usuario.id_usuario, usuario.username,usuario.password, 
usuario.id_perfil FROM usuario JOIN persona ON persona.id_persona = usuario.id_persona WHERE id_usuario=1;

INSERT INTO usuario (`id_usuario`, `username`, `password`,`id_persona`,`id_perfil`) VALUES (NULL,'','','0','');

INSERT INTO actvidad (`id_actividad`, `descripcion`) VALUES (NULL, 'yyyyyy');
INSERT INTO `tipo_vencimiento` (`id_tipo_vencimiento`, `descripcion`, `porcentaje`)VALUES (NULL,'','');

SELECT tipo_vencimiento.id_tipo_vencimiento,tipo_vencimiento.descripcion, 
tipo_vencimiento.porcentaje FROM tipo_vencimiento WHERE id_tipo_vencimiento = 2;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento, 
empleado.id_empleado, empleado.numero_legajo 
FROM empleado JOIN persona ON persona.id_persona = empleado.id_persona WHERE persona.estado = 1;

UPDATE tipo_vencimiento SET descripcion = '1er vencimiento', porcentaje = '0%' WHERE tipo_vencimiento.id_tipo_vencimiento = 1;

SELECT tipo_vencimiento.id_tipo_vencimiento,tipo_vencimiento.descripcion, 
tipo_vencimiento.porcentaje FROM tipo_vencimiento WHERE id_tipo_vencimiento = id_tipo_vencimiento;

SELECT persona_contacto.id_persona_contacto, persona_contacto.id_persona, persona_contacto.id_tipo_contacto, 
persona_contacto.valor, tipo_contacto.descripcion FROM persona_contacto
JOIN tipo_contacto ON tipo_contacto.id_tipo_contacto = 1;

SELECT persona_contacto.id_persona_contacto, persona_contacto.id_persona, persona_contacto.id_tipo_contacto, 
persona_contacto.valor, tipo_contacto.descripcion FROM persona_contacto INNER JOIN tipo_contacto 
ON tipo_contacto.id_tipo_contacto = persona_contacto.id_tipo_contacto INNER JOIN persona 
ON persona.id_persona = persona_contacto.id_persona WHERE persona.id_persona = 1;

DELETE FROM persona_contacto WHERE id_persona_contacto = 6;

SELECT persona.id_persona,persona.nombre,persona.apellido,persona.fecha_nacimiento,persona.id_sexo,persona.estado,cliente.id_cliente, cliente.fecha_de_alta FROM cliente JOIN persona ON persona.id_persona = cliente.id_persona WHERE cliente.id_persona=8;

SELECT * FROM domicilio WHERE id_persona = 1;

SELECT persona.id_persona,persona.nombre,persona.apellido,
persona.fecha_nacimiento,persona.id_sexo,persona.estado,cliente.id_cliente,
cliente.fecha_de_alta FROM cliente JOIN persona ON persona.id_persona = cliente.id_persona 
WHERE cliente.id_persona= id_cliente;


SELECT domicilio.id_domicilio,domicilio.calle,domicilio.altura,domicilio.manzana,domicilio.numero_casa,
domicilio.torre,domicilio.piso,domicilio.observaciones FROM domicilio WHERE id_domicilio=1;


SELECT domicilio.id_domicilio,domicilio.calle,domicilio.altura,domicilio.manzana,domicilio.numero_casa,domicilio.torre,domicilio.piso,domicilio.observaciones FROM domicilio WHERE id_domicilio=1;


SELECT persona_domicilio.id_persona_domicilio, persona_domicilio.id_persona, 
persona_domicilio.id_domicilio,domicilio.calle , domicilio.altura, domicilio.manzana , 
domicilio.numero_casa , domicilio.torre , domicilio.piso, domicilio.observaciones , 
domicilio.id_barrio FROM persona_domicilio 
INNER JOIN domicilio ON domicilio.id_domicilio = persona_domicilio.id_domicilio 
INNER JOIN persona ON persona.id_persona = persona_domicilio.id_persona WHERE persona.id_persona = 1;

SELECT persona_domicilio.id_persona_domicilio, persona_domicilio.id_persona, 
persona_domicilio.id_domicilio,domicilio.calle , domicilio.altura, domicilio.manzana , 
domicilio.numero_casa , domicilio.torre , domicilio.piso, domicilio.observaciones ,
 domicilio.id_barrio FROM persona_domicilio INNER JOIN domicilio 
ON domicilio.id_domicilio = persona_domicilio.id_domicilio 
INNER JOIN persona ON persona.id_persona = persona_domicilio.id_persona WHERE persona.id_persona = 1;

INSERT INTO usuario (`id_usuario`, `username`, `password`,`id_persona`) VALUES (NULL,'','','0');

SELECT persona_domicilio.id_persona_domicilio, persona_domicilio.id_persona, 
persona_domicilio.id_domicilio,domicilio.calle , domicilio.altura, domicilio.manzana , domicilio.numero_casa , 
domicilio.torre , domicilio.piso, domicilio.observaciones , domicilio.id_barrio FROM persona_domicilio
 INNER JOIN domicilio ON domicilio.id_domicilio = persona_domicilio.id_domicilio
 INNER JOIN persona ON persona.id_persona = persona_domicilio.id_persona WHERE id_persona_domicilio=1;
 
 SELECT medidor_domicilio.id_medidor_domicilio, medidor_domicilio.id_medidor, medidor_domicilio.id_domicilio,
 domicilio.calle , domicilio.altura, domicilio.manzana , domicilio.numero_casa , domicilio.torre , domicilio.piso,
 domicilio.observaciones , domicilio.id_barrio FROM medidor_domicilio INNER JOIN domicilio 
 ON domicilio.id_domicilio = medidor_domicilio.id_domicilio INNER JOIN medidor 
 ON medidor.id_medidor = medidor_domicilio.id_medidor WHERE id_medidor_domicilio= 1;
 
 SELECT medidor_domicilio.id_medidor_domicilio, medidor_domicilio.id_medidor, medidor_domicilio.id_domicilio,
 domicilio.calle , domicilio.altura, domicilio.manzana , 
 domicilio.numero_casa , domicilio.torre , domicilio.piso, domicilio.observaciones , domicilio.id_barrio 
 FROM medidor_domicilio INNER JOIN domicilio ON domicilio.id_domicilio = medidor_domicilio.id_domicilio 
 INNER JOIN medidor ON medidor.id_medidor = medidor_domicilio.id_medidor WHERE medidor.id_medidor = 2;
 
 SELECT medidor_domicilio.id_medidor_domicilio, medidor_domicilio.id_medidor, medidor_domicilio.id_domicilio,
 domicilio.calle , domicilio.altura, domicilio.manzana , domicilio.numero_casa , domicilio.torre , domicilio.piso, 
 domicilio.observaciones , domicilio.id_barrio FROM medidor_domicilio INNER JOIN domicilio 
 ON domicilio.id_domicilio = medidor_domicilio.id_domicilio INNER JOIN medidor 
 ON medidor.id_medidor = medidor_domicilio.id_medidor WHERE id_medidor_domicilio= 5;


SELECT factura.id_factura,factura.numero,factura.fecha_emision,factura.id_estado_pago,
factura.id_periodo,factura.id_medidor, tipo_servicio.descripcion,tipo_servicio.cargo_fijo
FROM factura INNER JOIN tipo_servicio ON tipo_servicio.id_servicio= factura.id_servicio; 

SELECT * FROM factura;

SELECT cliente.id_cliente,cliente.fecha_de_alta,cliente.id_persona,medidor.id_medidor,medidor.numero, 
medidor.id_cliente
 FROM medidor JOIN cliente ON cliente.id_cliente = medidor.id_cliente WHERE id_medidor= 1;
 
 SELECT periodo.id_periodo,periodo.fecha FROM periodo WHERE id_periodo = 1;
 
 SELECT registro_medidor.id_registro_medidor,registro_medidor.fecha, 
 registro_medidor.lectura_actual,registro_medidor.consumo,registro_medidor.id_medidor,
 registro_medidor.id_empleado 
 FROM registro_medidor WHERE id_registro_medidor=1;
 
INSERT INTO registro_medidor (`id_registro_medidor`, `fecha`,`lectura_actual`,`consumo`,`id_medidor`,`id_empleado`) VALUES (NULL, '2021-10-14','444','22', '', '');

SELECT factura.id_factura,factura.numero,factura.fecha_emision,factura.id_estado_pago,
factura.id_periodo,factura.id_medidor,factura.canon,factura.iva,factura.1er_vencimiento,
factura.2do_vencimiento,factura.id_registro_medidor,tipo_servicio.id_servicio, tipo_servicio.descripcion FROM factura
INNER JOIN tipo_servicio ON tipo_servicio.id_servicio = 1;

INSERT INTO registro_medidor (`id_registro_medidor`, `fecha`,`lectura_actual`,`consumo`,`id_medidor`,`id_empleado`) VALUES (NULL, '0011-11-11','44141','44', '1', '5');

UPDATE medidor SET numero = '999', id_cliente = '1', id_categoria = '2'WHERE medidor.id_medidor= 1;

UPDATE medidor SET numero = '999', id_cliente = '', id_categoria = '' WHERE medidor.id_medidor= 1;

SELECT factura.id_factura,factura.numero,factura.fecha_emision,factura.1er_vencimiento, factura.2do_vencimiento,factura.canon,factura.iva,factura.id_estado_pago, factura.id_periodo,factura.id_medidor,factura.id_registro_medidor FROM factura WHERE id_factura=1;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento, persona.id_sexo,
cliente.id_cliente, cliente.fecha_de_alta
FROM persona JOIN cliente ON persona.id_cliente =1,
cliente.id_persona WHERE id_cliente=1;

INSERT INTO usuario (`id_usuario`, `username`, `password`,`id_persona`) VALUES (NULL,'Jlescano','12345','29');

INSERT INTO usuario (`id_usuario`, `username`, `password`, `id_perfil`, `id_persona`) VALUES ('6', 'Jlezcano', '12345', '1', '2');
INSERT INTO usuario (`id_usuario`, `username`, `password`,`id_perfil`,`id_persona`) VALUES (NULL,'Plopez','12345','2','33');
INSERT INTO cliente (`id_cliente`, `fecha_de_alta`, `id_sexo`,`id_persona`)VALUES (NULL,'','1',39);

INSERT INTO cliente (`id_cliente`,`fecha_de_alta`,`id_persona`)VALUES (NULL,'',42);
INSERT INTO cliente (`id_cliente`, `fecha_de_alta`,`id_persona`)VALUES (NULL,'',43);

INSERT INTO cliente (`id_cliente`,`id_persona`)VALUES (NULL,44);

SELECT persona.id_persona, persona.nombre,persona.apellido,persona.fecha_nacimiento, persona.dni,persona.estado FROM persona INNER JOIN usuario ON usuario.id_usuario = persona.id_persona WHERE persona.id_persona = 10;
SELECT persona.id_persona, persona.nombre,persona.apellido, persona.fecha_nacimiento, persona.dni,persona.estado FROM persona INNER JOIN usuario ON usuario.id_usuario = persona.id_persona WHERE persona.id_persona = 7;

SELECT persona.id_persona, persona.nombre,persona.apellido, persona.fecha_nacimiento, persona.dni,persona.estado FROM persona INNER JOIN usuario ON usuario.id_usuario = persona.id_persona WHERE usuario.id_persona = 10;

SELECT * FROM usuario WHERE usuario.id_persona = 10;

SELECT * FROM factura WHERE factura.id_persona = 1;

SELECT persona.id_persona, persona.nombre, persona.apellido,persona.fecha_nacimiento,
persona.dni,persona.estado,persona.id_sexo, 
usuario.id_usuario, usuario.username,usuario.password,usuario.id_perfil
FROM usuario JOIN persona ON persona.id_persona = usuario.id_persona
WHERE id_usuario= 7;



SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento,persona.dni,persona.estado,persona.id_sexo, usuario.id_usuario, usuario.username,usuario.password FROM usuario JOIN persona ON persona.id_persona = usuario.id_persona WHERE id_usuario=35;

SELECT persona.id_persona, persona.nombre, persona.apellido, persona.fecha_nacimiento,persona.dni,persona.estado,persona.id_sexo, usuario.id_usuario, usuario.username,usuario.password,usuario.id_perfil FROM usuario JOIN persona ON persona.id_persona = usuario.id_persona WHERE id_usuario=35;

SELECT factura.id_factura,factura.numero,factura.fecha_emision,factura.id_estado_pago, factura.id_periodo,factura.id_medidor,factura.canon,factura.iva, factura.primer_vencimiento,factura.segundo_vencimiento,factura.id_registro_medidor, tipo_servicio.id_servicio, tipo_servicio.descripcion FROM factura INNER JOIN tipo_servicio ON tipo_servicio.id_servicio = 1;

SELECT medidor_domicilio.id_medidor_domicilio, medidor_domicilio.id_medidor, medidor_domicilio.id_domicilio,
domicilio.calle ,  domicilio.altura, domicilio.manzana , domicilio.numero_casa , domicilio.torre ,
domicilio.piso, domicilio.observaciones , domicilio.id_barrio FROM medidor_domicilio
INNER JOIN domicilio ON domicilio.id_domicilio = medidor_domicilio.id_domicilio
INNER JOIN medidor ON medidor.id_medidor = medidor_domicilio.id_medidor
WHERE medidor.id_medidor = 1;

SELECT * FROM provincia WHERE id_provincia=1;

select * from factura where id_factura= 3;
select * from medidor where id_medidor= 31;