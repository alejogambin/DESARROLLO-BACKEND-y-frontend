-- eliminar tablas si existen
DROP TABLE IF EXISTS `ServiciosCiudades`;
DROP TABLE IF EXISTS `Nosotros`;
DROP TABLE IF EXISTS `Servicios`;
DROP TABLE IF EXISTS `Ciudades`;
----- crear tablas
CREATE TABLE `Nosotros`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Mision` VARCHAR(255) NOT NULL,
    `Vision` VARCHAR(255) NOT NULL
);
CREATE TABLE `Servicios`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Nombre` VARCHAR(255) NOT NULL,
    `Costo` BIGINT NOT NULL,
    `Duracion` BIGINT NOT NULL,
    `Tipo` BIGINT NOT NULL
);
CREATE TABLE `Ciudades`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL
);
CREATE TABLE `ServiciosCiudades`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idServicio` BIGINT UNSIGNED NOT NULL,
    `idCiudad` BIGINT UNSIGNED NOT NULL
);
-- añadir claves foraneas
ALTER TABLE
    `ServiciosCiudades` ADD CONSTRAINT `serviciosciudades_idservicio_foreign` FOREIGN KEY(`idServicio`) REFERENCES `Servicios`(`id`) on delete cascade;
ALTER TABLE
    `ServiciosCiudades` ADD CONSTRAINT `serviciosciudades_idciudad_foreign` FOREIGN KEY(`idCiudad`) REFERENCES `Ciudades`(`id`) on delete cascade;