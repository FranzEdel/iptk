-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `actividades`
-- -------------------------------------------
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_a` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `indicador` text COLLATE utf8mb4_unicode_520_ci,
  `descripcion` text COLLATE utf8mb4_unicode_520_ci,
  `recursos` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `presupuestado` decimal(10,2) NOT NULL,
  `resultado` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  `rrhh` int(11) NOT NULL,
  PRIMARY KEY (`id_a`),
  KEY `actividades_ibfk_1` (`resultado`),
  CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`resultado`) REFERENCES `resultados` (`id_r`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `cronograma_a`
-- -------------------------------------------
DROP TABLE IF EXISTS `cronograma_a`;
CREATE TABLE IF NOT EXISTS `cronograma_a` (
  `id_ca` int(11) NOT NULL AUTO_INCREMENT,
  `ene` int(11) DEFAULT '0',
  `feb` int(11) DEFAULT '0',
  `mar` int(11) DEFAULT '0',
  `abr` int(11) DEFAULT '0',
  `may` int(11) DEFAULT '0',
  `jun` int(11) DEFAULT '0',
  `jul` int(11) DEFAULT '0',
  `ago` int(11) DEFAULT '0',
  `sep` int(11) DEFAULT '0',
  `oct` int(11) DEFAULT '0',
  `nov` int(11) DEFAULT '0',
  `dic` int(11) DEFAULT '0',
  `programados` int(11) DEFAULT '0',
  `total` decimal(10,2) DEFAULT '0.00',
  `avance` decimal(10,2) DEFAULT '0.00',
  `gestion` int(11) NOT NULL,
  `actividad` int(11) NOT NULL,
  `resultado` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id_ca`),
  KEY `actividad` (`actividad`),
  KEY `objetivo` (`resultado`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `cronograma_a_ibfk_1` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id_a`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cronograma_a_ibfk_4` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `cronograma_e`
-- -------------------------------------------
DROP TABLE IF EXISTS `cronograma_e`;
CREATE TABLE IF NOT EXISTS `cronograma_e` (
  `id_ce` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `ene` decimal(10,2) DEFAULT '0.00',
  `feb` decimal(10,2) DEFAULT '0.00',
  `mar` decimal(10,2) DEFAULT '0.00',
  `abr` decimal(10,2) DEFAULT '0.00',
  `may` decimal(10,2) DEFAULT '0.00',
  `jun` decimal(10,2) DEFAULT '0.00',
  `jul` decimal(10,2) DEFAULT '0.00',
  `ago` decimal(10,2) DEFAULT '0.00',
  `sep` decimal(10,2) DEFAULT '0.00',
  `oct` decimal(10,2) DEFAULT '0.00',
  `nov` decimal(10,2) DEFAULT '0.00',
  `dic` decimal(10,2) DEFAULT '0.00',
  `total` decimal(10,2) DEFAULT '0.00',
  `actividad` int(11) NOT NULL,
  `indicador` int(11) NOT NULL,
  `resultado` int(11) NOT NULL,
  `objetivo` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id_ce`),
  KEY `actividad` (`actividad`),
  KEY `objetivo` (`objetivo`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `cronograma_e_ibfk_1` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id_a`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `eventos`
-- -------------------------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `proyecto` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `herramientas`
-- -------------------------------------------
DROP TABLE IF EXISTS `herramientas`;
CREATE TABLE IF NOT EXISTS `herramientas` (
  `id_h` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_h`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `indicadores_o`
-- -------------------------------------------
DROP TABLE IF EXISTS `indicadores_o`;
CREATE TABLE IF NOT EXISTS `indicadores_o` (
  `id_io` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` set('I.OE1','I.OE2','I.OE3','I.OE4','I.OE5','I.OE6','I.OE7','I.OE8','I.OE9','I.OE10') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fuente_verificacion` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `archivo` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `objetivo` int(11) NOT NULL,
  PRIMARY KEY (`id_io`),
  KEY `objetivo` (`objetivo`),
  CONSTRAINT `indicadores_o_ibfk_1` FOREIGN KEY (`objetivo`) REFERENCES `objetivos` (`id_o`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `indicadores_r`
-- -------------------------------------------
DROP TABLE IF EXISTS `indicadores_r`;
CREATE TABLE IF NOT EXISTS `indicadores_r` (
  `id_i` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_i` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fuente_verificacion` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `archivo` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `resultado` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id_i`),
  KEY `resultado` (`resultado`),
  CONSTRAINT `indicadores_r_ibfk_1` FOREIGN KEY (`resultado`) REFERENCES `resultados` (`id_r`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `migration`
-- -------------------------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `objetivos`
-- -------------------------------------------
DROP TABLE IF EXISTS `objetivos`;
CREATE TABLE IF NOT EXISTS `objetivos` (
  `id_o` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_o` set('OE1','OE2','OE3','OE4','OE5','OE6','OE7','OE8','OE9','OE10') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id_o`),
  KEY `proyecto` (`proyecto`),
  CONSTRAINT `objetivos_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `personal`
-- -------------------------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `estado` set('activo','inactivo') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `rol` set('administrador','coordinador') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `proyectos`
-- -------------------------------------------
DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_p` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre_p` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `objetivo_general` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `agencias` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `municipios` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `periodo` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` set('EJECUCIÓN','CONCLUSIÓN') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `responsable` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `num_trabajadores` int(11) NOT NULL,
  `herramienta` int(11) NOT NULL,
  PRIMARY KEY (`id_p`),
  KEY `herramienta` (`herramienta`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`herramienta`) REFERENCES `herramientas` (`id_h`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `recursos_humanos`
-- -------------------------------------------
DROP TABLE IF EXISTS `recursos_humanos`;
CREATE TABLE IF NOT EXISTS `recursos_humanos` (
  `id_rh` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_rh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `resultados`
-- -------------------------------------------
DROP TABLE IF EXISTS `resultados`;
CREATE TABLE IF NOT EXISTS `resultados` (
  `id_r` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_r` set('R1','R2','R3','R4','R5','R6','R7','R8','R9','R10') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id_r`),
  KEY `resultados_ibfk_1` (`proyecto`),
  CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyectos` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `roles`
-- -------------------------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_r` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_r`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- -------------------------------------------
-- TABLE `user`
-- -------------------------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `rol` set('administrador','coordinador') NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE DATA actividades
-- -------------------------------------------
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('1','A1.R1','Elaboración de Línea de base del proyecto.','Diagnostico','Se contratarán los servicios de un/a Consultor para la elaboración de la Línea de base del proyecto, con el fin de conocer la situación de partida del proyecto.','Honorarios profesionales.','2500.00','1','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('2','A2.R1','Planificación de actividades en producción agroecológica a nivel comunal y familiar.','','Se llevarán a cabo 22 reuniones de planificación comunal con la participación promedio de 25 personas de forma equitativa entre mujeres y varones, para llevar a cabo las actividades de producción  agroecológica a nivel comunal y familiar, tomando en cuenta el calendario agropecuario y festivo, para garantizar la participación sobretodo de las mujeres y hombres y miembros de cada  familia, las diferentes actividades que realizan como el pastoreo, las labores de casa, labores en la agricultura para ver su interés y su disponibilidad de tiempo durante el año.','Material de enseñanza y escritorio.  Alimentación (22 reuniones x 25 part x 8 Bs)','1169.54','1','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('3','A3.R1','Talleres de formación a productoras y productores en producción agrícola y hortícola de forma sostenible.','a. 22 talleres Módulo I org. mixtas                                                  b.22 talleres  Módulo II org. mixtas                                                        c. 22 talleres Módulo II (con mujeres)','Se realizarán 44 talleres de capacitación (2 talleres x 22 comunidades) a un promedio de 20 productoras y productores/comunidad en producción agrícola y hortícola-frutícola de forma sostenible, que serán realizados de forma práctica dentro sus parcelas de producción, donde se tendrá una participación activa de las mujeres. Los eventos de capacitación serán llevados a cabo de forma diferenciada, vale decir existirá eventos de capacitación exclusiva para mujeres con la ayuda de los/as técnicos/as del proyecto (en lo posible mujeres), las/os cuales garantizarán la participación de las mujeres y la confianza que pueda existir entre ellas, en algunos casos los eventos de capacitación serán de forma integral, vale decir que hombres y mujeres tendrán las mismas oportunidades de dirigir la reunión, o también participaran como moderadoras en algunos casos durante los eventos de capacitación.','Actualización del material educativo (honorarios). Impresión material educativa. Alimentación capacitación agrícola. Videos, fotografías y otro material educativo. Material de enseñanza y escritorio.','5330.46','1','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('4','A4.R1','Aplicación de tecnología agroecológica para la producción de cultivos tradicionales, alternativos y diversificados ','a. 22 talleres Módulo I org. mixtas                                                     b. 22 talleres  Módulo II org. mixtas                                                         c. 22 talleres Módulo II (con mujeres)','De forma simultánea a los eventos de capacitación se realizará la aplicación de tecnologías agroecológicas mejoradas con el fin de mejorar sus rendimientos de producción sin ocasionar daños a los recursos naturales como suelo, planta y aire.  -Mejoramiento de la semilla.-Adecuada preparación del suelo.-Mejoramiento del sistema de siembra.-Humedad en las parcelas.-Labores culturales.-Selección Positiva.-Cosecha y pos cosecha.-Producción de hortalizas.','Semilla mejorada de papa  (0,5 qq/flia). Semilla mejorada de oca  (0,125 qq). Semilla mejorada de maíz (0,125 qq). Semilla mejorada de trigo (0,125 qq). Semilla mejorada de haba (0,125 qq). Flete de transporte. Productos fitosanitarios ecológicos para cultivos  (30 kg/lt x 250 bs x 3 años). Herramientas de trabajo e Instrumental para huertos(regaderas, mangueras, mochilas, podadoras y otros)','101894.25','1','1','3');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('5','A5.R1','Talleres de capacitación en producción pecuaria. ','a. 350 unidades productivas de cultivos anuales, hortícolas y frutícolas con b.Asistencia técnica y seguimiento (mejoramiento de la semilla, adecuada preparación del suelo, mejoramiento del sistema de siembra, humedad de parcelas, labores culturales y selección positva, cosecha, poscosecha)','Se llevarán a cabo 22 talleres de capacitación (1 taller x 22 comunidades) en producción pecuaria (mejoramiento genético, sanidad animal y alimentación), y de crianza de gallinas ponedoras, con la participación  promedio de 20 participantes/ comunidad. Para lo cual se requerirá de impresión material educativa, alimentación, videos, fotografías, material de enseñanza y escritorio y alquiler de local para eventos. Los talleres serán realizados por los/as técnicos/as agrónomos del proyecto.','Actualización del material educativo (honorarios).Impresión material educativa. Alimentación capacitación pecuaria  (1 taller x 22 com x 20 part x 20 Bs).Videos, fotografías y otro material educativo.Material de enseñanza y escritorio.','2665.23','1','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('6','A6.R1','Manejo del rebaño criollo.','','Para la mejora del ganado criollo se realizará la compra de 150 reproductores (ovinos), 1200 pollitos ponedoras de huevo, y se considera el pago del flete de transporte. Para la alimentación del ganado se realizará la siembra de especies forrajeras, lo cual requerirá semilla mejorada de forraje. 
Así mismo se aplicarán los desparasitantes internos y externos, antibióticos, vacunas y reconstituyentes, instrumental veterinario (jeringas, tijeras y otros para el control de enfermedades y la realización de prácticas en el manejo del ganado criollo. Para el cuidado de los corrales para las gallinas se les dotará de malla de alambre. Siendo un requisito para la entrega del ganado menor y ovino el compromiso de trabajo con el proyecto y la mejora de los ambientes para su crianza.
','Compra de reproductores criollos ovinos.Compra de animales menores (aves de corral).Malla de alambre gallineros (0,90 m x 40 m).Flete de transporte. Semilla mejorada de forraje.Desparasitantes internos y externos.Antibióticos, vacunas y reconstituyentes.Instrumental veterinario (jeringas, tijeras y otros).','33979.89','1','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('7','A7.R1','Intercambio de experiencias entre productoras y productores agropecuarios con participación activa de las mujeres.','a. Intercambio de experiencia ','Se realizarán 3 intercambios de experiencia con la participación de 25 productores y productoras, en función a la producción agrícola, pecuaria y manejo y conservación de los recursos naturales. En estos eventos los productores/as aprovecharan para transmitir sus conocimientos de manera horizontal y al mismo tiempo aprender experiencias innovadoras para ser replicados dentro sus comunidades. 
Por lo general las visitas de intercambio de experiencias se realizarán de una zona a otra zona, de una región a otra región, para lo cual se tomarán en cuenta las mismas condiciones de trabajo y las potencialidades que tienen estas comunidades a visitar.  Este enfoque de los intercambios a nivel regional y nacional tiene objetivos que permiten incidir políticamente ante las autoridades municipales para la atención al desarrollo productivo en el municipio.
','Pasajes (3 viajes x 25 personas x 200 Bs). Alimentación viajes de intercambio (3 días x 25 personas x 40 Bs x 3 veces ). Alojamiento (2 días x 25 personas x 40 Bs x 3 veces).Material educativo y enseñanza (cuadernos, bolígrafos, marcadores).','4396.55','1','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('8','A1.R2','Talleres de formación a productoras y productores encambio climático, medio ambiente y manejo y conservación de los recursos naturales.','a.22 talleres Módulo I                                                                                 b.22 talleres  Módulo II  ','Se desarrollarán 44 talleres prácticos de capacitación (2 talleres x 22 comunidades) con la participación de 20 productoras y productores en manejo de los recursos naturales: suelo, agua y planta, en sus parcelas productivas, con el uso de materiales locales (piedra, plantines), con el fin de recuperar y conservar el suelo y mantener la humedad.
Los módulos de capacitación son: 
Módulo I: Manejo y Conservación del recurso suelo.
Módulo II:Manejo y uso adecuado del agua y la cobertura vegetal.
','Actualización del material educativo (honorarios).Impresión material educativa. Alimentación capacitación agrícola  (2 talleres x 22 com x 20 part x 20 Bs). Videos, fotografías y otro material educativo.Material de enseñanza y escritorio.  ','5043.10','2','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('9','A2.R2','Construcción de obras de recuperación y manejo del recurso suelo (terrazas de formación lenta y de banco, diques para el control de cárcavas, incorporación de abono orgánico).','a.Asistencia técnica y seguimiento en construcción de (terrazas de formación lenta y de banco, diques para el control de cárcavas, incorporación de abono orgánico)  ','Dentro las prácticas a llevarse a cabo la recuperación y conservación del recurso Suelo se van a consideran:
-Terrazas de formación lenta.
-Terrazas de banco.
-Mejorar la fertilidad de las parcelas de cultivo.
','Herramientas de trabajo (picos, palas, azadones, carrerillas). Abono orgánico vegetal. Estiércol de ovino  huertos (22 camionadas x 1600 bs x 3 años).','31896.55','2','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('10','A3.R2','Asistencia técnica en la reposición y manejo de la cobertura vegetal (parcelas protegidas con cercos vivos, parcelas con protección en las riberas de los ríos, producción de plantines de especies fore','a. Protección de 70 parcelas con cercos vivos                                                                      b. Protección de 10 parcelas en rivera con material local                                                c. Producción de 1000 plantines forestales (exóticas y nativas)                                                                                            d.Producción de 500 plantines frutales (durazno)','El equipo técnico del proyecto realizará la asistencia técnica en la reposición y manejo de la cobertura vegetal (parcelas protegidas con cercos vivos, parcelas con protección en las riberas de los ríos, producción de plantines de especies forestales exóticas-nativas), como:
-Protección de parcelas con cercos vivos.
-Apoyar en la producción de plantines forestales.
-Establecimiento de pequeños bosquetes.
','Semillas forestales   (5 kg/año x 980 bs). Plantines forestales. Bolsas tipo manga (200 kg x 75 bs ). Malla milimétrica (4 rollos de 100 mt x 3000 bs). Material vegetativo. Tierra micorrizada. Flete de transporte.','11637.93','2','1','3');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('11','A4.R2','Instalación y funcionamiento de  reservorios para agua de riego que disminuye la sobrecarga laboral de las mujeres.','a. 44  fuentes de agua identificadas ','Se desarrollará la construcción de 44 reservorios para la captación de agua para riego, alimentación para el ganado, donde se tendrá la participación de las familias beneficiarias con su contraparte de mano de obra y materiales locales.
La disponibilidad de agua de riego para los cultivos en las comunidades es insuficiente, esto se debe principalmente al desequilibrio ecológico que existe, el mismo que se va agravando cada vez más, para esto se debe cuidar y mantener las vertientes que existen en la zona, a través de la construcción de pequeñas presas o reservorios, como un complemento de manejo de vertientes.','Construcción reservorios. Alambre de puas. Bolillos (44 reservorios X 8 bolillos).','54241.38','2','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('12','A5.R2','Instalación y funcionamiento de  filtros comunales de agua potable para consumo.','a. Instralación y seguimiento de filtros comunales de agua potable para consumo.       ','Se realizará la instalación de 44 filtros de agua familiares destinados para el consumo de  las familias, que va permitir la disminución de enfermedades gastrointestinales. Se instalarán en conexiones de los 44 reservorios, de los cuales las demás familias podrán disponer de agua potable para su consumo siendo entregado bidones para su almacenamiento.
Para lo cual se tendrá la participación y contraparte de las familias beneficiarias con su aporte de mano de obra. Se organizará a las comunidades en Comités de agua con el fin de que serán los responsables de velar por el mantenimiento y funcionamiento de los mismos.   
','Filtros de agua Marca SAWYER modelo SP 180. Bidomes de 20 lt.','2837.64','2','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('13','A6.R2','Construcción de cocinas mejoradas.','','Se realizará la construcción de 44 cocinas mejoradas, con material local (adobes), que va permitir disminuir las enfermedades respiratorias y oculares de las mujeres.La construcción de cocinas mejoradas en las 22 comunidades de intervención, han resultado apropiadas y replicables hacia otras comunidades, esto se debe principalmente por los beneficios que brinda a las familias campesinas, que permiten ahorrar leña, cocción rápida de los alimentos e inhalación del humo favoreciendo así a la salud humana y el gasto de energético de la mujer (menor traslado de leña).
Se implementarán 44 cocinas mejoradas, las mismas consistirán en habilitar un pequeño cuarto como cocina si es que no tuvieran, la misma que contará con una chimenea conectada a las conchas (hornillas de barro) que usualmente realiza el agricultor. Esto contribuirá a una menor inhalación de humo que afecta significativamente a la mujer y a los niños y niñas, se disminuye el trabajo de la mujer en la preparación de alimentos y acarreo de leña, como así mismo a un menor uso de leña. De esta forma se amortiguará de alguna manera la pérdida gradual de la cobertura vegetal. Estas cocinas también se harán un pequeño revoque para que esté en buenas condiciones.
','Construcción de cocinas mejoradas.','25287.36','2','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('14','A7.R2','Ferias educativas sobre medio ambiente con unidades educativas.','a. 9 ferias educativas ','Se realizarán 9 ferias educativas sobre medio ambiente en las unidades educativas de distrito de Macha y las 4 subcentralías de Titiri, Queojo, QuelluKasa y Palcoyu con la participación de los/as estudiantes de las 9 unidades educativas, donde se dotarán de incentivos educativos a los más destacados. Esta actividad se lleva a cabo con el fin de sensibilizar y concientizar a la población sobre la problemática ambiental.','Material de difusión, afiches, trípticos y otros (9 ferias). Amplificación. Incentivos  (material escolar y educativo).','2931.03','2','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('15','A1.R3','Diagnóstico de la economía de los cuidados y talleres de retroalimentación.','b. Diagnostico de la economia de los cuidados y talleres de retro alimentación','En los primeros 3 meses del proyecto, se va realizar la Convocatoria y selección de la Consultora para la elaboración del Diagnóstico de la economía de los cuidados. Los 3 primeros meses, la consultora levantará información de la situación de las familias de las 22 comunidades sobre la economía de los cuidados en la seguridad alimentaria.
Siendo importante la elaboración del Diagnóstico sobre la economía de los cuidados, ya que en la actualidad y a nivel mundial, la gran mayoría de las contribuciones al cuidado es realizada desde el ámbito doméstico y por las mujeres. La división sexual del trabajo, establecida por el sistema patriarcal, les asigna esta responsabilidad en función de su rol biológico, y hace a su vez, que muchos de los hombres se desentiendan de su propio cuidado o no asuman las responsabilidades en el cuidado de otras personas.Para alcanzar el objetivo se va contratar los servicios de un/a Consultor/a especialista en género, quienes a través de talleres participativos recogerá la información necesaria para la sistematización del documento.','Honorarios profesionales.Material de escritorio. Alimentación talleres de corresponsabilidad (4 talleres subcentralías  x 25 part x 20 Bs.)','2931.03','3','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('16','A2.R3','Talleres de formación a mujeres y hombres en educación alimentaria nutricional (PROGRAMA PEAN) con perspectiva de Género.','a. Talleres de formacion a mujeres y hombres en educación alimentaria nutricional (Programa PEAN) con perspectiva de Género (8 talleres x 4 subcentralias).','Para el desarrollo de los 32 talleres de capacitación a familias en educación alimentaria nutricional (4 subcentralías x 8 módulos) se realizará la impresión del material educativo para ser entregado a cada uno/a de los participantes. Así mismo se va dotar de alimentación, material de enseñanza y escritorio, alquiler de local para eventos, videos, fotografías y otro material educativo. Los talleres los realizará el/la  Técnico/a en nutrición.Esta actividad está dirigida a mujeres y varones de las familias beneficiarias del proyecto. Todas las actividades anteriores se enmarcan en garantizar la seguridad alimentaria y nutricional.Siendo los módulos de capacitación los siguientes:
Módulo I: Alimentación y su relación con la salud.
Módulo II: Seguridad alimentaria nutricional y soberanía alimentaria.
Módulo III: Consumo de alimentos.
Módulo IV: Alimentación adecuada a las diferentes etapas de la vida y estados fisiológicos.
Módulo V: Utilización biológica de los nutrientes.
Módulo VI: Principales problemas nutricionales en el país.
Módulo VII: Derecho humano a la alimentación adecuada y al bienestar nutricional.
Módulo VIII: Aspectos de género que intervienen en la desnutrición de mujeres y niñas.','Actualización del material educativo (honorarios). Impresión material educativo. Alimentación capacitación educación alimentaria nutricional  (8 talleres x 4 subcentralias x 30 part x 20 Bs.). Material de enseñanza y escritorio.Videos, fotografías y otro material educativo.','5632.18','3','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('17','A3.R3','Prácticas alimentarias para diversificar la dieta con alto valor nutritivo de las familias.','a. Practicas alimenticias para diversificar la dieta con alto valor  nutritivo de las familias.','Una vez que las mujeres y varones conozcan sobre Educación alimentaria nutricional, y cuenten con disponibilidad de alimentos a partir de la diversificación de su producción agropecuaria, se realizarán 96 prácticas (4 subcentralías *8 prácticas x 3 años) en la preparación de alimentos con la incorporación de nuevos productos, como ser las hortalizas y otros, pero también un incremento en el consumo de carne, e incluso huevo en la época de postura, y de esta manera puedan utilizar en su vida diaria estos alimentos, para lograr un consumo balanceado. Para realizar esta actividad las familias beneficiarias de las diferentes comunidades contarán con los insumos necesarios, para la preparación de los alimentos, empleando técnicas de manipuleo e higiene.
Como una estrategia de participación e involucramiento de los hombres de las comunidades, se trabajarán con ellos de forma separada en las reuniones comunales que ellos tienen normalmente, en estos espacios se propiciará para que estos también realicen las prácticas alimenticias y sean corresponsables en la alimentación de sus familias.','Insumos alimentarios.','4137.93','3','1','3');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('18','A4.R3','Ferias nutricionales para demostrar las propiedades nutricionales de la diversificación en la producción agrícola y degustar preparaciones alimentarias nutritivas.','a. Promover feria nutricionales 1 por subcentralía/año.','Se desarrollarán 12 ferias nutricionales (1 feria x 3 años x 4 subcentralías), que va permitir visibilizar e incentivar la buena alimentación y nutrición de las familias, se organizará de manera coordinada con las autoridades locales y el gobierno municipal de Colquechaca, para promover y fortalecer diferentes ferias nutricionales locales. En estos eventos los/as productores/as tendrán la oportunidad de promocionar e incentivar platos elaborados con productos nutritivos producidos en la zona, sensibilizando en la mejora de la dieta alimentaria.','Material de difusión, afiches, trípticos y otros (12 ferias). Amplificación. Incentivos  (alimentos, baldes  y menaje de cocina). Insumos para las ferias nutricionales.','6728.75','3','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('19','A1.R4','Formación y asesoría técnica y legal a organizaciones sociales de base de mujeres y mixtas en fortalecimiento interno.','a. Coordinación con Organización de la Central Seccional y Autoridades comunales.
b. Asistencia técnica en los eventos (ampliados, congresos).
c. Asistencia técnica permanente para la preparación de perfiles de proyectos en seguridad alimentaria.
d. Participar en reuniones comunales de organizaciones mixtas.
e. Participar en reuniones comunales de organizaciones sociales de mujeres.
f. Organización de la Central Seccional y Autoridades ','Se realizará el asesoramiento técnico a las 4 organizaciones sociales mixtas y 4 organizaciones de mujeres a nivel subcentral y seccional, que comprende las siguientes actividades:
-Reuniones mensuales de coordinación con la directiva de la Organización de la Central Seccional y Autoridades comunales de la zona.
-Asistencia técnica en los eventos (ampliados, congresos) de la organización sindical.
-Asistencia técnica para que las organizaciones sindicales sean funcionales y exista equidad de género (cargos en la dirección y decisión deben ser asumidos responsablemente por hombres y mujeres).
-Asistencia técnica permanente para la preparación de perfiles de proyectos en seguridad alimentaria para ser incorporados en los POAs Municipales.
Se les dotará de equipamiento como estantes, mesas y sillas a las 8 asociaciones mixtas y de mujeres para su funcionamiento.
','Material de enseñanza y escritorio. Mesas. Sillas.','1364.94','4','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('20','A2.R4','Desarrollo de talleres de formación en Liderazgo de mujeres y varones.','a. Talleres de formacion en liderazgo de mujeres','Se elegirán en cada comunidad a hombres y mujeres representantes de organizacionales campesinas, autoridades locales y organizaciones de mujeres (1 mujer y 1 hombre por 22 comunidades) respaldadas por sus propias organizaciones en consenso y conformidad con el proyecto.
Para el desarrollo de los 16 cursos de formación (8 módulos x 2 años) se elaborará la convocatoria correspondiente con las especificaciones necesarias, como ser el objetivo, el lugar, fecha de inicio y culminación, los módulos a desarrollar, la carga horaria, la modalidad, los requisitos, inicio de inscripciones. En el primer año se realizarán los 8 talleres de formación para las 22 mujeres lideresas que representarán a las 22 comunidades. En el segundo año de igual forma se realizará los 8 talleres de formación en liderazgo para los 22 líderes potenciales.
Los 16 talleres de capacitación serán realizados de manera diferenciada (8 para hombres en el 2do año y 8 mujeres en el primer año bajo el sistema modular), con una duración promedio de 2 días por módulo.  Se realizará de preferencia los fines de semana, de acuerdo al horario que la población disponga previa planificación con ellos, cada taller tendrá un promedio de 22 participantes.','Actualización del material educativo (honorarios). Alimentación (8 módulos x 22 part x 30 Bs x 2 días x 2 años). Honorarios profesionales. Material de enseñanza y escritorio. Videos, fotografías y otro material educativo. Maletines educativos. Chalecos de identificación lideresas.','7724.14','4','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('21','A3.R4','Realizar evaluación y seguimiento de los procesos de formación en liderazgo.','a. 22 test al inicio de la formación y 22 test de evaluación de los 8 módulos y conocer el grado de conocimiento adquiridos y los cambios generados ','Una vez concluidos los eventos de formación en liderazgo se realizarán los eventos de clausura y entrega de certificados, maletines y chalecos de identificación reconociendo el esfuerzo y compromiso, teniendo la participación de las autoridades municipales y subcentrales e institucionales.  ','Material de escritorio.','71.84','4','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('22','A1.R5','Formación y asesoramiento técnico a las organizaciones de mujeres.','a. Elaboración de normas y procedimiento internos 
b. Brindar apoyo legal y jurídico 
c. Auspiciar la participación de las organizaciones de mujeres a eventos a nivel nacional y departamental.','Se desarrollará el asesoramiento a los 4 grupos de mujeres de los distritos de Titiri, Qeojo, Qellukasa y  Padcojo para su organización, conformación de sus directivas, elaboración de sus estatutos, reglamentos y personerías jurídicas.
Esta actividad estará orientada a fortalecer la organización social de las mujeres, donde se brindará asistencia técnica, asesoramiento jurídico, realización de eventos (seminarios, ampliados, congresos) a las organizaciones campesinas de mujeres y también auspiciara la participación de la organización en los diferentes eventos locales, regionales y nacionales que se realicen, está asistencia y asesoramiento básicamente comprenderá:
-Apoyar en la apertura de sus libros de actas, elaboración de normas y procedimiento internos (Estatutos, Reglamentos y Personerías Jurídicas)
-Se brindara apoyo legal y jurídico necesario a todos los dirigentes/as de las diferentes organizaciones, con el fin de resaltar sus derechos y obligaciones y la obtención de sus personerías jurídicas que les otorga su legalidad. Para lo cual se cubrirán los gastos de tramitación.
-Auspiciar la participación de las organizaciones de mujeres en los diferentes eventos convocados a nivel nacional y departamental por las matrices correspondientes.
','Material de enseñanza y escritorio a 4 organizaciones de mujeres x 3 años. Tramites de documentación legal organizaciones de mujeres. Pasajes tramitación Potosí. Alojamiento (3 días x 1 persona x 50 Bs) Potosí.Viáticos (9 días x 100 Bs) Potosí.','2866.38','5','1','2');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('23','A2.R5','Refacción de los centros artesanales de mujeres.','a. 4 centros de mujeres refaccionados.
b. Registros y actas de contraparte de mano de obra local.
c. Actas de entrega de materiales de construccion.
d. Contrato albañil.','Se realizará la refacción de los 4 centros de mujeres, previa entrega de 4 ambientes por parte de la comunidad. Las familias participarán con su contraparte de mano de obra y entrega de materiales locales. Se dotarán de materiales de construcción y el contrato de albañil para la refacción de los 4 centros.','Material de construcción. Contrato albañil.','3706.90','5','1','3');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('24','A3.R5','Talleres de formación a las organizaciones de mujeres en producción artesanal (textiles, telares tradicionales, confección de bordados).','a. Talleres de formacion a  4 organizaciones de mujeres en producción artezanal (textiles, telares tradicionales, confeccion de bordados). ','Se desarrollarán 64 talleres de capacitación a las 4 organizaciones de mujeres en producción artesanal (40 en telares tradicionales y 24 en confección de bordados, corte y confección).Es importante que las participantes, antes de empezar cada módulo de capacitación cuenten con material de capacitación como cartillas y otros. Para este propósito, se elaborará textos de análisis para cada uno de los módulos, los cuales serán didácticos y aptos para el grupo meta y se apoyará en instrumentos (retroproyectora, video y otros).
Los responsables de la preparación del material didáctico de trabajo serán los facilitadores/as. Esta actividad partirá del supuesto que las mujeres tienen conocimientos en la elaboración de diferentes productos artesanales (textiles y bordados) y que requieren de una capacitación técnica en temas de calidad, acabado y mercadeo para que sus productos salgan al mercado.Los rubros que el proyecto trabajara será: artesanía textil en telares, confección y bordados tradicionales y corte y confección.
La metodología a aplicar será “Aprender Haciendo” parte de las experiencias y aprendizajes previos de las participantes. Se trabajará los fines de semana de acuerdo a una planificación, con la ayuda de las facilitadoras y el resto de la semana practicará en los centros familiares.','Insumos y materia prima. Alimentación (20 talleres telares x 15 part. x 20 Bs x 2 año). Impresión cartillas en telares. Honorarios profesionales telares (40 talleres x 500 Bs).Alimentación (12 talleres corte y confección bordados x 15 part. x 20 Bs x 2 año). Impresión cartillas en corte y confección bordados. Honorarios profesionales corte y confección bordados (24 talleres x 500 Bs). Vídeos, fotografías y otro material educativo. Material de enseñanza y escritorio.','9597.70','5','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('25','A4.R5','Apoyar en el proceso de producción textiles, telares tradicionales, confección de bordados.','a. 4 organizaciones de mujeres con iniciativas productivas son dotados con 6 telares y 8 máquinas de coser para la elaboración de sus prendas de vestir y bordados para su comercialización.
b. Actas de entrega de máquinas y materia prima.','Para el desarrollo de las iniciativas productivas se va a dotar de 6 telares y 8 máquinas de coser a las organizaciones de mujeres para la elaboración de sus prendas de vestir y bordados para su comercialización. Siendo la responsabilidad de las representantes de los centros el uso y mantenimiento de los mismos. También se apoyara con insumos como lanas, telas y repuestos.','Centro Artesanal en Telares: Telares, bastidores, awachas. Bolsas de lana x 3 años. Repuestos. Centro Corte Confección y Bordados: Máquinas de confección y bordados. Insumos confección y bordados (lanas, bolsas, planchas y otros). Tela (negro y blanco). Hilo (blanco, rojo y negro). Repuestos.','12456.90','5','1','1');
INSERT INTO `actividades` (`id_a`,`codigo_a`,`nombre`,`indicador`,`descripcion`,`recursos`,`presupuestado`,`resultado`,`proyecto`,`rrhh`) VALUES
('26','A5.R5','Desarrollo de ferias artesanales.','a. 10 ferias artesanales locales y regionales (1 feria x 4 subcentralias y 1 en el distrito de Macha, en coordinación con el municipio e instituciones locales','Con el fin de promoción sus productos artesanales, se van a desarrollar 10 ferias artesanales locales y regionales (1 feria x 4 subcentralias y 1 en el distrito de Macha, en coordinación con el municipio e instituciones locales.
La producción artesanal producto de la educación técnica, se promocionará y comercializará en mercados locales y ferias artesanales que se realizan en las zonas, los mismos que serán impulsados y coordinados por el proyecto, en estrecha coordinación y apoyo de las propias beneficiarias y del Gobierno municipal de Colquechaca','Material de difusión, afiches, trípticos y otros. Amplificación. Insumos y premios para las ferias artesanales (lanas, telas y otros). Alimentación (1 feria x 4 sub centralias x 20 part. x 15 bs x 3 años y 1 distrital).','4022.99','5','1','2');



-- -------------------------------------------
-- TABLE DATA cronograma_a
-- -------------------------------------------
INSERT INTO `cronograma_a` (`id_ca`,`ene`,`feb`,`mar`,`abr`,`may`,`jun`,`jul`,`ago`,`sep`,`oct`,`nov`,`dic`,`programados`,`total`,`avance`,`gestion`,`actividad`,`resultado`,`proyecto`) VALUES
('1','0','0','0','100','0','0','0','0','0','0','0','0','1','100.00','100.00','2018','1','1','1');
INSERT INTO `cronograma_a` (`id_ca`,`ene`,`feb`,`mar`,`abr`,`may`,`jun`,`jul`,`ago`,`sep`,`oct`,`nov`,`dic`,`programados`,`total`,`avance`,`gestion`,`actividad`,`resultado`,`proyecto`) VALUES
('3','50','25','50','0','0','0','0','0','0','0','0','0','3','125.00','41.67','2018','2','1','1');
INSERT INTO `cronograma_a` (`id_ca`,`ene`,`feb`,`mar`,`abr`,`may`,`jun`,`jul`,`ago`,`sep`,`oct`,`nov`,`dic`,`programados`,`total`,`avance`,`gestion`,`actividad`,`resultado`,`proyecto`) VALUES
('4','0','0','75','100','0','0','0','0','0','0','0','0','2','175.00','87.50','2018','3','1','1');



-- -------------------------------------------
-- TABLE DATA cronograma_e
-- -------------------------------------------
INSERT INTO `cronograma_e` (`id_ce`,`item`,`ene`,`feb`,`mar`,`abr`,`may`,`jun`,`jul`,`ago`,`sep`,`oct`,`nov`,`dic`,`total`,`actividad`,`indicador`,`resultado`,`objetivo`,`proyecto`) VALUES
('6','Impresiones y fotocopias','0.00','0.00','0.00','0.00','0.00','0.00','0.00','500.00','0.00','0.00','0.00','0.00','500.00','2','4','3','2','1');
INSERT INTO `cronograma_e` (`id_ce`,`item`,`ene`,`feb`,`mar`,`abr`,`may`,`jun`,`jul`,`ago`,`sep`,`oct`,`nov`,`dic`,`total`,`actividad`,`indicador`,`resultado`,`objetivo`,`proyecto`) VALUES
('9','Compra de estante','0.00','0.00','0.00','2000.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','2000.00','3','4','3','2','1');
INSERT INTO `cronograma_e` (`id_ce`,`item`,`ene`,`feb`,`mar`,`abr`,`may`,`jun`,`jul`,`ago`,`sep`,`oct`,`nov`,`dic`,`total`,`actividad`,`indicador`,`resultado`,`objetivo`,`proyecto`) VALUES
('10','Material de escritorio.','0.00','0.00','0.00','500.00','0.00','0.00','500.00','0.00','0.00','500.00','0.00','0.00','1500.00','4','5','4','2','1');
INSERT INTO `cronograma_e` (`id_ce`,`item`,`ene`,`feb`,`mar`,`abr`,`may`,`jun`,`jul`,`ago`,`sep`,`oct`,`nov`,`dic`,`total`,`actividad`,`indicador`,`resultado`,`objetivo`,`proyecto`) VALUES
('11','Detalle lkaflkad alfal  fjaf alfja fff','0.00','0.00','400.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','400.00','5','6','8','6','2');



-- -------------------------------------------
-- TABLE DATA eventos
-- -------------------------------------------
INSERT INTO `eventos` (`id`,`titulo`,`descripcion`,`fecha_creacion`,`proyecto`) VALUES
('2','Prueba P1','Reunión de emergencia para definir los nuevos objetivos del Proyecto','2018-10-05 00:00:00','1');
INSERT INTO `eventos` (`id`,`titulo`,`descripcion`,`fecha_creacion`,`proyecto`) VALUES
('3','Evento P2','aaaa','2018-10-08 00:00:00','2');
INSERT INTO `eventos` (`id`,`titulo`,`descripcion`,`fecha_creacion`,`proyecto`) VALUES
('5','Reunion de Coordinadores','Reunión de emergencia para definir los nuevos objetivos del Proyecto','2018-11-19 00:00:00','1');
INSERT INTO `eventos` (`id`,`titulo`,`descripcion`,`fecha_creacion`,`proyecto`) VALUES
('6','Envio de Material','Envio','2018-11-09 00:00:00','1');
INSERT INTO `eventos` (`id`,`titulo`,`descripcion`,`fecha_creacion`,`proyecto`) VALUES
('7','Viaje a la Comunidad por inspeccion','viaje','2018-11-07 00:00:00','1');



-- -------------------------------------------
-- TABLE DATA herramientas
-- -------------------------------------------
INSERT INTO `herramientas` (`id_h`,`nombre`) VALUES
('1','CIMA COLQUECHACA C-C (No.8)');
INSERT INTO `herramientas` (`id_h`,`nombre`) VALUES
('2','CIMA RAVELO C-R (No 9)');
INSERT INTO `herramientas` (`id_h`,`nombre`) VALUES
('3','CIMA POCOATA C-P (No. 10)');
INSERT INTO `herramientas` (`id_h`,`nombre`) VALUES
('4','CIMA OCURÍ C-O (No.11)');
INSERT INTO `herramientas` (`id_h`,`nombre`) VALUES
('5','CIMA SUCRE C-S (No.12)');



-- -------------------------------------------
-- TABLE DATA indicadores_o
-- -------------------------------------------
INSERT INTO `indicadores_o` (`id_io`,`codigo`,`nombre`,`fuente_verificacion`,`archivo`,`objetivo`) VALUES
('1','I.OE1','EL 80% DE 350 FAMILIAS (344 MUJERES Y 340VARONES HAN MEJORADO Y DIVERSIFICADO SU DIETA ALIMENTARIA A PARTIR DEL CONSUMO DE ALIMENTOS CON CONTENIDO DE PROTEÍNAS, CARBOHIDRATOS, VITAMINAS Y OTROS (HORTALIZAS, HABA, ARVEJA, MAÍZ, CARNE Y HUEVOS).','REGISTROS DE SEGUIMIENTO A LAS FAMILIAS, ENTREVISTAS Y/O ESTUDIOS DE CASO, FOTOGRAFÍAS.','a','1');
INSERT INTO `indicadores_o` (`id_io`,`codigo`,`nombre`,`fuente_verificacion`,`archivo`,`objetivo`) VALUES
('2','I.OE2','SE HA DISMINUIDO LA PREVALENCIA DE DESNUTRICIÓN CRÓNICA EN NIÑOS Y NIÑAS MENORES DE 5 AÑOS, EN UN 3% EN LAS 22 COMUNIDADES DE COLQUECHACA.','Registros de seguimiento a las familias. 
Entrevistas y/o estudios de caso.
Fotografías.
','a','1');
INSERT INTO `indicadores_o` (`id_io`,`codigo`,`nombre`,`fuente_verificacion`,`archivo`,`objetivo`) VALUES
('3','I.OE3','El 60% de 22 mujeres y 22 varones lideres/as elaboran 12 propuestas (4 subcentralias x 3 años) en seguridad alimentaria, salud sensibles a género.','Propuestas de desarrollo.
Registros de seguimiento a líderes y lideresas.
Fotografías.
','a','1');
INSERT INTO `indicadores_o` (`id_io`,`codigo`,`nombre`,`fuente_verificacion`,`archivo`,`objetivo`) VALUES
('4','I.OE4','El 60% de 22 mujeres y 22 varones lideres/as formados/as, ocupan cargos de decisión en sus comunidades y organizaciones sociales campesinas.','Actas de reuniones de las organizaciones sociales.
Entrevistas y/o estudios de caso.
Registros de seguimiento a líderes y lideresas.
Fotografías.
','a','1');
INSERT INTO `indicadores_o` (`id_io`,`codigo`,`nombre`,`fuente_verificacion`,`archivo`,`objetivo`) VALUES
('5','I.OE5','4 organizaciones sociales de las subcentralias y 4 organizaciones de mujeres de las subcentralias de Titiri,Padcoyo, QelluKasa y Qeojo participan en espacios de planificación (POAs) para gestión recursos e incidir en los presupuestos municipales sensibles de género.','Entrevistas y/o estudios de caso.
Informe técnico de los POAs.
Registros de seguimiento a las organizaciones sociales.
Fotografías.','a','1');
INSERT INTO `indicadores_o` (`id_io`,`codigo`,`nombre`,`fuente_verificacion`,`archivo`,`objetivo`) VALUES
('6','I.OE6','El 80% de 344 productoras y 340 productores formados, han incrementado la producción agrícola en un 15% (papa, haba, trigo, oca, maíz), que favorecerá su autoconsumo e ingresos económicos:
-De 161 a 185qq/ha en el cultivo de papa.
-De 30 a 34qq/ha en el cultivo de haba.
-De 17 a 20qq/ha en el cultivo de trigo.
-De 98 a 112qq/ha en el cultivo de oca.
-De 138 a 159qq/ha en el cultivo de maíz.
','Registros de las unidades de producción agrícola.
Entrevistas y/o estudios de caso.
Fotografías
','a','1');



-- -------------------------------------------
-- TABLE DATA indicadores_r
-- -------------------------------------------
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('1','I1.R1','El 90% de 344 productoras y 340 productores formados en tecnologías mejoradas de producción agroecológica (semilla de calidad, siembra, uso de biofertilizantes, cosecha) de cultivos tradicionales (papa, haba, maíz, trigo, oca) y hortalizas (cebolla, zanahoria, lechuga, rábano beterraga), manejo de los recursos naturales y medidas de mitigación/adaptación alos efectos del cambio climático.','Registros de asistencia de los productores y productoras. Registros de las unidades de producción agrícola. Registros de huertos familiares. Materiales de capacitación en producción agroecológica, hortícola y manejo de recursos naturales. Fotografías.','a','1','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('2','I2.R1','210 mujeres productoras formadas en producción agrícola han  diversificado su producción agrícola, a partir del cultivo de hortalizas (zanahoria, cebolla, lechuga, rábano, beterraga, acelga), para su autoconsumo y excedentes para la venta.','Registros de las mujeres productoras. Registros de huertos familiares. Entrevistas y/o estudios de caso. Fotografías.','','1','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('3','I3.R1','10 mujeres formadas en producción pecuaria han aplicado técnicas pecuarias de manejo de ganados ovinos y camélidos (manejo de ganado criollo, selección de animales, empadre, alimentación, crecimiento, esquila, sanidad animal) y su mejora de su ganado con la incorporación de razas mejoradas.','Registros de asistencia de las mujeres productoras. Registros de las unidades de producción pecuaria. Materiales de capacitación en producción pecuaria. Registros de seguimiento a la producción pecuaria. Fotografías.','','1','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('4','I4.R1','Al menos el 80% de las 350 familias, mejoran la distribución de responsabilidades y su dedicación a actividades productivas, cuidado de familia y tiempo de ocio.','Entrevistas y/o estudios de caso.
Fotografías.
','','1','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('5','I1.R2','El 90% de 344 productoras y 340 productores con formación sobre Cambio climático y sus medidas de mitigación/adaptación alos efectos del cambio climático; cuidado del medio ambiente; manejo y conservación de los recursos naturales (suelo, agua y planta), que les va permitir:
Recurso suelo:
-Construcción de 210 terrazas de formación lenta y de banco utilizando material local (piedra) en algunos casos pasto falaris para estabilizar los mismos.
-Construcción de 70 diques para el control de cárcavas (en laderas).
-Producción agrícola en 350 parcelas con curvas de nivel.
-Incorporación de abono orgánico (guano) en 210 parcelas en producción en una relación de 200 a 300 qq/ha.
Recurso Planta:
-70 parcelas protegidas con cercos vivos y 10 parcelas cuentan con protección en las riberas de los ríos, como medida de adaptación a los efectos del cambio climático. 
-Producción de 1.000 plantines de diferentes especies forestales (exóticas y nativas) y 500 plantines de frutales (duraznos) en viveros familiares implementados.
-44 Cocinas mejoradas implementadas, ahorran el uso de leña y mejoran su habitabilidad. 
-Se reduce el 20% del tiempo de recolección de leña por parte de mujeres y niños con el uso de las cocinas mejoradas, disminuyendo las enfermedades oculares y respiratorias. 
Recurso Agua :
-Construcción de 44 reservorios de agua, tanto para la producción agrícola  (hortalizas), para la pecuaria, promoviendo el acceso al agua.','manejo de recursos naturales.
Registros de seguimiento en eventos de capacitación.
Fotografías.
','','2','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('6','I2.R2','Se ha recuperado 2 has de tierras a partir de la implementación de terrazas de formación lenta, de bancopara el aprovechamiento eficiente del agua (cosecha de agua), construcción de diques para controlar las cárcavas, para la plantación de cultivos anuales y hortalizas.','Registros de seguimiento de las prácticas del manejo de los recursos naturales.
Registros de prácticas de conservación de suelos y medidas de mitigación/adaptación.
Fotografías.','','2','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('7','I1.R3','El 90% de 344 productoras y 340 productores con formación del Programa Educativo de Alimentación Nutricional PEAN, el valor nutricional de los alimentos y los factores de sociales y de género que repercuten en la desnutrición.','Registros de asistencia de las productoras y productores.
Material de capacitación sobre  el PEAN. 
Informes técnicos de los eventos de capacitación.
Registros de seguimiento de los eventos de capacitación.
Fotografías.
','','3','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('8','I2.R3','El 90% de las 350 familias campesinas (344 mujeres y 340 varones) formadas han identificado prácticas inadecuadas de alimentación y los mitos que obstaculizan y facilitan la alimentación adecuada; realizan la distribución de los alimentos atendiendo demandas generacionales y de género.','Registros de asistencia de las productoras y productores.
Registros de seguimiento de las prácticas de alimentación.
Entrevistas y/o estudios de caso.
Fotografías.','','3','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('9','I3.R3','44 familias formadas han mejorado sus condiciones de habitabilidad y de salud con la mejora de 44cocinas.','Acta de entrega de las cocinas mejoradas.
Entrevistas y/o estudios de caso.
Informes centros de salud.
Fotografías.','','3','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('10','I4.R3','El 80% de los 340 productores con formación  y orientación sobre el reparto de las tareas en la economía de los cuidados dentro su entorno familiar. ','Registros de asistencia a los talleres de retroalimentación.
Registros de seguimiento a las familias.
Entrevistas y/o estudios de caso.
Fotografías.','','3','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('11','I1.R4','22 mujeres y 22 varones de 22 comunidades del municipio de Colquechaca, formadas como lideresas y líderes con conocimientos de la Realidad socio política de su entorno, Liderazgo y autoestima, Nueva Legislación Nacional, Economía de los cuidados; Elaboración de propuestas sensibles a género en seguridad alimentaria.','Registros de asistencia de las productoras y productores.
Material de capacitación. Informes técnicos de los eventos de capacitación.
Registros de seguimiento de los eventos de capacitación.
Fotografías.
','','4','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('12','I2.R4','4 organizaciones sociales de mujeres y 4 organizaciones sociales mixtas pertenecientes a las subcentralias de Titiri, Queojo, Qellukasa y Padcoyodel distrito de Macha han recibido formación y asesoramiento técnico para su organización (elaboración de actas, informes técnicos, reglamentos de funcionamiento, redacción de cartas y solicitudes).','Registros de asistencia de las organizaciones sociales mixtas y de mujeres.
Registros de seguimiento de las organizaciones sociales de mujeres y mixtas.
Material de capacitación. Informes técnicos de los eventos de capacitación.
Registros de seguimiento de los eventos de capacitación.
Fotografías.','','4','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('13','I1.R5','El 90% de 60 mujeres de los 4 centros artesanalesdeTitiri, Queojo, Qellukasa y Padcoyosehan formado en técnicas productivas de Textiles yTelares tradicionales, Confección de bordados y Corte y Confección, para su uso y venta en el mercado local.','Registros de asistencia de los eventos de formación. 
Módulos de capacitación. Informes técnicos.
Registros de seguimiento de los eventos de capacitación.
Fotografías.
','','5','1');
INSERT INTO `indicadores_r` (`id_i`,`codigo_i`,`nombre`,`fuente_verificacion`,`archivo`,`resultado`,`proyecto`) VALUES
('14','I2.R5','4 centros artesanales de mujeres de las subcentralias de Titiri, Queojo, Qellukasa y Padcoyoen funcionamiento con equipamiento y mesas directivas, estatutos y reglamentos establecidos. ','Acta de entrega de equipamiento.
Documentos centros de mujeres.
Fotografías.','','5','1');



-- -------------------------------------------
-- TABLE DATA migration
-- -------------------------------------------
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m000000_000000_base','1532444483');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m130524_201442_init','1532444487');



-- -------------------------------------------
-- TABLE DATA objetivos
-- -------------------------------------------
INSERT INTO `objetivos` (`id_o`,`codigo_o`,`nombre`,`proyecto`) VALUES
('1','OE1','MEJORAR LAS CONDICIONES DE SEGURIDAD/SOBERANÍA ALIMENTARIA NUTRICIONAL DE FAMILIAS INDÍGENAS DE COMUNIDADES RURALES DEL MUNICIPIO DE COLQUECHACA, PROMOVIENDO LA EQUIDAD DE GÉNERO.','1');



-- -------------------------------------------
-- TABLE DATA personal
-- -------------------------------------------
INSERT INTO `personal` (`id_user`,`nombre`,`apellido`,`estado`,`rol`) VALUES
('1','Franz Edel','Toco Bernal','activo','administrador');
INSERT INTO `personal` (`id_user`,`nombre`,`apellido`,`estado`,`rol`) VALUES
('3','Jose','Pinaya','activo','coordinador');



-- -------------------------------------------
-- TABLE DATA proyectos
-- -------------------------------------------
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('1','PY.23. H.8. PR.2','SEGURIDAD ALIMENTARIA EN COMUNIDADES RURALES DEL MUNICIPIO DE COLQUECHACA','CONTRIBUIR A LA DISMINUCIóN DE LA SITUACIóN DE POBREZA Y EXCLUSIóN DE LA POBLACIóN RURAL DEL MUNICIPIO DE COLQUECHACA.','SERVICIO DE LIECHTENSTEIN PARA EL DESARROLLO - LED','COLQUECHACA','3 AñOS','2018-01-01','2020-12-31','EJECUCIÓN','TEC. ELOY AYALA','5','1');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('2','PY.17. H.8, 10. PR.2','FORTALECIMIENTO ORGANIZATIVO E INSTITUCIONAL PARA UNA ACE DE CALIDAD PROMOVIENDO LA PRODUCCIóN LOCAL SOSTENIBLE DE ALIMENTOS, CóD.BO/16-PR1-2106.','FORTALECIMIENTO ORGANIZATIVO E INSTITUCIONAL PARA UNA ACE DE CALIDAD PROMOVIENDO LA PRODUCCIóN LOCAL SOSTENIBLE DE ALIMENTOS, CóD.BO/16-PR1-2106.','PROSALUS - AECID','COLQUECHACA, POCOATA','2 AñOS','2017-02-01','2019-01-31','EJECUCIÓN','TEC. ELOY AYALA','1','1');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('3','PY.21. H.8-9-10. PR.2','IMPULSANDO EL DESARROLLO ECONóMICO LOCAL PARA LASEGURIDAD ALIMENTARIA EN 3 MUNICIPIOS DE LA PROVINCIA CHAYANTA, BOL/72654.','IMPULSANDO EL DESARROLLO ECONóMICO LOCAL PARA LASEGURIDAD ALIMENTARIA EN 3 MUNICIPIOS DE LA PROVINCIA CHAYANTA, BOL/72654.','MMUU - RECURSOS PROPIOS','COLQUECHACA, POCOATA, RAVELO','2 AñOS','2018-02-01','2019-01-31','EJECUCIÓN','ING. VLADIMIR FLORES','3','1');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('4','PY.18. H.9. PR.2','FORTALECIENDO LAS CAPACIDADES LOCALES E INICIATIVAS ECONóMICAS SOSTENIBLES CON ENFOQUE DE GéNERO PARA LA MEJORA DE LA SEGURIDAD ALIMENTARIA EN 14 COMUNIDADES DEL CANTóN PITANTORA, BOL/72495.','FORTALECIENDO LAS CAPACIDADES LOCALES E INICIATIVAS ECONóMICAS SOSTENIBLES CON ENFOQUE DE GéNERO PARA LA MEJORA DE LA SEGURIDAD ALIMENTARIA EN 14 COMUNIDADES DEL CANTóN PITANTORA, BOL/72495.','MANOS UNIDAS - COFINANCIAMIENTO','RAVELO','22 MESES','2017-02-01','2018-11-30','EJECUCIÓN','ING. CLAUDIO NAVARRO','4','2');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('5','PY.15. H.10. PR.2','SEGURIDAD ALIMENTARIA NUTRICIONAL Y PROMOCIóN DE LA SALUD COMUNITARIA EN 17 COMUNIDADES POBRES DEL MUNICIPIO DE POCOATA (EXP.SOLPCD/2016/0033).','SEGURIDAD ALIMENTARIA NUTRICIONAL Y PROMOCIóN DE LA SALUD COMUNITARIA EN 17 COMUNIDADES POBRES DEL MUNICIPIO DE POCOATA (EXP.SOLPCD/2016/0033).','JARIT - GENERALITAT VALENCIANA','POCOATA','2 AñOS','2017-01-01','2018-11-30','EJECUCIÓN','TEC. ESTEBAN VILLACORTA','3','3');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('6','PY.16. H.10. PR.2','PARTICIPACIóN DE FAMILIAS RURALES VULNERABLES EN EL DESARROLLO LOCAL MEDIANTE ESTRATEGIAS DE SOBERANíA ALIMENTARIA EN POCOATA, FASE II.','PARTICIPACIóN DE FAMILIAS RURALES VULNERABLES EN EL DESARROLLO LOCAL MEDIANTE ESTRATEGIAS DE SOBERANíA ALIMENTARIA EN POCOATA, FASE II.','XARXA - PICU RABICU - AYUNTAMIENTO DE XIXÓN','POCOATA','1 AñO','2017-03-01','2018-02-28','CONCLUSIÓN','TEC. ESTEBAN VILLACORTA','0','3');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('7','PY.19. H.10. PR.2','DISMINUCIóN DE LOS RIESGOS DEL CAMBIO CLIMáTICO Y PRESERVACIóN DEL MEDIO AMBIENTE EN 12 COMUNIDADES DEL MUNICIPIO DE POCOATA.','DISMINUCIóN DE LOS RIESGOS DEL CAMBIO CLIMáTICO Y PRESERVACIóN DEL MEDIO AMBIENTE EN 12 COMUNIDADES DEL MUNICIPIO DE POCOATA.','FUNDACIóN BIOLABS','POCOATA','1 AñO','2017-08-21','2018-08-20','CONCLUSIÓN','TEC. SABINO LAKA','1','3');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('8','PY.22.H.10.PR.2','FORTALECIMIENTO ORGANIZATIVO Y PRODUCTIVO DE MUJERES INDíGENAS PARA LA SEGURIDAD ALIMENTARIA EN 12 COMUNIDADES POBRES DE POCOATA, BOLIVIA.','FORTALECIMIENTO ORGANIZATIVO Y PRODUCTIVO DE MUJERES INDíGENAS PARA LA SEGURIDAD ALIMENTARIA EN 12 COMUNIDADES POBRES DE POCOATA, BOLIVIA.','TAU - AYUNTAMIENTO DE SAN SEBASTIáN (DONOSTIA)','POCOATA','1 AñO','2017-12-18','2018-12-17','EJECUCIÓN','TEC. MAURICIO CHOQUE','2','3');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('9','PY.24. H.10. PR.2','CONSOLIDANDO LA SOBERANíA ALIMENTARIA CON EQUIDAD DE GéNERO EN COMUNIDADES CAMPESINAS QUECHUAS DE POCOATA,POTOSí,BOLIVIA(COD.SBPLY/17/270401/000097)','CONSOLIDANDO LA SOBERANíA ALIMENTARIA CON EQUIDAD DE GéNERO EN COMUNIDADES CAMPESINAS QUECHUAS DE POCOATA,POTOSí,BOLIVIA(COD.SBPLY/17/270401/000097)','PROSALUS ? JUNTA DE CASTILLA LA MANCHA','POCOATA','1 AñO','2018-02-01','2019-01-31','EJECUCIÓN','TEC. SEGUNDINO RAMOS','2','3');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('10','PY.12. H.11. PR.2','FORTALECIENDO CAPACIDADES ORGANIZATIVAS Y PRODUCTIVAS DE MUJERES PARA MEJORAR LA SEGURIDAD ALIMENTARIA EN EL MUNICIPIO DE OCURí, FASE 2.','FORTALECIENDO CAPACIDADES ORGANIZATIVAS Y PRODUCTIVAS DE MUJERES PARA MEJORAR LA SEGURIDAD ALIMENTARIA EN EL MUNICIPIO DE OCURí, FASE 2.','TAU - DIPUTACIóN FORAL DE BIZKAIA','OCURí','2 AñOS','2016-10-01','2018-09-30','CONCLUSIÓN','ING. VLADIMIR FLORES','2','4');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('11','PY.20. H.9. PR.2','PARTICIPACIóN DE LAS MUJERES EN EL DESARROLLO ECONóMICO LOCAL PARA LA SEGURIDAD ALIMENTARIA CON ENFOQUE DE DERECHOS EN LOS DISTRITOS 6 Y 7 DEL MUNICIPIO DE SUCRE. EXP. 74/2017.','PARTICIPACIóN DE LAS MUJERES EN EL DESARROLLO ECONóMICO LOCAL PARA LA SEGURIDAD ALIMENTARIA CON ENFOQUE DE DERECHOS EN LOS DISTRITOS 6 Y 7 DEL MUNICIPIO DE SUCRE. EXP. 74/2017.','TAU-GOBIERNO DE NAVARRA','SUCRE (DTOS. 6 Y 7)','3 AñOS','2017-10-27','2020-10-26','EJECUCIÓN','ING. LUIS CHURA','4','5');
INSERT INTO `proyectos` (`id_p`,`codigo_p`,`nombre_p`,`objetivo_general`,`agencias`,`municipios`,`periodo`,`fecha_ini`,`fecha_fin`,`estado`,`responsable`,`num_trabajadores`,`herramienta`) VALUES
('12','PY.27. H.12. PR.2','ALLINCHASPA KAUSAY NINCHISPA (PARA VIVIR BIEN)','ALLINCHASPA KAUSAY NINCHISPA (PARA VIVIR BIEN)','CFTC','SUCRE (DTOS. 6 Y 7)','4 AñOS','2018-01-01','2021-12-31','EJECUCIÓN','ING. DEYSI ARCIENEGA','3','5');



-- -------------------------------------------
-- TABLE DATA recursos_humanos
-- -------------------------------------------
INSERT INTO `recursos_humanos` (`id_rh`,`nombres`,`apellidos`) VALUES
('1','Franz','Barrios V.');
INSERT INTO `recursos_humanos` (`id_rh`,`nombres`,`apellidos`) VALUES
('2','Claudia','Pinto J.');
INSERT INTO `recursos_humanos` (`id_rh`,`nombres`,`apellidos`) VALUES
('3','Javier','Zarate R.');



-- -------------------------------------------
-- TABLE DATA resultados
-- -------------------------------------------
INSERT INTO `resultados` (`id_r`,`codigo_r`,`nombre`,`proyecto`) VALUES
('1','R1','Productores y productoras campesinas formadas en producción agropecuaria, han  incrementado la producción agropecuaria sostenible y su diversificación, permitiendo la disponibilidad y acceso de alimentos nutritivos con laparticipación de las mujeres.','1');
INSERT INTO `resultados` (`id_r`,`codigo_r`,`nombre`,`proyecto`) VALUES
('2','R2','Productores y productoras campesinas/os formadas en tecnologías mejoradas de conservación y manejo de los recursos naturales, a fin de reducir la vulnerabilidad hacia amenazas climáticas y cuidado del medio ambiente.','1');
INSERT INTO `resultados` (`id_r`,`codigo_r`,`nombre`,`proyecto`) VALUES
('3','R3','Productores y productoras campesinas formadas en Educación alimentaria nutricional y su adopción de prácticas alimentarias e higiénicas saludables con perspectiva de Género.','1');
INSERT INTO `resultados` (`id_r`,`codigo_r`,`nombre`,`proyecto`) VALUES
('4','R4','Mujeres, varones campesinas/os y organizaciones sociales con formación en Liderazgo, control socialpara mejorar su participación e incidencia política.','1');
INSERT INTO `resultados` (`id_r`,`codigo_r`,`nombre`,`proyecto`) VALUES
('5','R5','Mujeres campesinas y organización de mujeres formadas en técnicas de producción artesanal, orientadas al desarrollo de su vocación productiva.','1');



-- -------------------------------------------
-- TABLE DATA roles
-- -------------------------------------------
INSERT INTO `roles` (`id_r`,`nombre`) VALUES
('1','Administrador');
INSERT INTO `roles` (`id_r`,`nombre`) VALUES
('2','Coordinador');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`rol`,`status`,`created_at`,`updated_at`) VALUES
('1','franzedel','2Er7V5JkF2mNbU4crUzlhnoIYwhcAJgQ','$2y$13$4KSahEdva0UKTc2J7JU0UO48Xon54m90XTdvaqw/DdgCEOQ1jSwLS','','fetb@mail.com','administrador','10','1532444919','1532444919');
INSERT INTO `user` (`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`rol`,`status`,`created_at`,`updated_at`) VALUES
('3','josepinaya','lUzaVuW3LbDLZNZsMlwL-T3baLjrrXDq','$2y$13$EcypnE3L2XGu8XLo4INaReEXoGJlmHRCNcKtQnH0EE3JiYDFcH7F6','','jose@mail.com','coordinador','10','1542144420','1542144515');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
