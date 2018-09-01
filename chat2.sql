-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2018 a las 20:07:02
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensaje` int(11) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idmensaje`, `mensaje`) VALUES
(1, 'hola, que tal'),
(2, 'how are you?'),
(3, 'ADRA'),
(4, 'andragon'),
(5, 'jordansito'),
(6, 'morrison'),
(7, 'dmc'),
(8, 'dante'),
(9, 'vergil'),
(10, 'hola'),
(11, 'hi'),
(12, 'hola'),
(13, 'buenas tardes'),
(14, 'jordansito'),
(15, 'morrison'),
(16, 'andres'),
(17, 'camarena'),
(18, 'adra'),
(19, 'hello'),
(20, 'hola'),
(21, 'Camarena'),
(22, 'hola'),
(23, 'Hola'),
(24, 'que pedos'),
(25, 'Saul'),
(67, 'hola'),
(68, ''),
(69, 'hi'),
(70, 'HOLA'),
(71, ''),
(72, 'hi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesindividuales`
--

CREATE TABLE `mensajesindividuales` (
  `IDMensajesIndividuales` int(11) NOT NULL,
  `IDusuarioEmisor` int(11) NOT NULL,
  `IDUsuarioReceptor` int(11) NOT NULL,
  `Mensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesxsala`
--

CREATE TABLE `mensajesxsala` (
  `IDMensajesxSala` int(11) NOT NULL,
  `IDSala` int(11) NOT NULL,
  `IDUsuarioEmisor` int(11) NOT NULL,
  `Mensaje` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mensajesxsala`
--

INSERT INTO `mensajesxsala` (`IDMensajesxSala`, `IDSala`, `IDUsuarioEmisor`, `Mensaje`, `Fecha`) VALUES
(1, 1, 1, 'Hola, que tal?', '08/30/2018 2:26pm'),
(2, 1, 2, 'Bien, y tu que tal?', '08/30/2018 2:29pm'),
(3, 1, 3, 'Hola chicos', '08/30/2018 2:31pm'),
(4, 1, 1, 'hola mordekaiser, que tal te va?', '08/30/2018 2:32pm'),
(20, 1, 1, 'espero se encuentren bien', '30/08/2018 3:42pm'),
(21, 1, 1, 'hola', '30/08/2018 4:54pm'),
(22, 1, 1, 'jordansito', '30/08/2018 4:54pm'),
(23, 2, 2, 'hola muchachos', '31/08/2018 9:40am'),
(24, 2, 1, 'hola, que tal estas?', '31/08/2018 9:41am'),
(25, 1, 4, 'Hola', '31/08/2018 9:54am'),
(26, 1, 1, 'que pedos', '31/08/2018 9:54am'),
(27, 1, 1, 'rubia', '31/08/2018 9:55am'),
(28, 1, 1, 'que ondas?', '31/08/2018 9:59am'),
(29, 1, 4, 'Hola', '31/08/2018 10:09am'),
(30, 1, 1, 'QUE PEDALES', '31/08/2018 10:09am'),
(31, 1, 4, 'Simon', '31/08/2018 10:09am'),
(32, 1, 1, 'rubiesita', '31/08/2018 10:09am'),
(33, 2, 4, 'Call of Duty', '31/08/2018 10:11am'),
(34, 2, 1, 'minchof duty', '31/08/2018 10:11am'),
(35, 3, 4, 'Smash', '31/08/2018 10:11am'),
(36, 3, 1, 'mmm cabezazo!!', '31/08/2018 10:11am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `IDSala` int(11) NOT NULL,
  `NombreSala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`IDSala`, `NombreSala`) VALUES
(1, 'FIFA 18'),
(2, 'Call of Duty'),
(3, 'Smash Bros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(100) NOT NULL,
  `ClaveUsuario` varchar(100) NOT NULL,
  `EmailUsuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUsuario`, `NombreUsuario`, `ClaveUsuario`, `EmailUsuario`) VALUES
(1, 'andragon', 'horda10', 'andragon@hotmail.com'),
(2, 'adra', 'horda10', 'adra@hotmail.com'),
(3, 'mordo', 'horda10', 'mordo@gmail.com'),
(4, 'Saul', 'Gamer2018', 'saullainez@hotmail.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosxsala`
--

CREATE TABLE `usuariosxsala` (
  `IDUsuariosxSala` int(11) NOT NULL,
  `IDSala` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariosxsala`
--

INSERT INTO `usuariosxsala` (`IDUsuariosxSala`, `IDSala`, `IDUsuario`) VALUES
(5, 1, 1),
(6, 1, 2),
(7, 1, 3),
(8, 2, 1),
(9, 2, 2),
(10, 3, 1),
(11, 1, 4),
(12, 2, 4),
(13, 3, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensaje`);

--
-- Indices de la tabla `mensajesindividuales`
--
ALTER TABLE `mensajesindividuales`
  ADD PRIMARY KEY (`IDMensajesIndividuales`),
  ADD KEY `IDusuarioEmisor` (`IDusuarioEmisor`),
  ADD KEY `IDUsuarioReceptor` (`IDUsuarioReceptor`);

--
-- Indices de la tabla `mensajesxsala`
--
ALTER TABLE `mensajesxsala`
  ADD PRIMARY KEY (`IDMensajesxSala`),
  ADD KEY `IDSala` (`IDSala`),
  ADD KEY `IDUsuarioEmisor` (`IDUsuarioEmisor`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`IDSala`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- Indices de la tabla `usuariosxsala`
--
ALTER TABLE `usuariosxsala`
  ADD PRIMARY KEY (`IDUsuariosxSala`),
  ADD KEY `IDSala` (`IDSala`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `mensajesindividuales`
--
ALTER TABLE `mensajesindividuales`
  MODIFY `IDMensajesIndividuales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajesxsala`
--
ALTER TABLE `mensajesxsala`
  MODIFY `IDMensajesxSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `IDSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuariosxsala`
--
ALTER TABLE `usuariosxsala`
  MODIFY `IDUsuariosxSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajesindividuales`
--
ALTER TABLE `mensajesindividuales`
  ADD CONSTRAINT `mensajesindividuales_ibfk_1` FOREIGN KEY (`IDusuarioEmisor`) REFERENCES `usuario` (`IDUsuario`),
  ADD CONSTRAINT `mensajesindividuales_ibfk_2` FOREIGN KEY (`IDUsuarioReceptor`) REFERENCES `usuario` (`IDUsuario`);

--
-- Filtros para la tabla `mensajesxsala`
--
ALTER TABLE `mensajesxsala`
  ADD CONSTRAINT `mensajesxsala_ibfk_1` FOREIGN KEY (`IDUsuarioEmisor`) REFERENCES `usuario` (`IDUsuario`),
  ADD CONSTRAINT `mensajesxsala_ibfk_2` FOREIGN KEY (`IDSala`) REFERENCES `sala` (`IDSala`);

--
-- Filtros para la tabla `usuariosxsala`
--
ALTER TABLE `usuariosxsala`
  ADD CONSTRAINT `usuariosxsala_ibfk_1` FOREIGN KEY (`IDSala`) REFERENCES `sala` (`IDSala`),
  ADD CONSTRAINT `usuariosxsala_ibfk_2` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`IDUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
