CREATE DATABASE gestion_academica CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_general_ci;

USE gestion_academica;

-- Tabla de asignaturas
CREATE TABLE
    asignaturas (
        id_asignatura INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        equivalencia_ects INT,
        codigo INT,
        horas INT
    );

-- Tabla de resultados de aprendizaje (RA)
CREATE TABLE
    resultados_aprendizaje (
        id_resultado_aprendizaje INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(500) NOT NULL,
        codigo INT NOT NULL,
        id_asignatura INT NOT NULL,
        FOREIGN KEY (id_asignatura) REFERENCES asignaturas (id_asignatura) ON DELETE CASCADE
    );

-- Tabla de criterios de evaluación
CREATE TABLE
    criterios_evaluacion (
        id_criterio INT AUTO_INCREMENT PRIMARY KEY,
        id_resultado_aprendizaje INT NOT NULL,
        descripcion VARCHAR(500) NOT NULL,
        orden INT NOT NULL,
        FOREIGN KEY (id_resultado_aprendizaje) REFERENCES resultados_aprendizaje (id_resultado_aprendizaje) ON DELETE CASCADE,
        UNIQUE (id_resultado_aprendizaje, orden)
    );


-- Insertar la asignatura
INSERT INTO asignaturas (nombre, equivalencia_ects, codigo, horas)
VALUES ('Desarrollo Web en Entorno Cliente', 9, 612, 180);

-- Insertar los resultados de aprendizaje
INSERT INTO resultados_aprendizaje (nombre, codigo, id_asignatura)
VALUES 
('Selecciona las arquitecturas y tecnologías de programación sobre clientes Web, identificando y analizando las capacidades y características de cada una.', 1, 1),
('Escribe sentencias simples, aplicando la sintaxis del lenguaje y verificando su ejecución sobre navegadores Web.', 2, 1);

-- Insertar los criterios de evaluación para el primer resultado de aprendizaje (RA1)
INSERT INTO criterios_evaluacion (id_resultado_aprendizaje, descripcion, orden)
VALUES 
(1, 'Se han caracterizado y diferenciado los modelos de ejecución de código en el servidor y en el cliente Web.', 1),
(1, 'Se han identificado las capacidades y mecanismos de ejecución de código de los navegadores Web.', 2),
(1, 'Se han identificado y caracterizado los principales lenguajes relacionados con la programación de clientes Web.', 3),
(1, 'Se han reconocido las particularidades de la programación de guiones y sus ventajas y desventajas sobre la programación tradicional.', 4),
(1, 'Se han verificado los mecanismos de integración de los lenguajes de marcas con los lenguajes de programación de clientes Web.', 5),
(1, 'Se han reconocido y evaluado las herramientas de programación sobre clientes Web.', 6);

-- Insertar los criterios de evaluación para el segundo resultado de aprendizaje (RA2)
INSERT INTO criterios_evaluacion (id_resultado_aprendizaje, descripcion, orden)
VALUES 
(2, 'Se ha seleccionado un lenguaje de programación de clientes Web en función de sus posibilidades.', 1),
(2, 'Se han utilizado los distintos tipos de variables y operadores disponibles en el lenguaje.', 2),
(2, 'Se han identificado los ámbitos de utilización de las variables.', 3),
(2, 'Se han reconocido y comprobado las peculiaridades del lenguaje respecto a las conversiones entre distintos tipos de datos.', 4),
(2, 'Se han añadido comentarios al código.', 5),
(2, 'Se han utilizado mecanismos de decisión en la creación de bloques de sentencias.', 6),
(2, 'Se han utilizado bucles y se ha verificado su funcionamiento.', 7),
(2, 'Se han utilizado herramientas y entornos para facilitar la programación, prueba y depuración del código.', 8);
