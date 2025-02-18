CREATE TABLE `clientes` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) UNIQUE,
  `domicilio` varchar(255),
  `telefono` varchar(20),
  `movil` varchar(20),
  `empresa` varchar(255),
  `cargo` varchar(255),
  `rfc` varchar(20),
  `vip` boolean
);

CREATE TABLE `categorias` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `categoria` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE `subcategorias` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `categoria_id` integer NOT NULL
);

CREATE TABLE `productos` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(255) NOT NULL,
  `categoria_id` integer NOT NULL,
  `subcategoria_id` integer NOT NULL,
  `codigoProducto` varchar(20) UNIQUE NOT NULL,
  `proveedor` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `sobrePedido` boolean
);

CREATE TABLE `servicios` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `nombreServicio` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `categoria_id` integer NOT NULL,
  `subcategoria_id` integer NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `aDomicilio` boolean,
  `requiereCita` boolean,
  `requiereRefacciones` boolean
);

CREATE TABLE `equipos` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `categoria_id` integer NOT NULL,
  `subcategoria_id` integer NOT NULL,
  `marca` varchar(255),
  `modelo` varchar(255),
  `noParte` varchar(255),
  `noSerie` varchar(255) UNIQUE,
  `idPropietario` integer NOT NULL,
  `password` varchar(255),
  `ultimaRevision` date,
  `sistemaOperativo` varchar(255),
  `osOriginal` boolean,
  `tipoMemoria` varchar(255),
  `memoria` varchar(255),
  `tipoAlmacenamiento` varchar(255),
  `almacenamiento` varchar(255),
  `tarjetaGrafica` varchar(255),
  `adaptadorEnergia` varchar(255),
  `medidaDisplay` varchar(255),
  `idiomaTeclado` varchar(255),
  `funcionalEncendido` boolean,
  `funcionalWifi` boolean,
  `funcionalCamara` boolean,
  `funcionalSonido` boolean,
  `funcionalTeclado` boolean,
  `funcionalCargador` boolean,
  `estadoFisico` boolean,
  `comentarios` text
);

CREATE TABLE `workOrders` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `status` varchar(255),
  `fecha` datetime NOT NULL,
  `idCliente` integer NOT NULL,
  `idEquipo` integer NOT NULL,
  `idCategoria` integer NOT NULL,
  `idSubcategoria` integer NOT NULL,
  `esGarantia` boolean,
  `descripcionCliente` text,
  `requiereRespaldo` boolean,
  `notasIngreso` text,
  `nombreIngreso` varchar(255),
  `listaAccesorios` text,
  `fechaCompromiso` datetime,
  `tecnico` varchar(255),
  `requiereRefacciones` boolean,
  `requiereSoftware` boolean,
  `diagnostico` text,
  `notasDiagnostico` text,
  `primerContacto` datetime,
  `presupuesto` decimal(10,2),
  `aceptaServicio` boolean,
  `motivoRechazo` text,
  `precioFinal` decimal(10,2),
  `periodoGarantia` integer,
  `finGarantia` datetime,
  `fechaNotificacion` datetime,
  `fechaEntrega` datetime,
  `nombreEntrega` varchar(255),
  `nombreRecibido` varchar(255)
);

ALTER TABLE `subcategorias` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

ALTER TABLE `productos` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

ALTER TABLE `productos` ADD FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`);

ALTER TABLE `servicios` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

ALTER TABLE `servicios` ADD FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`);

ALTER TABLE `equipos` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

ALTER TABLE `equipos` ADD FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`);

ALTER TABLE `equipos` ADD FOREIGN KEY (`idPropietario`) REFERENCES `clientes` (`id`);

ALTER TABLE `workOrders` ADD FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`);

ALTER TABLE `workOrders` ADD FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`);

ALTER TABLE `workOrders` ADD FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`);

ALTER TABLE `workOrders` ADD FOREIGN KEY (`idSubcategoria`) REFERENCES `subcategorias` (`id`);
