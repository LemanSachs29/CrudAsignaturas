-- Crear la base de datos con especificación de codificación
CREATE DATABASE gestion_academica CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE gestion_academica;

-- Tabla de asignaturas
CREATE TABLE asignaturas (
    id_asignatura INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

-- Tabla de resultados de aprendizaje (RA)
CREATE TABLE resultados_aprendizaje (
    id_resultado_aprendizaje INT AUTO_INCREMENT PRIMARY KEY,
    id_asignatura INT NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_asignatura) REFERENCES asignaturas(id_asignatura) ON DELETE CASCADE
);

-- Tabla de criterios de evaluación
CREATE TABLE criterios_evaluacion (
    id_criterio INT AUTO_INCREMENT PRIMARY KEY,
    id_resultado_aprendizaje INT NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_resultado_aprendizaje) REFERENCES resultados_aprendizaje(id_resultado_aprendizaje) ON DELETE CASCADE
);

-- Inserción de datos iniciales de prueba
INSERT INTO asignaturas (nombre, descripcion) VALUES 
('Matemáticas', 'Asignatura de cálculo y álgebra'),
('Lengua Española', 'Asignatura de gramática y literatura');

INSERT INTO resultados_aprendizaje (id_asignatura, descripcion) VALUES 
(1, 'Resolver ecuaciones lineales'),
(1, 'Aplicar derivadas en problemas de optimización'),
(2, 'Redactar textos argumentativos');

INSERT INTO criterios_evaluacion (id_resultado_aprendizaje, descripcion) VALUES 
(1, 'Ecuaciones correctamente planteadas'),
(2, 'Resolución de problemas sin errores algebraicos'),
(3, 'Estructura coherente y argumentación sólida');
