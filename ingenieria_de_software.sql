-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2019 a las 18:55:54
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingenieria_de_software`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE `agentes` (
  `id` smallint(6) NOT NULL,
  `rol` tinyint(1) NOT NULL,
  `nombre` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_paterno` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_materno` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `numero_telefonico` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `correo_electronico` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `codigo_postal` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(72) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `agentes`
--

INSERT INTO `agentes` (`id`, `rol`, `nombre`, `apellido_paterno`, `apellido_materno`, `numero_telefonico`, `correo_electronico`, `codigo_postal`, `contrasena`) VALUES
(24, 1, 'Hugo', 'Colin', 'Miranda', '', 'colin.hugo.89@gmail.com', '', '$2y$10$R9SHZSLk/HFSO3lucPFGxeaZU/9hJwvZJR2fUXLjeOfsqS9eVYqda'),
(34, 0, 'Juanelo', 'Perez', 'Dif', '1234567890', 'juanelo@perez.com', '52146', '$2y$10$oHLBJXx3bQV21ZpT/7TBw.vnmCFSY3bv9I1dHm05iMroLus7nyUbS'),
(35, 1, 'Ricky', 'Garduño', 'Martínez', '7221555010', 'ricky@gmail.com', '52360', '$2y$10$hCXDdUBox7UFWB12J0XixOM4u61rYAVYD73LALzX5jSU5HE.h6SsS'),
(36, 0, 'Nigga', 'Montes', 'Alonso', '7228624556', 'nigga@gmail.com', '50000', '$2y$10$5rbu2o34LFl3kKV7UrI2IeyMo.BsZjqISFGJZ6Yd/BJnkKQKgesy2'),
(37, 0, 'Hector', 'Hernandez', 'Colin', '7171443407', 'hector@gmail.com', '52660', '$2y$10$P/BRzRechkZLz4TA/BofpO3iebvM0LRtM/7bpGXZ9zHOImMLYv3U2'),
(42, 0, 'Pancho', 'Pantera', 'Chocolatoso', '1234567890', 'pancho@pantera.com', '52146', '$2y$10$ip4dYnlJtA5X4qhw2Q4Kd.gyZiCP2amAcp1YHr3UcEmE0VF61j5hG'),
(43, 0, 'Panfilo', 'Anacleto', 'Gutierritos', '7228624556', 'panfilo@anacleto.com', '06140', '$2y$10$wDrtBz/lQTJwhMP3YSY1mec02ZCjAs0vb8YV1MW8ArltfLGIQPPy.'),
(45, 1, 'Usuario', 'Super', 'Agente', '1234567890', 'usuario@super.com', '12345', '$2y$10$maQ48YBtd21K7boEst0u0eXE8FBiMiaelQlINAof7yurIfy98VrH6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `id` smallint(6) NOT NULL,
  `motivo_multa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_vehiculo` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `marca_vehiculo` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `modelo_vehiculo` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `numero_placa` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `foto` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`id`, `motivo_multa`, `tipo_vehiculo`, `marca_vehiculo`, `modelo_vehiculo`, `numero_placa`, `fecha`, `foto`) VALUES
(0, 'Array', 'Sedan', 'Nissan', 'Sentra', 'SSH3229', '2019-06-26 00:00:00', '1.png'),
(24, 'Array', 'Sedan', '', '', '', '0000-00-00 00:00:00', ''),
(35, 'Array', 'Pick Up', 'Chevrolet', 'Chevy', '0987654321', '2019-06-26 00:00:00', '5.png'),
(35, 'Array', 'Sedan', 'Mitsubishi', 'Lancer', 'MBI3118', '2019-06-26 22:16:00', '3.PNG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agentes`
--
ALTER TABLE `agentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agentes`
--
ALTER TABLE `agentes`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
