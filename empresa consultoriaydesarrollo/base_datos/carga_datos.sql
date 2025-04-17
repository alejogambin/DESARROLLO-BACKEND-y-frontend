--carga de datos--
-- Datos para la tabla `Nosotros`
INSERT INTO `Nosotros` (`Mision`, `Vision`)
VALUES
('Proveer soluciones tecnológicas innovadoras que impulsen el éxito de nuestros clientes.', 
 'Ser líderes en el desarrollo de software personalizado a nivel global.');

-- Datos para la tabla `Servicios`
INSERT INTO `Servicios` (`Nombre`, `Costo`, `Duracion`, `Tipo`)
VALUES
('Desarrollo de Software a Medida', 5000, 30, 1),
('Consultoría en Transformación Digital', 3000, 15, 2),
('Automatización de Procesos', 4000, 20, 3),
('Ciberseguridad y Protección de Datos', 6000, 25, 4),
('Marketing Digital', 2000, 10, 5);

-- Datos para la tabla `Ciudades`
INSERT INTO `Ciudades` (`nombre`)
VALUES
('Ciudad de México'),
('Bogotá'),
('Buenos Aires'),
('Santiago'),
('Lima');

-- Datos para la tabla `ServiciosCiudades`
INSERT INTO `ServiciosCiudades` (`idServicio`, `idCiudad`)
VALUES
(1, 1), -- Desarrollo de Software a Medida en Ciudad de México
(1, 2), -- Desarrollo de Software a Medida en Bogotá
(2, 3), -- Consultoría en Transformación Digital en Buenos Aires
(3, 4), -- Automatización de Procesos en Santiago
(4, 5), -- Ciberseguridad y Protección de Datos en Lima
(5, 1), -- Marketing Digital en Ciudad de México
(5, 3); -- Marketing Digital en Buenos Aires