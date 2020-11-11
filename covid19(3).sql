-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2020 at 06:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `Encuesta`
--

CREATE TABLE `Encuesta` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Fecha_inicio` date DEFAULT NULL,
  `Fecha_Final` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT 1,
  `titulo` varchar(500) NOT NULL,
  `introduccion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Encuesta`
--

INSERT INTO `Encuesta` (`id`, `Descripcion`, `Fecha_inicio`, `Fecha_Final`, `estado`, `titulo`, `introduccion`) VALUES
(1, 'Encuesta Covid19', '2020-05-06', '2020-05-09', 2, 'Infórmese sobre la enfermedad del coronavirus 2019 (COVID-19)', 'Cada persona es única por muchas razones. Parte de lo que nos hace únicos se encuentra en nuestros genes. Los genes son pequeñas estructuras dentro de las células que transportan instrucciones. Las instrucciones tienen influencia sobre nuestros rasgos físicos y la función del cuerpo. Como los genes de cada persona son diferentes, todos tienen una serie distinta de instrucciones. ¡Los genes son una de las razones por las que somos únicos!');

-- --------------------------------------------------------

--
-- Table structure for table `parrafos`
--

CREATE TABLE `parrafos` (
  `id` int(11) NOT NULL,
  `encabezado` varchar(400) NOT NULL,
  `descripcion` longtext NOT NULL,
  `encuesta_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parrafos`
--

INSERT INTO `parrafos` (`id`, `encabezado`, `descripcion`, `encuesta_id`, `estado`, `orden`) VALUES
(1, '¿QUÉ ES UN CORONAVIRUS?', 'Los coronavirus son un amplio grupo de virus. De los que infectan al ser humano (también pueden infectar animales), algunos pueden causar diversas afecciones como el resfriado común ‎o enfermedades mucho más graves como el síndrome respiratorio de ‎Oriente Medio (MERS) y el síndrome respiratorio agudo severo (SRAS).‎.', 1, 1, 1),
(4, '¿Cuáles son los síntomas del nuevo coronavirus?', 'Los síntomas más comunes del 2019-nCoV son fiebre, cansancio y tos seca. Algunos pacientes pueden desarrollar dolores, congestión nasal, moqueo, dolor de garganta o diarrea. Estos síntomas suelen ser suaves y empezar lentamente.\r\n\r\nSobre 1 de cada 6 pacientes que se infecta con el Coronavirus de Wuhan se ponen muy enfermos y tienen dificultad para respirar. Las poblaciones de riesgo como ancianos o personas que sufran de alta presión, problemas de corazón o diabetes tienen más posibilidades de caer enfermos de gravedad. Cerca del 2% de los infectados han fallecido.', 1, 1, 3),
(5, '¿Cómo se transmite el Virus?', 'La Organización Mundial de la Salud sigue a día de hoy estudiando las formas en las que el COVID-19 se transmite. Los estudios disponibles en el momento de esta publicación apuntan a que la transmisión se produce por inhalación o contacto con gotículas esparcidas en el aire por personas contagiadas al estornudar, toser o exhalar.', 1, 1, 4),
(6, '\r\n¿Qué es el COVID-19 y de dónde proviene?\r\n\r\n', 'El virus de la familia del SARS surgió el mes pasado en Wuhan, en el centro de China.', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Preguntas`
--

CREATE TABLE `Preguntas` (
  `id` int(11) NOT NULL,
  `num_pregunta` int(11) DEFAULT NULL,
  `preguntas` varchar(150) DEFAULT NULL,
  `tipo_de_preguntas` varchar(20) DEFAULT NULL,
  `respuestas_a_generar` varchar(500) DEFAULT NULL,
  `encuesta_id` int(11) NOT NULL,
  `estado` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Preguntas`
--

INSERT INTO `Preguntas` (`id`, `num_pregunta`, `preguntas`, `tipo_de_preguntas`, `respuestas_a_generar`, `encuesta_id`, `estado`) VALUES
(6, 1, '¿Cuál ha sido su lugar de residencia en los ultimos 15 dias?', 'ddown', 'Seleccionar Residencia,Bluefields,Tortugero,Corn Island,Cruz de Rio Grande,Kukara Hill,Rama Key,San Francisco,Laguna de Perlas,Muelle de los Bueyes', 1, 1),
(7, 2, '¿Viene de la parte Rural o Urbano?', 'radio', 'Rural(Comunidad)_1,Urbano(Ciudad)_2', 1, 1),
(8, 3, 'Rango con que grupo de edad se identifica', 'ddown', 'Seleccionar,0-9_5,10-19_5,20-29_5,30-39_5,40-49_10,50-59_15,60-69_20,70-79_25,80-89_40,90-99_50,Mas de 100_50', 1, 1),
(9, 4, '¿Cuál es su género?', 'radio', 'Masculino,Femenino', 1, 1),
(10, 5, '¿Ha estado usted en los últimos 14 días en contacto con alguna persona que haya tenído síntomas de enfermedad respíratoria aguda?', 'radio', 'Si_10,No_0,No sabe_0', 1, 1),
(11, 6, '¿Ha salido usted del país durante el año 2020?', 'radio', 'Si_20,No_0', 1, 1),
(12, 7, '¿Ha tenido que asistir a algún centro asistencial de salud?', 'radio', 'Si_20,No_0', 1, 1),
(17, 8, '¿Ha tenido contacto con algún personal sanitario?', 'radio', 'Si_10,No_0', 1, 1),
(18, 9, '¿En los últimos días ha presentado usted alguno(s) de estos síntomas?', 'chbox', 'Fiebre de 38 grados o más_10,Tos_10,Falta de aire_10,Debilidad o cansancio_10,Dolor en las extermidades_10,Dolor de garganta_10,Diarreas_10,Dolor de Cabeza_10,Perdida o disminución del olfato_10,Perdida del gusto a los alimentos o bebidas_10,No he presentado ningún sintoma o signo de los antes mencionado_0,Prefiero no contestar_0\r\n', 1, 1),
(19, 10, '¿Presenta usted alguno(s) de estos padecimientos?', 'chbox', 'Enfermedad pulmonar obstructiva crónica_10,Asma bronquial_10,Hipertensión arterial_10,Insuficiencia cardiaca_10,Enfermedad coronaria_10,Cáncer_10,Diabetes_10,Lupus Eritematoso sistémico_10,Insuficiencia renal crónica_10,No presento ninguna de las enfermedades antes mencionadas_0,Presento una enfermedad no mencionada en esta lista_0,Prefiero no contestar_0', 1, 1),
(20, 11, '¿Considera usted importante las medidad de protección individual ante la posibilidad de contagio por el virus del Covid-19?', 'radio', 'Si_0,No_10,No sabe_5', 1, 1),
(21, 12, 'Marque cuál de las siguientes medidas usted práctica', 'chbox', 'Distanciamiento social_10,Lavado frecuente de las manos_10,Higiene respiratoria al toser y/o estornudar_10,Evita el aglomeramiento social_10,No utiliza el contacto físico al saludar_10,Pantalla facial_10,Ninguna de las anteriores_10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Respuestas`
--

CREATE TABLE `Respuestas` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(200) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `preguntas_id` int(11) NOT NULL,
  `estado` tinyint(4) DEFAULT 1,
  `hora_finalizada` datetime NOT NULL,
  `hora_inicio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Respuestas`
--

INSERT INTO `Respuestas` (`id`, `respuesta`, `valor`, `usuario`, `preguntas_id`, `estado`, `hora_finalizada`, `hora_inicio`) VALUES
(439, 'Bluefields', NULL, '3', 6, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(440, 'Rural', 5, '3', 7, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(441, '20-29', 5, '3', 8, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(442, 'Femenino', 0, '3', 9, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(443, 'Si', 10, '3', 10, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(444, 'Si', 20, '3', 11, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(445, 'Si', 20, '3', 12, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(446, 'Si', 10, '3', 17, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(447, 'Fiebre de 38 grados o más', 10, '3', 18, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(448, 'Enfermedad pulmonar obstructiva crónica', 10, '3', 19, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(449, 'Si', 0, '3', 20, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(450, 'Distanciamiento social', 10, '3', 21, 1, '2020-05-12 17:04:07', '2020-05-12 17:04:07'),
(451, 'Bluefields', NULL, '1', 6, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(452, 'Rural', 5, '1', 7, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(453, '0-9', 5, '1', 8, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(454, 'Femenino', 0, '1', 9, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(455, 'No', 0, '1', 10, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(456, 'No', 0, '1', 11, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(457, 'Si', 20, '1', 12, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(458, 'Si', 10, '1', 17, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(459, 'Fiebre de 38 grados o más', 10, '1', 18, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(460, 'Falta de aire', 10, '1', 18, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(461, 'Diarreas', 10, '1', 18, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(462, 'Enfermedad pulmonar obstructiva crónica', 10, '1', 19, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(463, 'Asma bronquial', 10, '1', 19, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(464, 'Insuficiencia cardíaca', 10, '1', 19, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(465, 'Insuficiencia cardiaca', 10, '1', 19, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(466, 'Si', 0, '1', 20, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(467, 'Distanciamiento social', 10, '1', 21, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(468, 'Evita el aglomeramiento social', 10, '1', 21, 1, '2020-05-12 17:07:19', '2020-05-12 17:07:19'),
(469, 'Bluefields', NULL, '1', 6, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(470, 'Rural', 5, '1', 7, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(471, '10-19', 5, '1', 8, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(472, 'Masculino', 0, '1', 9, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(473, 'No', 0, '1', 10, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(474, 'Si', 20, '1', 11, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(475, 'No', 0, '1', 12, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(476, 'Si', 10, '1', 17, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(477, 'Fiebre de 38 grados o más', 10, '1', 18, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(478, 'Tos', 10, '1', 18, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(479, 'Enfermedad pulmonar obstructiva crónica', 10, '1', 19, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(480, 'Asma bronquial', 10, '1', 19, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(481, 'Si', 0, '1', 20, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(482, 'Distanciamiento social', 10, '1', 21, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(483, 'Lavado frecuente de las manos', 10, '1', 21, 1, '2020-05-12 19:09:59', '2020-05-12 19:09:59'),
(484, 'Tortugero', NULL, '1', 6, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(485, 'Rural', 5, '1', 7, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(486, '10-19', 5, '1', 8, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(487, 'Masculino', 0, '1', 9, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(488, 'No', 0, '1', 10, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(489, 'Si', 20, '1', 11, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(490, 'No', 0, '1', 12, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(491, 'Si', 10, '1', 17, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(492, 'Fiebre de 38 grados o más', 10, '1', 18, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(493, 'Tos', 10, '1', 18, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(494, 'Enfermedad pulmonar obstructiva crónica', 10, '1', 19, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(495, 'Asma bronquial', 10, '1', 19, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(496, 'Insuficiencia renal crónica', 10, '1', 19, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(497, 'No presento ninguna de las enfermedades antes mencionadas', 0, '1', 19, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(498, 'No', 10, '1', 20, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(499, 'Distanciamiento social', 10, '1', 21, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(500, 'Lavado frecuente de las manos', 10, '1', 21, 1, '2020-05-12 19:10:25', '2020-05-12 19:10:25'),
(501, 'Bluefields', NULL, '3', 6, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(502, 'Rural', 5, '3', 7, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(503, '20-29', 5, '3', 8, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(504, 'Masculino', 0, '3', 9, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(505, 'Si', 10, '3', 10, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(506, 'Si', 20, '3', 11, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(507, 'No', 0, '3', 12, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(508, 'No', 0, '3', 17, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(509, 'Fiebre de 38 grados o más', 10, '3', 18, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(510, 'Tos', 10, '3', 18, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(511, 'Falta de aire', 10, '3', 18, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(512, 'Debilidad o cansancio', 10, '3', 18, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(513, 'Dolor en las extermidades', 10, '3', 18, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(514, 'Insuficiencia cardiaca', 10, '3', 19, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(515, 'Enfermedad coronaria', 10, '3', 19, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(516, 'Cáncer', 10, '3', 19, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(517, 'Si', 0, '3', 20, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(518, 'Distanciamiento social', 10, '3', 21, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(519, 'Lavado frecuente de las manos', 10, '3', 21, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(520, 'Higiene respiratoria al toser y/o estornudar', 10, '3', 21, 1, '2020-05-12 20:26:03', '2020-05-12 20:26:03'),
(521, 'Kukara Hill', NULL, '5', 6, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(522, 'Rural', 5, '5', 7, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(523, '20-29', 5, '5', 8, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(524, 'Femenino', 0, '5', 9, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(525, 'No', 0, '5', 10, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(526, 'No', 0, '5', 11, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(527, 'No', 0, '5', 12, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(528, 'No', 0, '5', 17, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(529, 'Dolor en las extermidades', 10, '5', 18, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(530, 'No presento ninguna de las enfermedades antes mencionadas', 0, '5', 19, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(531, 'Si', 0, '5', 20, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(532, 'Lavado frecuente de las manos', 10, '5', 21, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(533, 'No utiliza el contacto físico al saludar', 10, '5', 21, 1, '2020-05-14 10:57:10', '2020-05-14 10:57:10'),
(534, 'Bluefields', NULL, '5', 6, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(535, 'Rural(Comunidad)', 1, '5', 7, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(536, '10-19', 5, '5', 8, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(537, 'Femenino', NULL, '5', 9, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(538, 'No', 0, '5', 10, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(539, 'No', 0, '5', 11, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(540, 'Si', 20, '5', 12, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(541, 'No', 0, '5', 17, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(542, 'Fiebre de 38 grados o más', 10, '5', 18, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(543, 'Tos', 10, '5', 18, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(544, 'Dolor en las extermidades', 10, '5', 18, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(545, 'Enfermedad pulmonar obstructiva crónica', 10, '5', 19, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(546, 'Asma bronquial', 10, '5', 19, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(547, 'Hipertensión arterial', 10, '5', 19, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(548, 'Si', 0, '5', 20, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(549, 'Distanciamiento social', 10, '5', 21, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(550, 'Lavado frecuente de las manos', 10, '5', 21, 1, '2020-05-27 18:10:34', '2020-05-27 18:10:34'),
(551, 'Bluefields', NULL, '5', 6, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(552, 'Rural(Comunidad)', 1, '5', 7, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(553, '20-29', 5, '5', 8, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(554, 'Masculino', NULL, '5', 9, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(555, 'No', 0, '5', 10, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(556, 'No', 0, '5', 11, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(557, 'Si', 20, '5', 12, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(558, 'Si', 10, '5', 17, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(559, 'Tos', 10, '5', 18, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(560, 'Debilidad o cansancio', 10, '5', 18, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(561, 'Dolor de Cabeza', 10, '5', 18, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(562, 'Hipertensión arterial', 10, '5', 19, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(563, 'Diabetes', 10, '5', 19, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(564, 'No sabe', 5, '5', 20, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(565, 'Lavado frecuente de las manos', 10, '5', 21, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18'),
(566, 'Pantalla facial', 10, '5', 21, 1, '2020-05-28 11:09:18', '2020-05-28 11:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `User_log`
--

CREATE TABLE `User_log` (
  `id` int(11) NOT NULL,
  `carnet` varchar(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `estado` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_log`
--

INSERT INTO `User_log` (`id`, `carnet`, `nombre`, `apellido`, `sexo`, `telefono`, `correo`, `tipo_usuario`, `user`, `password`, `estado`) VALUES
(1, 'aurel0001', 'Aurel', 'Moreno', 'M', '6666666', 'aurel@gmail.com', 'est', 'aurel', '123', 1),
(2, '00003', 'Ismael', 'Quesada', 'M', '000000', 'tetst@gmail.com', 'admin', 'quesada', '1234', 1),
(3, 'dey00001', 'Deyvon', 'Ordonies', 'M', '55555555', 'deyvon@gmail.com', 'est', 'deyvon', '123', 1),
(4, '102020', 'Roger', 'Davila', 'M', '85694152', 'roger.davila@bicu.edu.ni', 'est', 'roger', '123', 1),
(5, '152020', 'Ileana', 'Jarquin', 'F', '89874562', 'ileana.jarquin@bicu.edu.ni', 'est', 'ileana', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User_Profile`
--

CREATE TABLE `User_Profile` (
  `id` int(11) NOT NULL,
  `educacion` text NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `id_User_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_Profile`
--

INSERT INTO `User_Profile` (`id`, `educacion`, `direccion`, `foto`, `descripcion`, `id_User_log`) VALUES
(1, 'Dr. En Medicina General', 'B° San Pedro Avenida Universitaria', '/', 'Profesor_Docente', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Encuesta`
--
ALTER TABLE `Encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parrafos`
--
ALTER TABLE `parrafos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fx_parrafos_Encuesta` (`encuesta_id`);

--
-- Indexes for table `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD PRIMARY KEY (`id`,`encuesta_id`),
  ADD KEY `fk_Preguntas_Encuesta1_idx` (`encuesta_id`);

--
-- Indexes for table `Respuestas`
--
ALTER TABLE `Respuestas`
  ADD PRIMARY KEY (`id`,`preguntas_id`),
  ADD KEY `fk_Respuestas_Preguntas_idx` (`preguntas_id`);

--
-- Indexes for table `User_log`
--
ALTER TABLE `User_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User_Profile`
--
ALTER TABLE `User_Profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Userlog_UserProfile` (`id_User_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Encuesta`
--
ALTER TABLE `Encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parrafos`
--
ALTER TABLE `parrafos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Preguntas`
--
ALTER TABLE `Preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Respuestas`
--
ALTER TABLE `Respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `User_log`
--
ALTER TABLE `User_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `User_Profile`
--
ALTER TABLE `User_Profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parrafos`
--
ALTER TABLE `parrafos`
  ADD CONSTRAINT `fx_parrafos_Encuesta` FOREIGN KEY (`encuesta_id`) REFERENCES `Encuesta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD CONSTRAINT `fk_Preguntas_Encuesta` FOREIGN KEY (`encuesta_id`) REFERENCES `Encuesta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Respuestas`
--
ALTER TABLE `Respuestas`
  ADD CONSTRAINT `fk_Respuestas_Preguntas` FOREIGN KEY (`preguntas_id`) REFERENCES `Preguntas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `User_Profile`
--
ALTER TABLE `User_Profile`
  ADD CONSTRAINT `fk_Userlog_UserProfile` FOREIGN KEY (`id_User_log`) REFERENCES `User_log` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
