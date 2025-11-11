-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2025 a las 22:59:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca_coronel_pringles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `autor` varchar(40) NOT NULL,
  `editorial` varchar(40) NOT NULL,
  `anio_publicacion` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `editorial`, `anio_publicacion`, `stock`) VALUES
(11, 'El Alquimista', 'Paulo Coelho', 'HarperCollins', 1988, 30),
(12, 'a', 'b', 'Editorial Sudamericana', 1997, 50),
(13, '1984', 'George Orwell', 'Secker & Warburg', 1949, 40),
(14, 'Orgullo y Prejuicio', 'Jane Austen', 'T. Egerton', 1813, 25),
(15, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Francisco de Robles', 1605, 15),
(16, 'b', 'a', 'Bloomsbury', 1997, 100),
(17, 'La Sombra del Viento', 'Carlos Ruiz Zafon', 'Planeta', 2001, 35),
(18, 'El Codigo Da Vinci', 'Dan Brown', 'Doubleday', 2003, 60),
(19, 'Los Pilares de la Tierra', 'Ken Follett', 'Ken Follett', 1989, 45),
(20, 'Matar a un Ruisenior', 'Harper Lee', 'J.B. Lippincott & Co.', 1960, 55),
(21, 'percy jackson y el ladrón del rayo', 'Rick Riordan', 'Miramaxbooks', 2005, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `multa` tinyint(1) DEFAULT NULL,
  `cantidad_libros` int(11) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `id_socios` int(11) DEFAULT NULL,
  `id_libro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `fecha_prestamo`, `fecha_devolucion`, `multa`, `cantidad_libros`, `estado`, `id_socios`, `id_libro`) VALUES
(6, '2025-09-06', '2025-09-20', 0, 2, 'devuelto', 16, 16),
(7, '2025-09-07', '2025-09-21', 0, 1, 'devuelto', 17, 17),
(8, '2025-09-08', '2025-09-22', 0, 3, 'devuelto', 18, 18),
(9, '2025-09-09', '2025-09-23', 15, 1, 'devuelto', 19, 19),
(10, '2025-09-10', '2025-09-24', 0, 2, 'devuelto', 20, 20),
(22, '2025-11-06', '0000-00-00', 0, 1, 'por devolver', NULL, NULL),
(23, '2025-11-06', '0000-00-00', 0, 2, 'por devolver', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Bibliotecario'),
(3, 'Tecnico de sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id_socios` int(11) NOT NULL,
  `dni` bigint(20) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id_socios`, `dni`, `apellido`, `nombre`, `telefono`, `direccion`) VALUES
(11, 12345678, 'Gomez', 'Carlos', 111, 'Av. Libertador 1234, Buenos Aires'),
(12, 87654321, 'Lopez', 'Maria', 222, 'Calle Falsa 456, Rosario'),
(13, 23456789, 'Martinez', 'Juan', 333, 'Av. 9 de Julio 987, Cordoba'),
(14, 34567890, 'Perez', 'Ana', 444, 'Calle San Martin 321, Mendoza'),
(15, 45678901, 'Rodriguez', 'Luis', 555, 'Ruta Nacional 40, San Juan'),
(16, 56789012, 'Sanchez', 'Laura', 666, 'Calle Urquiza 654, Tucuman'),
(17, 67890123, 'Diaz', 'Pedro', 777, 'Av. Independencia 789, Mar del Plata'),
(18, 78901234, 'Fernandez', 'Sofia', 888, 'Calle Belgrano 321, La Plata'),
(19, 89012345, 'Gonzalez', 'Luis', 999, 'Av. Santa Fe 4321, Capital Federal'),
(20, 90123456, 'Castro', 'Juan', 101, 'Calle Las Heras 123, Neuquen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `rol`) VALUES
(13, 'admin_juan', '$2y$10$M1bab0U55zK9UgDMZlKbV.6jDWEn28JIG5aHw17Smf2KTuMFoRjxu', 1),
(14, 'biblio_maria', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2),
(15, 'tech_carlos', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_socios` (`id_socios`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id_socios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id_socios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_socios`) REFERENCES `socios` (`id_socios`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
