CREATE DATABASE IF NOT EXISTS videoclub;

CREATE TABLE IF NOT EXISTS peliculas(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titulo VARCHAR NOT NULL,
    director VARCHAR NOT NULL,
    anio YEAR NOT NULL,
    genero VARCHAR NOT NULL,
    duracion INT NOT NULL
);

INSERT INTO peliculas (id,titulo,director,anio,genero,duracion)
VALUES
    (),
    (),
    (),
    (),
    ()
;
