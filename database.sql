CREATE TABLE USUARIOS (
    ID_USUARIO SERIAL PRIMARY KEY,
    NOMBRE_USUARIO VARCHAR(100),
    CORREO_ELECTRONICO VARCHAR(100),
    CONTRASENA VARCHAR(100),
    ROL VARCHAR(50)
);

CREATE TABLE SOLICITUD_COMPRA (
    CONSECUTIVO SERIAL PRIMARY KEY,
    USUARIO_ID INTEGER,
    RESPONSABLE VARCHAR(100),
    AUTORIZACION_JEFE BOOLEAN,
    AUTORIZACION_DIRECTOR BOOLEAN,
    CENTRO_COSTOS VARCHAR(100),
    FECHA DATE,
    NOMBRE_RESPONSABLE VARCHAR(100),
    FECHA_RESPONSABLE DATE,
    RUBRO_PRESUPUESTAL VARCHAR(100),
    AREA VARCHAR(100),
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS (ID_USUARIO)
);

CREATE TABLE ITEM (
    CODIGO_ITEM SERIAL PRIMARY KEY,
    PROVEEDOR VARCHAR(100),
    NOMBRE VARCHAR(100),
    UNIDAD_MEDIDA VARCHAR(50),
    VALOR_UNIDAD_MEDIDA FLOAT,
    CARACTER_ITEM VARCHAR(100),
    PRECIO FLOAT,
    CATEGORIA VARCHAR(100),
    COSTO FLOAT
);

CREATE TABLE DETALLE_SOLICITUD_COMPRA (
    SOLICITUD_COMPRA_ID INTEGER,
    ITEM_ID INTEGER,
    CANTIDAD_SOLICITADA INTEGER,
    UNIDAD_MEDIDA VARCHAR(50),
    VALOR_UNITARIO FLOAT,
    TOTAL FLOAT,
    PRIMARY KEY (SOLICITUD_COMPRA_ID, ITEM_ID),
    FOREIGN KEY (SOLICITUD_COMPRA_ID) REFERENCES SOLICITUD_COMPRA (CONSECUTIVO),
    FOREIGN KEY (ITEM_ID) REFERENCES ITEM (CODIGO_ITEM)
);

CREATE TABLE SOLICITUD_COTIZACION (
    CODIGO_COTIZACION SERIAL PRIMARY KEY,
    SOLICITUD_COMPRA_ID INTEGER,
    USUARIO_ID INTEGER,
    AUTORIZACION_DIRECTOR BOOLEAN,
    PROVEEDOR VARCHAR(100),
    AREA VARCHAR(100),
    FOREIGN KEY (SOLICITUD_COMPRA_ID) REFERENCES SOLICITUD_COMPRA (CONSECUTIVO),
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS (ID_USUARIO)
);

CREATE TABLE ORDEN_CONTRA_ACTUAL (
    CODIGO_ORDEN SERIAL PRIMARY KEY,
    SOLICITUD_COTIZACION_ID INTEGER,
    NIT_PROVEEDOR VARCHAR(100),
    PROVEEDOR VARCHAR(100),
    FECHA_ORDEN DATE,
    MONTO_TOTAL FLOAT,
    FECHA_ENTREGA DATE,
    AREA VARCHAR(100),
    FOREIGN KEY (SOLICITUD_COTIZACION_ID) REFERENCES SOLICITUD_COTIZACION (CODIGO_COTIZACION)
);

CREATE TABLE DETALLE_ORDEN (
    ORDEN_ID INTEGER,
    ITEM_ID INTEGER,
    NOMBRE VARCHAR(100),
    CANTIDAD_SOLICITADA INTEGER,
    CANTIDAD_DESPACHADA INTEGER,
    UNIDAD_MEDIDA VARCHAR(50),
    VALOR_UNITARIO FLOAT,
    VALOR_TOTAL FLOAT,
    PRIMARY KEY (ORDEN_ID, ITEM_ID),
    FOREIGN KEY (ORDEN_ID) REFERENCES ORDEN_CONTRA_ACTUAL (CODIGO_ORDEN),
    FOREIGN KEY (ITEM_ID) REFERENCES ITEM (CODIGO_ITEM)
);

CREATE TABLE ENTRADA_ALMACEN (
    CODIGO_ENTRADA SERIAL PRIMARY KEY,
    ORDEN_ID INTEGER,
    USUARIO_ID INTEGER,
    FECHA DATE,
    NUMERO_FACTURA VARCHAR(100),
    PROVEEDOR VARCHAR(100),
    TOTAL_BIENES INTEGER,
    VALOR_TOTAL FLOAT,
    FOREIGN KEY (ORDEN_ID) REFERENCES ORDEN_CONTRA_ACTUAL (CODIGO_ORDEN),
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS (ID_USUARIO)
);

CREATE TABLE DETALLE_ENTRADA_ALMACEN (
    ENTRADA_ID INTEGER,
    ITEM_ID INTEGER,
    CANTIDAD_ENTREGADA INTEGER,
    PRIMARY KEY (ENTRADA_ID, ITEM_ID),
    FOREIGN KEY (ENTRADA_ID) REFERENCES ENTRADA_ALMACEN (CODIGO_ENTRADA),
    FOREIGN KEY (ITEM_ID) REFERENCES ITEM (CODIGO_ITEM)
);

CREATE TABLE SALIDA_ALMACEN (
    CODIGO_SALIDA SERIAL PRIMARY KEY,
    USUARIO_ID INTEGER,
    EMPLEADO_RESPONSABLE VARCHAR(100),
    FECHA_SALIDA DATE,
    FECHA_ENTREGA DATE,
    AREA VARCHAR(100),
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS (ID_USUARIO)
);

CREATE TABLE DETALLE_SALIDA_ALMACEN (
    SALIDA_ID INTEGER,
    ITEM_ID INTEGER,
    CANTIDAD_ENTREGADA INTEGER,
    PRIMARY KEY (SALIDA_ID, ITEM_ID),
    FOREIGN KEY (SALIDA_ID) REFERENCES SALIDA_ALMACEN (CODIGO_SALIDA),
    FOREIGN KEY (ITEM_ID) REFERENCES ITEM (CODIGO_ITEM)
);

CREATE TABLE UBICACION_BIENES (
    ITEM_ID INTEGER,
    USUARIO_ID INTEGER,
    RESPONSABLE VARCHAR(100),
    FECHA_ENTREGA DATE,
    DIRECCION_BIEN VARCHAR(200),
    AREA VARCHAR(100),
    PRIMARY KEY (ITEM_ID, USUARIO_ID),
    FOREIGN KEY (ITEM_ID) REFERENCES ITEM (CODIGO_ITEM),
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS (ID_USUARIO)
);

CREATE TABLE DEVOLUCIONES (
    ITEM_ID INTEGER,
    USUARIO_ID INTEGER,
    CANTIDAD INTEGER,
    RAZON VARCHAR(200),
    FECHA DATE,
    AREA VARCHAR(100),
    PRIMARY KEY (ITEM_ID, USUARIO_ID),
    FOREIGN KEY (ITEM_ID) REFERENCES ITEM (CODIGO_ITEM),
    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS (ID_USUARIO)
);
