CREATE DATABASE dgsl_93_swiftcode;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(50) NOT NULL UNIQUE,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    apellido_2 VARCHAR(50),
    telefono VARCHAR(20) NOT NULL,
    telefono_secundario VARCHAR(20),
    empresa VARCHAR(150),
    correo_empresa VARCHAR(50),
    cuenta TINYINT(1) NOT NULL DEFAULT 2,
    estado TINYINT(1) NOT NULL DEFAULT 2,
    creado DATETIME NOT NULL
);

CREATE TABLE urls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    servicio VARCHAR(20) NOT NULL,
    url_unica VARCHAR(255) NOT NULL,
    consumido BOOLEAN NOT NULL DEFAULT 0,
    descripcion VARCHAR(255) NOT NULL,
    fecha DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE transacciones_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    tipo_evento VARCHAR(100) NOT NULL,
    fecha DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarioS(id) ON DELETE SET NULL
);