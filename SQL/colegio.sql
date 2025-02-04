-- Creación de la base de datos
CREATE DATABASE colegio;
USE colegio;

-- Tabla de Asignaturas
CREATE TABLE asignaturas (
    id_asignatura INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Resultados de Aprendizaje (RA)
CREATE TABLE resultados_aprendizaje (
    id_ra INT AUTO_INCREMENT PRIMARY KEY,
    id_asignatura INT NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_asignatura) REFERENCES asignaturas(id_asignatura) ON DELETE CASCADE
);

-- Tabla de Criterios de Evaluación
CREATE TABLE criterios_evaluacion (
    id_criterio INT AUTO_INCREMENT PRIMARY KEY,
    id_ra INT NOT NULL,
    descripcion TEXT NOT NULL,
    peso FLOAT CHECK (peso >= 0 AND peso <= 100), -- Representa el porcentaje de este criterio
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_ra) REFERENCES resultados_aprendizaje(id_ra) ON DELETE CASCADE
);

-- Datos iniciales (opcional)
INSERT INTO asignaturas (nombre, descripcion) VALUES 
('Matemáticas', 'Asignatura que cubre álgebra y geometría básica.'),
('Historia', 'Estudio de eventos históricos y sus impactos en la sociedad.');

INSERT INTO resultados_aprendizaje (id_asignatura, descripcion) VALUES 
(1, 'Comprender los fundamentos del álgebra lineal'),
(1, 'Resolver ecuaciones cuadráticas'),
(2, 'Entender las causas de la Revolución Francesa');

INSERT INTO criterios_evaluacion (id_ra, descripcion, peso) VALUES 
(1, 'Resolver correctamente 3 ejercicios básicos', 40),
(1, 'Explicar conceptos fundamentales del álgebra', 60),
(2, 'Interpretar resultados y simplificar expresiones', 50),
(3, 'Realizar un ensayo sobre la Revolución Francesa', 100);