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


INSERT INTO asignaturas (id_asignatura, nombre, equivalencia_ects, codigo, horas)
VALUES 
(1, 'Sistemas informáticos', 10, 483, 192),
(2, 'Bases de Datos', 12, 484, 192),
(3, 'Programación', 14, 485, 256);

INSERT INTO resultados_aprendizaje (id_asignatura, id_resultado_aprendizaje, nombre, codigo)
VALUES 
(1, 1, 'Evalúa sistemas informáticos identificando sus componentes y características.', 1),
(1, 2, 'Instala sistemas operativos planificando el proceso e interpretando documentación técnica.', 2),
(2, 3, 'Reconoce los elementos de las bases de datos analizando sus funciones y valorando la utilidad de los sistemas gestores.', 1),
(2, 4, 'Crea bases de datos definiendo su estructura y las características de sus elementos según el modelo relacional.', 2),
(3, 5, 'Reconoce la estructura de un programa informático, identificando y relacionando los elementos propios del lenguaje de programación utilizado.', 1),
(3, 6, 'Escribe y prueba programas sencillos, reconociendo y aplicando los fundamentos de la programación orientada a objetos.', 2);


INSERT INTO criterios_evaluacion (id_resultado_aprendizaje, id_criterio, descripcion, orden)
VALUES 
(1, 1, 'Se han reconocido los componentes físicos de un sistema informático y sus mecanismos de interconexión.', 1),
(1, 2, 'Se ha verificado el proceso de puesta en marcha de un equipo.', 2),
(1, 3, 'Se han clasificado, instalado y configurado diferentes tipos de dispositivos periféricos.', 3),
(1, 4, 'Se han identificado los tipos de redes y sistemas de comunicación.', 4),
(1, 5, 'Se han identificado los componentes de una red informática.', 5),
(1, 6, 'Se han interpretado mapas físicos y lógicos de una red informática.', 6),
(1, 7, 'Se han operado las máquinas respetando las normas de seguridad y recomendaciones de ergonomía.', 7),
(2, 8, 'Se han identificado los elementos funcionales de un sistema informático.', 1),
(2, 9, 'Se han analizado las características, funciones y arquitectura de un sistema operativo.', 2),
(2, 10, 'Se han comparado sistemas operativos en base a sus requisitos, características, campos de aplicación y licencias de uso.', 3),
(2, 11, 'Se han instalado diferentes sistemas operativos.', 4),
(2, 12, 'Se han aplicado técnicas de actualización y recuperación del sistema.', 5),
(2, 13, 'Se han utilizado maquinas virtuales para instalar y probar sistemas operativos.', 6),
(2, 14, 'Se han documentado los procesos realizados.', 7),
(3, 15, 'Se han analizado los sistemas lógicos de almacenamiento y sus características.', 1),
(3, 16, 'Se han identificado los distintos tipos de bases de datos según el modelo de datos utilizado.', 2),
(3, 17, 'Se han identificado los distintos tipos de bases de datos en función de la ubicación de la información.', 3),
(3, 18, 'Se ha evaluado la utilidad de un sistema gestor de bases de datos.', 4),
(3, 19, 'Se han clasificado los sistemas gestores de bases de datos.', 5),
(3, 20, 'Se ha reconocido la función de cada uno de los elementos de un sistema gestor de bases de datos.', 6),
(3, 21, 'Se ha reconocido la utilidad de las bases de datos distribuidas.', 7),
(3, 22, 'Se han analizado las políticas de fragmentación de la información.', 8),
(4, 23, 'Se ha analizado el formato de almacenamiento de la información.', 1),
(4, 24, 'Se han creado las tablas y las relaciones entre ellas.', 2),
(4, 25, 'Se han seleccionado los tipos de datos adecuados.', 3),
(4, 26, 'Se han definido los campos clave en las tablas.', 4),
(4, 27, 'Se han implantado las restricciones reflejadas en el diseño lógico.', 5),
(4, 28, 'Se han creado vistas.', 6),
(4, 29, 'Se han creado los usuarios y se les han asignado privilegios.', 7),
(4, 30, 'Se han utilizando asistentes, herramientas gráficas y los lenguajes de definición y control de datos.', 8),
(5, 31, 'Se han identificado los bloques que componen la estructura de un programa informático.', 1),
(5, 32, 'Se han creado proyectos de desarrollo de aplicaciones.', 2),
(5, 33, 'Se han utilizado entornos integrados de desarrollo.', 3),
(5, 34, 'Se han identificado los distintos tipos de variables y la utilidad específica de cada uno.', 4),
(5, 35, 'Se ha modificado el código de un programa para crear y utilizar variables.', 5),
(5, 36, 'Se han creado y utilizado constantes y literales.', 6),
(5, 37, 'Se han clasificado, reconocido y utilizado en expresiones los operadores del lenguaje.', 7),
(5, 38, 'Se han clasificado, reconocido y utilizado en expresiones los operadores del lenguaje.', 8),
(5, 39, 'Se han introducido comentarios en el código.', 9),
(6, 40, 'Se han identificado los fundamentos de la programación orientada a objetos.', 1),
(6, 41, 'Se han escrito programas simples.', 2),
(6, 42, 'Se han instanciado objetos a partir de clases predefinidas.', 3),
(6, 43, 'Se han utilizado métodos y propiedades de los objetos.', 4),
(6, 44, 'Se han escrito llamadas a métodos estáticos.', 5),
(6, 45, 'Se han utilizado parámetros en la llamada a métodos.', 6),
(6, 46, 'Se han incorporado y utilizado librerías de objetos.', 7),
(6, 47, 'Se han utilizado constructores.', 8),
(6, 48, 'Se ha utilizado el entorno integrado de desarrollo en la creación y compilación de programas simples.', 9);