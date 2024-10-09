CREATE DATABASE swiftcode
    DEFAULT CHARACTER SET utf8;

USE swiftcode;

-- Principal.
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(50) NOT NULL UNIQUE,
    alias VARCHAR(25) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido_1 VARCHAR(50) NOT NULL,
    apellido_2 VARCHAR(50) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    telefono_empresa VARCHAR(20),
    empresa VARCHAR(150),
    correo_empresa VARCHAR(50),
    rol TINYINT(1) NOT NULL DEFAULT 2,
    estado TINYINT(1) NOT NULL DEFAULT 2,
    creado DATETIME NOT NULL,
    modificado DATETIME NOT NULL
);

-- Secundarias.
CREATE TABLE blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    alias VARCHAR(25) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT CHARACTER SET utf8 NOT NULL,
    enlace VARCHAR(255) NOT NULL,
    referencias VARCHAR(255) NOT NULL,
    creado DATETIME NOT NULL,
    modificado DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE enlaces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    alias VARCHAR(25) NOT NULL,
    consumido BOOLEAN NOT NULL DEFAULT 0,
    servicio TINYINT(1) NOT NULL,
    enlace VARCHAR(255) NOT NULL,
    descripcion TEXT CHARACTER SET utf8 NOT NULL,
    vence DATETIME NOT NULL,
    creado DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE formalizaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    alias VARCHAR(25) NOT NULL,
    proyecto VARCHAR(150) NOT NULL,
    descripcion TEXT CHARACTER SET utf8 NOT NULL,
    estado TINYINT(1) NOT NULL,
    fecha_inicio DATETIME,
    fecha_fin DATETIME,
    creado DATETIME NOT NULL,
    modificado DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    alias VARCHAR(25) NOT NULL,
    proyecto VARCHAR(255) NOT NULL,
    descripcion TEXT CHARACTER SET utf8 NOT NULL,
    estado TINYINT(1) NOT NULL,
    fecha_inicio DATETIME NOT NULL,
    fecha_revision DATETIME NOT NULL,
    fecha_fin DATETIME NOT NULL,
    saldo VARCHAR(50) NOT NULL,
    importe VARCHAR(50) NOT NULL,
    anticipo VARCHAR(50) NOT NULL,
    formalizado DATETIME NOT NULL,
    creado DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE soporte (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    alias VARCHAR(25) NOT NULL,
    estado TINYINT(1) NOT NULL,
    asunto VARCHAR(255) NOT NULL,
    proyecto INT,
    contenido TEXT CHARACTER SET utf8 NOT NULL,
    archivo VARCHAR(255) NOT NULL,
    creado DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_entrada INT,
    alias VARCHAR(25) NOT NULL,
    contenido TEXT CHARACTER SET utf8 NOT NULL,
    estado TINYINT(1) NOT NULL DEFAULT 2,
    creado DATETIME NOT NULL,
    modificado DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (id_entrada) REFERENCES blog(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- Dependencias
CREATE TABLE asistente_formalizacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_formalizaciones INT,
    alias VARCHAR(25) NOT NULL,
    importe VARCHAR(50) NOT NULL,
    anticipo VARCHAR(50) NOT NULL,
    fecha_entrevista DATETIME NOT NULL,
    creado DATETIME NOT NULL,
    FOREIGN KEY (id_formalizaciones) REFERENCES formalizaciones(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE mensajes_soporte (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_soporte INT,
    alias VARCHAR(25) NOT NULL,
    contenido TEXT CHARACTER SET utf8 NOT NULL,
    archivo VARCHAR(255),
    FOREIGN KEY (id_soporte) REFERENCES soporte(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- Registros.
CREATE TABLE transacciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_referencia INT NOT NULL,
    tabla VARCHAR(75) NOT NULL,
    alias VARCHAR(25) NOT NULL,
    evento VARCHAR(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT CHARACTER SET utf8 NOT NULL,
    estado TINYINT(1) NOT NULL,
    fecha DATETIME NOT NULL
);
