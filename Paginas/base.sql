-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bdproyect
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `bdproyect`               s
--
select * from accidentes;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bdproyect` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `bdproyect`;

--
-- Table structure for table `accidentes`
--

DROP TABLE IF EXISTS `accidentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accidentes` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` date DEFAULT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `causa` varchar(100) DEFAULT NULL,
  `lesionados` int(11) DEFAULT NULL,
  `uso_casco` tinyint(1) DEFAULT NULL,
  `nivel_gravedad` varchar(30) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accidentes`
--

LOCK TABLES `accidentes` WRITE;
/*!40000 ALTER TABLE `accidentes` DISABLE KEYS */;
INSERT INTO `accidentes` VALUES (1,'2025-01-15','Avenida Central, Esquina 5','Colisión trasera debido a la falta de distancia de seguridad del vehículo que seguía.','Colisión por alcance',1,1,'Leve','img/accidente1.jfif'),(2,'2025-02-28','Carretera Federal 45, Km 20','Deslizamiento en curva cerrada por exceso de velocidad y pavimento mojado.','Exceso de velocidad',1,1,'Grave','img/accidente2.jfif'),(3,'2025-03-10','Zona Industrial, Calle del Sol','El conductor de la motocicleta no respetó la señal de alto en un cruce.','Falta de precaución',0,1,'Bajo','img/accidente3.jpg'),(4,'2025-04-05','Periférico Norte, Salida 3','Impacto lateral por cambio de carril sin señalizar de un camión.','Cambio de carril imprudente',2,0,'Fatal','img/accidente4.jpg'),(5,'2025-05-18','Pueblo Viejo, Calle Principal','Caída de la motocicleta al intentar esquivar un animal doméstico que cruzaba la calle.','Obstáculo inesperado',1,1,'Moderado','img/accidente5.jpg'),(6,'2025-06-22','Autopista Sur, Caseta de Peaje','Falla mecánica (neumático reventado) que causó la pérdida de control a alta velocidad.','Falla mecánica',1,1,'Grave','img/accidente6.jfif'),(7,'2025-07-07','Bulevar de la Luz, Cerca de la Plaza','Peatón cruzó la vía repentinamente, provocando un frenado brusco y caída.','Imprudencia de peatón',1,1,'Leve','img/accidente7.jfif'),(8,'2025-08-30','Calle Residencial, Sin Iluminación','Impacto con bache profundo no visible de noche, resultando en lesiones.','Mal estado de la vía',1,0,'Grave','img/accidente8.jfif'),(9,'2025-09-12','Vía de Acceso Rápido','Choque frontal menor en tráfico lento, sin lesiones graves.','Distracción del conductor',0,1,'Bajo','img/accidnte9.jfif'),(10,'2025-10-25','Ruta Costera, Vista al Mar','Pérdida de adherencia por mancha de aceite en la carretera.','Condiciones adversas (Aceite)',1,1,'Moderado','img/accidente10.jfif');
/*!40000 ALTER TABLE `accidentes` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `cascos` 23
--

DROP TABLE IF EXISTS `cascos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cascos` (
  `id` int(11) NOT NULL auto_increment,
  `marca` varchar(60) DEFAULT NULL,
  `modelo` varchar(60) DEFAULT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `certificado` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `pecio_aprox` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cascos`
--

LOCK TABLES `cascos` WRITE;
/*!40000 ALTER TABLE `cascos` DISABLE KEYS */;
INSERT INTO `cascos` VALUES 
(1,'Shoei','Neotec II','Modular','ECE 22.05','Casco modular premium con visera solar integrada y sistema de comunicación preparado.',750,'2025-10-01','img/casco.jpg'),
(2,'AGV','Pista GP RR','Integral','ECE 22.06','Casco de carreras de alta gama, usado por profesionales, ligero y con máxima ventilación.',1400,'2025-10-15','img/casco2.webp'),
(3,'HJC','RPHA 11','Integral','DOT','Casco deportivo integral de peso ligero y excelente aerodinámica, ideal para pista.',450,'2025-11-05','img/casco3.avif'),
(4,'Arai','Corsair X','Integral','SNELL M2020','Conocido por su seguridad y ajuste cómodo, diseñado para pilotos exigentes.',900,'2025-09-20','img/casco4.webp'),
(5,'Schuberth','C5','Modular','ECE 22.06','Casco modular muy silencioso y con tecnología de comunicación Mesh 2.0 integrada.',680,'2025-11-25','img/casco5.avif'),
(6,'Nolan','N100-5','Modular','ECE 22.05','Buen equilibrio entre confort y precio, con doble homologación P/J (integral y jet).',320,'2025-08-10','img/casco6.avif'),
(7,'LS2','Challenger GT','Integral','DOT','Casco de fibra de carbono con un diseño agresivo y cierre de doble anilla (D-Ring).',280,'2025-12-03','img/casco7.webp'),
(8,'Bell','Broozer','Convertible','DOT','Diseño único, combina la protección de un integral con la apertura de un jet.',250,'2025-07-22','img/casco8.jpg'),
(9,'Fox Racing','V3 RS','Off-Road','DOT','Casco de motocross de alto rendimiento con tecnología de protección contra impactos MIPS.',550,'2025-09-01','img/casco9.webp'),
(10,'Icon','Airflite','Integral','ECE 22.05','Casco con un estilo audaz y una visera grande que maximiza el campo de visión.',300,'2025-11-18','img/casco10.jpg');
/*!40000 ALTER TABLE `cascos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas_frecuentes`
--

DROP TABLE IF EXISTS `preguntas_frecuentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas_frecuentes` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(200) DEFAULT NULL,
  `respuesta` varchar(200) DEFAULT NULL,
  `categoria` varchar(60) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_frecuentes`
--

LOCK TABLES `preguntas_frecuentes` WRITE;
/*!40000 ALTER TABLE `preguntas_frecuentes` DISABLE KEYS */;
INSERT INTO `preguntas_frecuentes` VALUES (1,'¿Cómo puedo restablecer mi contraseña?','Haz clic en \"Olvidé mi contraseña\" en la página de inicio de sesión y sigue las instrucciones enviadas a tu correo.','Cuenta',1),(2,'¿Qué navegadores web son compatibles?','Nuestra plataforma soporta las últimas versiones de Chrome, Firefox, Safari y Edge.','Soporte Técnico',1),(3,'¿Cómo actualizo mi información de facturación?','Ve a la sección \"Configuración de la Cuenta\" y selecciona la opción \"Métodos de Pago\".','Facturación',1),(4,'¿Qué es un certificado SSL y por qué es importante?','Un certificado SSL cifra la comunicación entre tu navegador y nuestro servidor, asegurando la privacidad de tus datos.','Seguridad',1),(5,'¿Puedo cambiar mi plan de suscripción en cualquier momento?','Sí, puedes actualizar o degradar tu plan desde el panel de control. Los cambios se aplicarán en el siguiente ciclo de facturación.','Facturación',2),(6,'¿Cómo reporto un error o fallo en la plataforma?','Envía un correo a soporte@nuestrodominio.com o usa el formulario de contacto dentro de la aplicación.','Soporte Técnico',2),(7,'¿Qué sucede con mis datos al cancelar la cuenta?','Tus datos se conservarán durante 30 días después de la cancelación antes de ser eliminados permanentemente.','Cuenta',2),(8,'¿Qué medidas de seguridad utilizan para proteger mis datos?','Empleamos cifrado de extremo a extremo, autenticación de dos factores (2FA) y auditorías de seguridad periódicas.','Seguridad',2),(9,'¿Cuánto tiempo tarda en procesarse un reembolso?','Generalmente, los reembolsos se procesan dentro de 5 a 10 días hábiles, dependiendo de tu banco.','Facturación',3),(10,'¿Tienen una API para desarrolladores?','Sí, proporcionamos una API RESTful documentada que puedes encontrar en nuestra sección de Documentación para Desarrolladores.','Integraciones',1);
/*!40000 ALTER TABLE `preguntas_frecuentes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-10  8:02:30
