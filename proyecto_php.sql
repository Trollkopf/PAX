-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2022 a las 13:46:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_php`
--
CREATE DATABASE IF NOT EXISTS `proyecto_php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto_php`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `ID` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `cita` datetime(6) NOT NULL,
  `observaciones` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`ID`, `usuario`, `cita`, `observaciones`) VALUES
(120, 28, '2022-11-16 12:00:00.000000', 'Consulta general'),
(121, 28, '2022-10-13 16:00:00.000000', 'Consulta general'),
(123, 28, '2022-10-06 10:00:00.000000', 'Consulta general'),
(135, 38, '2022-09-21 19:00:00.000000', 'Consulta general'),
(136, 38, '2022-09-28 16:00:00.000000', 'Consulta general'),
(137, 38, '2022-10-27 18:00:00.000000', 'Consulta general'),
(139, 38, '2022-09-30 13:00:00.000000', 'Consulta general'),
(141, 38, '2022-10-28 18:00:00.000000', 'Consulta general'),
(147, 35, '2022-09-21 18:00:00.000000', 'Consulta general'),
(150, 35, '2022-10-19 16:00:00.000000', 'Consulta general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `ID` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `noticia` mediumtext COLLATE utf8_bin NOT NULL,
  `categoria` varchar(15) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `titular` varchar(150) COLLATE utf8_bin NOT NULL,
  `subtitulo` varchar(400) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`ID`, `usuario`, `noticia`, `categoria`, `fecha`, `titular`, `subtitulo`) VALUES
(20, 1, 'GitHub Copilot, el asistente basado en la inteligencia artificial de OpenAI que sugiere código y funciones completas en tiempo real, ahora está disponible para todos los desarrolladores por un precio de 10 dólares mensuales o 100 dólares por un año, pero se han habilitado algunas opciones que permiten utilizarlo de forma gratuita. Desde el lanzamiento de la technical preview el año pasado, GitHub Copilot ha demostrado ser un interesante recurso para los programadores, que no busca reemplazarlos, brindarles ayuda para evitar perder el tiempo principalmente con ciertas tareas repetitivas.', 'Novedades', '2022-06-27', 'GitHub Copilot', 'GitHub Copilot, el asistente para programar basado en IA, ya está disponible para todos: cuánto cuesta y quienes lo pueden usar gratis'),
(21, 40, 'El software se está comiendo el mundo, dijo Marc Andresseen. Y ese software lo crean desarrolladores a través de lenguajes de programación. Y si hay un lenguaje de programación que domina el mercado, ese es JavaScript. Una nueva encuesta realizada a más de 20.000 desarrolladores demuestra el crecimiento en programadores de ese lenguaje y también en otros como Python o Java. Sin embargo hay uno que está convirtiéndose en un singular fenómeno: Rust casi ha multiplicado por cuatro sus usuarios en los dos últimos años.', 'Tecnologia', '2022-06-27', 'Se cuadriplica el uso de Rust', 'JavaScript domina, pero Rust sigue muy de moda: su uso casi se ha cuadruplicado en los dos últimos años'),
(22, 40, 'El mundo físico está cobrando vida con nuevas capacidades en un entorno tras otro, cada uno con sus propias reglas. También se están creando mundos 100% digitales. Las grandes empresas trasladarán sus operaciones internas al metaverso para que los empleados puedan trabajar y relacionarse desde cualquier lugar. En nuestro tiempo libre, las nuevas experiencias de cliente en el metaverso nos transportarán a casi cualquier mundo que podamos imaginar, permitiendo que nos relajemos, juguemos o socialicemos a distancia.\r\n\r\nCon amplias oportunidades en todos estos mundos nuevos, las empresas necesitarán una estrategia apropiada para dar el mejor servicio posible a clientes y partners.\r\n\r\nAl percibir las señales de un cambio tan profundo, el equipo de Accenture Technology Vision puso sus miras más lejos que nunca. Las empresas más ambiciosas dedicarán estos años a desarrollar nuevas realidades físicas y digitales, así como mundos nacidos gracias a ordenadores más avanzados en los que las personas convivirán con la IA.\r\n\r\nEste tipo de avances cuestiona lo que siempre hemos pensado sobre tecnología y negocio. Estamos entrando en una nueva era en la que todavía no hay reglas ni expectativas, pero que ofrece una excelente oportunidad de dar forma a los mundos del futuro.\r\n\r\nEl suelo está cambiando bajo nuestros pies y muchas de las defensas y ventajas competitivas construidas con tanto esfuerzo por las empresas están empezando a perder fuerza. Necesitarán reinventar sus actividades en todos los ámbitos, desde los modelos operativos hasta su propuesta básica de valor. Los líderes con más visión de futuro ya están empezando a hacerlo.', 'Tecnologia', '2022-06-27', 'Technology Trends 2022: Nos vemos en el metaverso', 'El continuo de tecnología y experiencia que redefine nuevos negocios'),
(23, 37, 'Debes ponerte de acuerdo con tus amigos. Tienes que hacer un grupo de whatsapp, idear una lista de la compra, comprobar quien ha puesto su parte del dinero, calcular totales... A veces organizar una fiesta es un engorro ¿no?. ¿Por qué no usar una app para organizarlo todo con módulos que sean fáciles de entender para todo tipo de usuarios? Pues eso, precisamente, es lo que estamos creando ahora mismo. ¿Con qué cuenta Party Planner? Cada módulo te ayudará fácilmente a organizar cada fiesta o evento que organices y, además, ayudas a los invitados a que intervengan en la organización del evento, quitándote trabajo y haciendo que la organización sea mucho más dinámica. Podrás empezar a organizar eventos al registrarte en la aplicación, dándote un montón de herramientas que te facilitarán mucho las labores. Cuando creas un evento obtendrás un enlace de éste, que podrás enviar a los invitados para que accedan a la información. Lo mejor de todo es que los invitados no están obligados a registrarse aunque, si lo hacen, tendrán un acceso rápido desde su cuenta a todos los eventos a los que estén invitados. La lista de la compra es completamente dinámica, pudiendo escribir cada producto o bien seleccionándolo de las listas de los supermercados principales (esto último, añadirá además el precio actual de cada artículo a la lista, ayudando mucho a la cuenta y los costes finales de la fiesta. De lo contrario, si quieres añadir los artículos manualmente porque se trate de un negocio local o porque no lo encuentras en la lista, puedes escribir el precio manualmente para calcular los costes igualmente). Todo fácilmente introduciendo la cantidad necesaria y haciendo click en los botones de añadir o editar. ¿Os lo habéis pensado mejor y no queréis un producto? Tienes el botón de borrar para eliminar tanto el producto como el coste de la lista. Además todos los invitados de la fiesta pueden añadir y borrar productos. Los productos se ordenaran por los diferentes supermercados donde se compran, por lo que la compra será rápida e intuitiva. Además tienes el botón de comprar, que tachará el producto de la lista sin eliminar el coste para poder calcular al final los costes totales. Hablando de los costes totales, éstos se dividen entre el total de invitados a la fiesta y en el panel de costes, podrás ver no solo los costes totales, sino cuanto se ha recaudado ya y quien ha puesto qué cantidad de dinero, restándolo al total de coste por invitado para ver si hay que pedirle un poco más o si por el contrario le tenemos que devolver una cantidad. Estas características son las principales de Party Planner, además de muchas otras que podrás conocer tan pronto como la aplicación, que actualmente se encuentra en desarrollo, llegue al mercado.', 'Proyectos', '2022-06-27', 'PAX | DIGITAL MINDS presenta: Party Planner', '¿No consideras que debería haber una forma más sencilla de organizar fiestas? PAX | DIGITAL MINDS quiere ayudarte con su nueva app PARTY PLANNER'),
(24, 35, 'En PAX | DIGITAL MINDS estamos desarrollando DevJobs, un buscador de empleo para desarrolladores. Ya seas Front End, Backend, Full Stack, Devops, DBA, UX/UI o Techlead; en devJobs encontrarás fácilmente lo que estás buscando. Puedes encontrar por ubicación, salario, requisitos... Todo esto y mucho más en nuesra nueva app.', 'Proyectos', '2022-06-27', 'DevJobs', 'El buscador de empleo para desarrolladores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos` (
  `ID_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(20) COLLATE utf8_bin NOT NULL,
  `datos` varchar(700) COLLATE utf8_bin NOT NULL,
  `tecnologia_empleada` varchar(50) COLLATE utf8_bin NOT NULL,
  `tiempo_consecucion` varchar(15) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`ID_proyecto`, `nombre_proyecto`, `datos`, `tecnologia_empleada`, `tiempo_consecucion`, `imagen`) VALUES
(18, 'Siel', 'Robot que ayuda a los ususarios con depresión', 'Html, Css, PHP', '15 días', 'images/projects/Siel.gif'),
(19, 'Mindfullness', 'Ejercicios de relajación para personas con ansiedad', 'Html, Css, JavaScript, PHP', '10 días', 'images/projects/Mindfullness.gif'),
(21, 'Maquetación Web', 'Ejemplo de la maquetación de una página', 'Html', '15 minutos', 'images/projects/html.png'),
(22, 'comprobaciones', 'Ejemplo de comprobación de datos usando javascript', 'JavaScript', '20 minutos', 'images/projects/javascript.png'),
(23, 'C#', 'Uso del lenguaje C# para generar videojuegos', 'C#', '20 minutos', 'images/projects/csharp.png'),
(26, 'Rest-SERVER', 'Servidor REST creado con Node.js', 'JavaScript', '10 minutos', 'images/projects/Rest-SERVER.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `clave`, `email`, `telefono`, `rol`, `nombre`, `apellido`) VALUES
(1, 'admin', '$2y$10$cGAcQOVK4Ot8ZpoYKlOv0epT3kuIOopnK/fVlMSkPDo3VnTCCD3yu', 'max.serratosa@gmail.com', 665431648, 'ADMIN', 'Maximiliano', 'Serratosa'),
(28, 'pepaflores', '$2y$10$ttIplKOmAm7ghIocBMZK5uzCOaaPbhJrunL9KfDMmVXcmWOT4mEYC', 'pepa@flores.com', 689324519, 'USER', 'Josefa', 'Flores'),
(29, 'CrisTorres', '$2y$10$Iqnhgcp5rYNSS8.jYQMfIuyaqBAgyEgkztpdYSVao5I9eQUcAFTr.', 'cristina@torres.com', 632145987, 'USER', 'Cristina', 'Torres'),
(35, 'Max', '$2y$10$kBmCvVWPlrFZ7ev01l7gVOIRWfTFo/L1n02becXEEAwXcWyBLFSbW', 'barbatosprods@gmail.com', 622626260, 'USER', 'Maximiliano', 'Serratosa'),
(37, 'JuanGomez', '$2y$10$7Wo7G3uHO/31pyldqiXLQelwNxGpmS.YpHzZ87d6jwBRXAH0bAoXK', 'juan@gomez.es', 678451235, 'ADMIN', 'Juan', 'Gómez'),
(38, 'Pepito', '$2y$10$bfPOMUC0enedFP1R5Rr6WOmdWf43L9FyWo6dpT.Lp5.HLkEiO8ZBu', 'pepe@palotero.com', 678521493, 'USER', 'José', 'De Los Palotes'),
(39, 'newuser', '$2y$10$hob2JkraXVT3sXpcrPlxGO9n062i8jjWGk3G43FOrW1gAV55qXhim', 'usuario@nuevo.com', 689574124, 'USER', 'Usuario', 'Nuevo'),
(40, 'polilla', '$2y$10$3TpyLCTC49hKiKNs31HMZuBC2CbBW0LEGxfYtIBXRvQHSni8YBceW', 'paula.bernal.carro@gmail.com', 669043123, 'ADMIN', 'Paula', 'Bernal Carro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD UNIQUE KEY `cita_UNIQUE` (`cita`),
  ADD KEY `usuario_FK_idx` (`usuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `titular_UNIQUE` (`titular`),
  ADD UNIQUE KEY `noticia_UNIQUE` (`noticia`) USING HASH,
  ADD KEY `usuario_FK` (`usuario`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`ID_proyecto`),
  ADD UNIQUE KEY `nombre_proyecto` (`nombre_proyecto`),
  ADD UNIQUE KEY `imagen` (`imagen`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `telefono_UNIQUE` (`telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `ID_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `usuario_FK` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
