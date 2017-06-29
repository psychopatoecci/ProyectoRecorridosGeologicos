/* Sentencias para insertar el contenido inicial
 * del sitio recorridosgeologicos.ucr.ac.cr
 * Fecha: 27 de junio de 2017i
 */
USE recorridos_geologicosdb;

-- Elimina el contenido "viejo"
TRUNCATE TABLE map_points; 
TRUNCATE TABLE contents;
SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE TABLE pages;
SET FOREIGN_KEY_CHECKS = 1;
TRUNCATE TABLE users;

-- Inserción de usuario de prueba
-- USERNAME: pruebas
-- PASSWORD: pruebas
INSERT INTO users VALUES ( '1', 'pruebas', 'oveja@sleep.net', '$2y$10$E0yMGzeAz/EwsMb26wW0dOaVrQNNeGNaD0Ml47BJOH4baTtGflmfy');

-- Inserción de las páginas
INSERT INTO pages 
VALUES 
		('home'), -- Inicio
		('introduction'), -- Información
		('toursDescription'), -- Descripción General
		('tourSantaElena'), -- Recorrido Santa Elena
		('tourBolanos'), -- Recorrido isla Bolaños
		('gallery1'), -- Galería isla Bolaños
		('gallery2'); -- Galería Península de Santa Elena

-- Contenido de la página de Inicio
-- Imágenes del carrusel
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES 
	('home', '../resources/home/carousel/01.png', '', 'image', 0),
	('home', '../resources/home/carousel/02.png', '', 'image', 0),
	('home', '../resources/home/carousel/03.png', '', 'image', 0),
	('home', '../resources/home/carousel/04.png', '', 'image', 0),
	('home', '../resources/home/carousel/arco_en_roca.png', '', 'image', 0),
	('home', '../resources/home/carousel/el_gallito.png', '', 'image', 0),
	('home', '../resources/home/carousel/estratos_descartes.png', '', 'image', 0),
	('home', '../resources/home/carousel/macizo_orosi.png', '', 'image', 0),
	-- Texto Introductorio
	('home', '', 'El litoral Pacífico Norte de Costa Rica ofrece sitios turísticos de importancia geológica, como lo son la isla Bolaños y la península de Santa Elena, con diversos orígenes y lugares por conocer.', 'text', 1),
	-- URLs apps Android
	('home', 'https://play.google.com/store/apps/details?id=com.google.android.apps.maps','RIB', 'url', 0), -- Bolaños
	('home', 'https://play.google.com/store/apps/details?id=com.google.android.apps.maps','RSE', 'url', 0); -- Santa Elena

-- Contenido de la página de información
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES 
	('introduction', '','La geología es la ciencia que estudia las rocas, desde el punto de vista de composición, origen y procesos que las afectan antes, durante y después de su formación. Además, la Geología comprende la aplicación de conceptos básicos en estudios aplicados como su capacidad hídrica, geomecánica, aplicación ambiental, gestión del riesgo y planificación territorial.
		Costa Rica presenta rocas de diversos orígenes, con edades que abarcan desde unos 170 millones de años (Jurásico Medio) hasta la actualidad (Cuaternario), incluyendo el presente.', 'text', 1),
	('introduction', '','Actualmente los recorridos centran su atención dentro del Área de Conservación Guanacaste, incluyendo sitios como la península de Santa Elena, la isla Bolaños, el archipiélago Murciélago, bahía Santa Elena, entre otros. Siendo casi todos estos territorios declarados Patrimonio de la Humanidad (UNESCO, 1999, id N°928).', 'text', 2),
	('introduction', '','En el litoral Norte de la costa pacífica de Costa Rica, la geología representa un elemento principal del paisaje, sobre el cual se sustenta la flora y la fauna, siendo de provecho para proyectos en varias áreas de interés como educación, turismo y divulgación y concienciación de los parques nacionales.', 'text', 3),
	('introduction', '','La zona no tiene muchas fuentes de trabajo, siendo la principal actividad económica la pesca, por tanto, la importancia del desarrollo de otras actividades como el geoturismo, va a proveer a los pobladores cercanos empleos directos e indirectos, lo que fomentará el desarrollo de la economía y brindará recreación cultural e histórica a los visitantes, siendo así una fuente de rescate de los valores patrimoniales de Costa Rica, desde el punto de vista geológico.', 'text', 3),
	('introduction', '','Al día de hoy se realizan dos recorridos diferentes: península de Santa Elena y alrededores e isla Bolaños y alrededores.', 'text', 4),
	-- Imágenes de fondo
	('introduction', '../resources/intro/background_images/01.png', '', 'image', 1),
	('introduction', '../resources/intro/background_images/02.png', '', 'image', 2),
	('introduction', '../resources/intro/background_images/03.png', '', 'image', 3),
	('introduction', '../resources/intro/background_images/04.png', '', 'image', 4);

-- Contenido de la página de descripción general
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES
	-- Vídeo introductorio
	('toursDescription','https://www.youtube.com/embed/tS5jzLqhCzI?autoplay=1&amp;rel=0&amp;showinfo=0','','url',0),
	-- Texto introductorio recomendaciones
	('toursDescription', '', 'Esperamos que el recorrido sea de su agrado, algunas recomendaciones de seguridad:', 'text', 0),
	-- Recomendaciones de seguridad
	('toursDescription', '', 'Utilizar sombrero o gorra y chaleco flotador.', 'text', 0),
	('toursDescription', '', 'Proteger la piel con bloqueador solar.', 'text', 0),
	('toursDescription', '', 'Mantenerse en su asiento durante el viaje.', 'text', 0),
	('toursDescription', '', 'Evitar sacar los brazos o piernas del bote.', 'text', 0),
	('toursDescription', '', 'Bajarse del bote solo si el botero se lo indica.', 'text', 0),
	-- Imagen ilustrativa de recomendaciones
	('toursDescription', '../resources/travel/general/security.png', '', 'image', 0);

-- Contenido de la página de recorrido isla Bolaños
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES
	-- Imagen de fondo
	('tourBolanos', '../resources/travel/bolanos/bolanos.png', '', 'image', 0),
	-- Descripción
	('tourBolanos', '', 'En la isla Bolaños y sus cercanías se visualizan rocas sedimentarias, específicamente intercalaciones areniscas y lutitas reflejadas en la Formación Junquillal que se originó por depositación sedimentaria en la plataforma continental que revelan la historia entre 20 y 30 millones de años.', 'text', 0),
	-- Documentos de interés
	('tourBolanos', 'http://www.geologia.ucr.ac.cr/revista/revista/to_pdf/revista/01/01-BAUMGARTNERETAL.pdf','Sedimentación y Paleogeografía del Cretácico y Cenozoico del litoral Pacífico de Costa Rica', 'url', 0);

-- Contenido de la página de recorrido península de Santa Elena
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES
	-- Imagen de fondo
	('tourSantaElena', '../resources/travel/santa_elena/santa_elena.png', '', 'image', 0),
	-- Descripción
	('tourSantaElena', '','La península de Santa Elena se encuentra compuesta por rocas ígneas y sedimentarias. Las primeras corresponden con peridotitas formadas en el manto de la Tierra, mientras que, las últimas diversos tipos de roca sedimentaria formadas en la plataforma y el talud continental. Corresponden con calizas, areniscas y lutitas, de las formaciones de Santa Ana, Piedras Blancas, Rivas y Descartes, contenidas en una historia geológica de más de 100 millones de años.', 'text', 0),
	-- Documentos de interés
	('tourSantaElena', 'http://revistes.ub.edu/index.php/GEOACTA/article/view/105.000000365/4199','Magmatic and geotectonic significance of Santa Elena Peninsula, Costa Rica', 'url', 0),
	('tourSantaElena', 'http://revistes.ub.edu/index.php/GEOACTA/article/view/105.000000364/4198','Evidence for middle Cretaceous accretion at Santa Elena Peninsula (Santa Rosa Accretionary Complex), Costa Rica', 'url', 1),
	('tourSantaElena', 'http://www.geologia.ucr.ac.cr/revista/revista/to_pdf/revista/33/33-2-dunas.pdf','Hallazgo de dunas fósiles del final del Pleistoceno en las islas Murciélago, Costa Rica', 'url', 2);

-- Puntos del Mapa de isla Bolaños
INSERT INTO pages VALUES ('P0R1');
INSERT INTO map_points VALUES(1,0,'P0R1',10.95178, -85.70902,'Salida');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES ('P0R1','','Punto de partida del recorrido isla Bolaños','text',0);

INSERT INTO pages VALUES ('P1R1');
INSERT INTO map_points VALUES(1,1,'P1R1',10.95148, -85.7151,'Secuencia de estratos sedimentarios');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P1R1','','Las rocas se dividen en tres grandes grupos: sedimentarias, ígneas y metamórficas. En este recorrido predominan las rocas sedimentarias; las cuales son producto de la consolidación y acumulación de fragmentos de otras rocas, fósiles o precipitados químicos.','text',0);

INSERT INTO pages VALUES ('P2R1');
INSERT INTO map_points VALUES(1,2,'P2R1',10.95708, -85.73363,'La erosión');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P2R1','','La erosión es el proceso de desintegración de las rocas en la superficie terrestre y puede ser provocado por el viento, la lluvia, los seres vivos y procesos fluviales, marítimos y glaciales.','text',0);

INSERT INTO pages VALUES ('P3R1');
INSERT INTO map_points VALUES(1,3,'P3R1',10.96988, -85.72713,'Bahía Junquillal');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P3R1','','Una bahía es una entrada del océano en tierra. En este caso, la entrada del agua está dada por una concavidad producto de esfuerzos tectónicos regionales.','text',0);

INSERT INTO pages VALUES ('P4R1');
INSERT INTO map_points VALUES(1,4,'P4R1',10.9777, -85.7178,'Calizas de isla Muñecos y alrededores');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P4R1','','Isla Muñecos está constituida por rocas formadas por bioconstrucciones coralinas, su erosión y acumulación de sedimentos calcáreos en un ambiente marino somero.','text',0);

INSERT INTO pages VALUES ('P5R1');
INSERT INTO map_points VALUES(1,5,'P5R1',10.98176, -85.71779,'Isla Muñecos y sus corales');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P5R1','','En la formación de las rocas de isla Muñecos predominó el proceso de precipitación biogénica. En este proceso intervino directamente la actividad de organismos vivos como por ejemplo corales, algas y moluscos.','text',0);

INSERT INTO pages VALUES ('P6R1');
INSERT INTO map_points VALUES(1,6,'P6R1',10.98217, -85.71907,'Isla Muñecos');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P6R1','','Los corales son animales marinos coloniales que forman arrecifes. Un arrecife coralino es una estructura marino somera hecha de carbonato de calcio, aportado por los corales. En isla Muñecos se transformaron en roca muchos arrecifes coralinos de edades entre 30 y 20 millones de años.','text',0);

INSERT INTO pages VALUES ('P7R1');
INSERT INTO map_points VALUES(1,7,'P7R1',10.9839, -85.7189,'Isla Muñecos');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P7R1','','En isla Muñecos es fácil reconocer estratos de roca. Los estratos son capas en las que se disponen las rocas sedimentarias; en este caso, producto de la acumulación de organismos y sedimentos asociados.','text',0);

INSERT INTO pages VALUES ('P8R1');
INSERT INTO map_points VALUES(1,8,'P8R1',11.00168, -85.7481,'Isla Despensa (Isla Loro)');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES('P8R1','','La estratificación es la superposición de sedimentos en capas sucesivas. En el caso de isla Despensa presenta rocas con estratificación cruzada. La estratificación cruzada es un tipo de estratificación en la cual las capas de sedimentos están inclinadas respecto a las infra o suprayacentes. Estas inclinaciones indican la dirección de transporte de arena residual en una playa, un río o un desierto.','text',0);

INSERT INTO pages VALUES ('P9R1');
INSERT INTO map_points VALUES(1,9,'P9R1',11.03613, -85.74858,'La cordillera volcánica de Guanacaste');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P9R1','','Una cordillera es una serie de montañas ubicadas consecutivamente. Constituyen zonas de engrosamiento de la corteza y su origen está dado por plegamiento de grandes volúmenes de roca o procesos de subducción entre placas tectónicas. La subducción es cuando la diferencia de densidad entre dos placas tectónicas provoca que una se introduzca bajo otra.','text',0);

INSERT INTO pages VALUES ('P10R1');
INSERT INTO map_points VALUES(1,10,'P10R1',11.03813, -85.73871,'Los pliegues sinsedimentarios');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P10R1','','Corresponden con rocas dobladas o plegadas que son producto de deslizamientos en sustratos inconsolidados.','text',0);

INSERT INTO pages VALUES ('P11R1');
INSERT INTO map_points VALUES(1,11,'P11R1',11.04481, -85.74169,'La meteorización');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P11R1','','La meteorización es un proceso físico-químico que afecta las rocas. Durante el recorrido se observa la meteorización física por acción de las olas, la meteorización química por la reacción química entre el agua y la roca y la bioerosión por la interacción con organismos que perforan o disuelven el sustrato rocoso.','text',0);

INSERT INTO pages VALUES ('P12R1');
INSERT INTO map_points VALUES(1,12,'P12R1',11.04623, -85.73806,'Dunas costeras');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P12R1','','Las dunas son producto de la acumulación de arena por acción del viento. Una de sus principales características es el tamaño de grano, el cual es uniforme.','text',0);

INSERT INTO pages VALUES ('P13R1');
INSERT INTO map_points VALUES(1,13,'P13R1',11.04883, -85.72666,'La geología y las bahías');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P13R1','','Las bahías del recorrido corresponden con zonas de debilidad de las rocas dentro de un “tren de pliegues”, iniciado al Norte de la península de Santa Elena. Un pliegue es una flexión de una masa de roca producto de la compresión tectónica que afecta a las rocas. De ahí, que un tren de pliegues sea una consecución de pliegues, asemejando ondas.','text',0);

INSERT INTO pages VALUES ('P14R1');
INSERT INTO map_points VALUES(1,14,'P14R1',11.04576, -85.7219,'Más acerca de las dunas costeras');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P14R1','','La formación de dunas costeras en la costa pacífico Norte de Costa Rica es una consecuencia directa de la acción de los vientos. Principalmente los vientos alisios que afectan la zona entre diciembre y mayo.','text',0);

INSERT INTO pages VALUES ('P15R1');
INSERT INTO map_points VALUES(1,15,'P15R1',11.04668, -85.70751,'La isla Bolaños');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P15R1','','Las islas son porciones de tierra rodeadas por agua. En la isla Bolaños hay rocas sedimentarias agrupadas dentro de la Formación Junquillal. Estas rocas contienen variedad de estructuras sedimentarias como: laminaciones, ondulitas, concreciones, ichnofósiles, entre otras.','text',0);

INSERT INTO pages VALUES ('P16R1');
INSERT INTO map_points VALUES(1,16,'P16R1',11.04913, -85.70746,'Rocas de la Formación Junquillal');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P16R1','','La Formación Junquillal está compuesta por rocas sedimentarias clásticas (conglomerados, areniscas y lutitas)  depositadas en un ambiente marino somero con influencia de tormentas.','text',0);

-- Contenido del Mapa de isla Bolaños
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES
	('P1R1', '../../resources/travel/maps/1/1-1.jpg','Secuencia de estratos rocosos','image',0),

	('P2R1', '../../resources/travel/maps/1/2-1.jpg','Rocas sedimentarias de bajo rojo','image',0),
	('P2R1', '../../resources/travel/maps/1/2-2.jpg','Rocas sedimentarias de bajo rojo','image',0),
	('P2R1', '../../resources/travel/maps/1/2-3.jpg','Rocas sedimentarias de bajo rojo','image',0),
	('P2R1', '../../resources/travel/maps/1/2-4.jpg','Rocas sedimentarias de bajo rojo','image',0),
	('P2R1', '../../resources/travel/maps/1/2-5.jpg','Rocas sedimentarias de bajo rojo','image',0),

	('P3R1', '../../resources/travel/maps/1/03-1.jpg','Una vista de bahía Junquillal','image',0),

	('P4R1', '../../resources/travel/maps/1/04-1.jpg','Arrecifes coralinos fosilizados','image',0),
	('P4R1', '../../resources/travel/maps/1/04-3.jpg','Arrecifes coralinos fosilizados','image',0),
	('P4R1','https://www.youtube.com/watch?v=yngL0Ahu4FQ','Bahía Junquillal','video',0),

	('P5R1', '../../resources/travel/maps/1/05-1.jpg','Fragmentos de corales fosilizados','image',0),
	('P5R1', '../../resources/travel/maps/1/05-2.jpg','Fragmentos de corales fosilizados','image',0),

	('P6R1', '../../resources/travel/maps/1/06-1.jpg','Isla Muñecos','image',0),
	('P6R1', '../../resources/travel/maps/1/06-2.jpg','El Muñeco','image',0),

	('P7R1', '../../resources/travel/maps/1/07-1.jpg','Plegamiento de estratos de calizas','image',0),

	('P8R1', '../../resources/travel/maps/1/08-1.jpg','Estratificación cruzada','image',0),
	('P8R1', '../../resources/travel/maps/1/08-3.jpg','Estratificación cruzada','image',0),

	('P9R1', '../../resources/travel/maps/1/09-1.jpg','Vista del complejo Orosí – Cacao','image',0),
	('P9R1','https://www.youtube.com/watch?v=izi0JKKH-qA','Relieve producto de la erosión','video',0),

	('P10R1', '../../resources/travel/maps/1/10-1.jpg','Pliegue sinsedimentario','image',0),
	('P10R1', '../../resources/travel/maps/1/10-1a.jpg','El dragón de roca','image',0),

	('P11R1', '../../resources/travel/maps/1/11-1.jpg','Intercalaciones de estratos rocosos','image',0),
	('P11R1', '../../resources/travel/maps/1/11-2.jpg','El Gallito','image',0),
	('P11R1', '../../resources/travel/maps/1/11-3.jpg','Intercalaciones de estratos rocosos','image',0),

	('P12R1', '../../resources/travel/maps/1/12-1.jpg','Duna costera','image',0),
	('P12R1','https://www.youtube.com/watch?v=sNPbGGtMKNY','Relieve producto de la erosión','video',0),

	('P13R1', '../../resources/travel/maps/1/13-1.jpg','Conglomerado','image',0),
	('P13R1','https://www.youtube.com/watch?v=bxea9PzgKXc','Duna Activa','video',0),

	('P14R1', '../../resources/travel/maps/1/14-1.jpg','Duna costera','image',0),
	('P14R1', '../../resources/travel/maps/1/14-2.jpg','Formación','image',0),

	('P15R1', '../../resources/travel/maps/1/15-1.jpg','Arenas y clastos dispersos por acción del oleaje','image',0),
	('P15R1', '../../resources/travel/maps/1/15-2.jpg','Arenas y clastos dispersos por acción del oleaje','image',0),
	('P15R1', '../../resources/travel/maps/1/16-2.jpg','Mapa geológico de isla Bolaños','image',0),
	('P15R1', '../../resources/travel/maps/1/17-1.jpg','Secuencia de estratos rocosos','image',0),
	('P15R1', '../../resources/travel/maps/1/17-3.jpg','Columna estratigráfica','image',0),
	('P15R1', '../../resources/travel/maps/1/18-1.jpg','Pares conjugados producto de la compresión','image',0),
	('P15R1','https://www.youtube.com/watch?v=1OXQphmzYoo','Isla Bolaños','video',0),

	('P16R1', '../../resources/travel/maps/1/19-1.jpg','Estratificación cruzada curva','image',0),
	('P16R1', '../../resources/travel/maps/1/19-1-a.jpg','Laminaciones finas','image',0),
	('P16R1', '../../resources/travel/maps/1/19-1-b.jpg','Ondulitas','image',0),
	('P16R1', '../../resources/travel/maps/1/19-1-c.jpg','Concreciones','image',0),
	('P16R1', '../../resources/travel/maps/1/19-1-d.jpg','Concreciones','image',0),
	('P16R1', '../../resources/travel/maps/19-1-e.jpg','¿Carbón en rocas?','image',0),
	('P16R1', '../../resources/travel/maps/1/19-1-f.jpg','Ichnofósiles','image',0),
	('P16R1', '../../resources/travel/maps/1/19-1-g.jpg','Ichnofósiles','image',0);

-- Puntos del Mapa península de Santa Elena
INSERT INTO pages VALUES ('P0R2');
INSERT INTO map_points VALUES(2,0,'P0R2',10.95124, -85.70945,'Salida');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P0R2','','Punto de partida del recorrido península de Santa Elena','text',0);

INSERT INTO pages VALUES ('P1R2');
INSERT INTO map_points VALUES(2,1,'P1R2',10.94081, -85.77404,'Estratos de la Formación Descartes');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P1R2','','La Formación Descartes es una unidad sedimentaria compuesta por intercalaciones de areniscas y lutitas depositadas en un ambiente marino profundo. Estas intercalaciones son como un libro: cuyas hojas develan la historia de la Tierra.','text',0);

INSERT INTO pages VALUES ('P2R2');
INSERT INTO map_points VALUES(2,2,'P2R2',10.91958, -85.79932,'Diferencias en la vegetación según el tipo de roca');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P2R2','','En la península de Santa Elena es común encontrar diferencias en el tipo y tamaño de la vegetación debido a las variaciones geológicas en las rocas que afloran en la superficie terrestre. La mayor parte de la península se encuentra cubierta por peridotitas. Estas son rocas ultramáficas formadas del manto de la Tierra, de ahí que tengan altos contenidos de magnesio (alcanzan hasta un 30% del total de la roca), razón principal de la variedad de la flora.','text',0);

INSERT INTO pages VALUES ('P3R2');
INSERT INTO map_points VALUES(2,3,'P3R2',10.91338, -85.80195,'Rocas del manto');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P3R2','','Una peridotita es una roca ígnea constituida por minerales básicos como: olivino, piroxeno y algunas veces por anfíbol. Tiende a ser de color verde. Además, solo se forman en el manto de la Tierra.','text',0);

INSERT INTO pages VALUES ('P4R2');
INSERT INTO map_points VALUES(2,4,'P4R2',10.92506, -85.81621,'Rocas de la Formación Santa Ana, Piedras Blancas y Rivas');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P4R2','','La Formación Santa Ana está compuesta por areniscas con muchos fragmentos de rocas ígneas (peridotitas y basaltos) y fósiles. Entre ellos los rudistas, que fueron los constructores de arrecifes del Cretácico creciendo sobre las peridotitas hace unos 75 millones de años. Sobre la Formación Santa Ana se ubica la Formación Piedras Blancas compuesta de rocas calcáreas finas de tonos rosados y blancos, generadas por la acumulación de organismos microscópicos como foraminíferos. Son intercalaciones de areniscas y lutitas típicas de flujos turbidíticos. Las areniscas son rocas sedimentarias con tamaño de grano variable entre 0,063 y 2 mm, mientras que las lutitas son de tamaños menores a los 0,063 mm.','text',0);

INSERT INTO pages VALUES ('P5R2');
INSERT INTO map_points VALUES(2,5,'P5R2',10.91753, -85.78693,'Las turbiditas');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P5R2','','La formación de una turbidita es un proceso desarrollado en el talud continental, donde los procesos de sedimentación del fondo marino se ven interrumpidos por corrientes de sedimentos de origen terrestre que pueden llegar a formar avalanchas submarinas. Estas avalanchas son provocadas por la gravedad, terremotos o agitación de sedimentos del fondo marino.','text',0);

INSERT INTO pages VALUES ('P6R2');
INSERT INTO map_points VALUES(2,6,'P6R2',10.93645, -85.81037,'Rocas de la Formación de Descartes');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P6R2','','Son una secuencia de estratos de rocas sedimentarias que se depositaron sobre la Formación Rivas de origen marino profundo y generados por corrientes de turbidez o turbiditas distales.','text',0);

INSERT INTO pages VALUES ('P7R2');
INSERT INTO map_points VALUES(2,7,'P7R2',10.9502, -85.875,'Pliegues sinsedimentarios');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P7R2','','Corresponden con rocas dobladas o plegadas producto de deslizamientos en sustratos inconsolidados.','text',0);

INSERT INTO pages VALUES ('P8R2');
INSERT INTO map_points VALUES(2,8,'P8R2',10.95016, -85.88396,'Maravillas de la naturaleza');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P8R2','','El buzamiento es el término geológico usado para referirse a la dirección y ángulo de inclinación de las rocas. Esta inclinación es medible con instrumentos como las brújulas.','text',0);

INSERT INTO pages VALUES ('P9R2');
INSERT INTO map_points VALUES(2,9,'P9R2',10.94015, -85.87438,'Rocas inclinadas de la Formación de Descartes');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P9R2','','El buzamiento es el término geológico usado para referirse a la dirección y ángulo de inclinación de las rocas. Esta inclinación es medible con instrumentos como las brújulas. El contrabuzamiento es la dirección opuesta al buzamiento y su principal característica es que en esta vista las rocas se observan aparentemente horizontales.','text',0);

INSERT INTO pages VALUES ('P10R2');
INSERT INTO map_points VALUES(2,10,'P10R2',10.93171, -85.87749,'Relictos de erosión');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P10R2','','Un relicto de erosión son restos de roca que han resistido los procesos de meteorización y erosión.','text',0);

INSERT INTO pages VALUES ('P11R2');
INSERT INTO map_points VALUES(2,11,'P11R2',10.89343, -85.94944,'Intrusiones en peridotitas');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P11R2','','Una intrusión es el proceso por el cual una roca ígnea se introduce a presión dentro de una roca preexistente. En la península de Santa Elena la roca preexistente corresponde a la peridotita y la intrusión es la diabasa.','text',0);

INSERT INTO pages VALUES ('P12R2');
INSERT INTO map_points VALUES(2,12,'P12R2',10.89428, -85.92604,'Brecha de falla');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P12R2','','Bajo las peridotitas hay una brecha o roca con fragmentos angulosos flotando en una matriz. Como consecuencia de la trituración de una roca preexistente por el desplazamiento de una unidad rocosa muy pesada, en este caso las peridotitas.','text',0);

INSERT INTO pages VALUES ('P13R2');
INSERT INTO map_points VALUES(2,13,'P13R2',10.884, -85.8998,'Las dunas costeras');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P13R2','','El viento es el principal factor de formación de las dunas. Mediante el arrastre de partículas que generan capas suaves y uniformes. Además, el sistema de depositación genera estratificación cruzada.','text',0);

INSERT INTO pages VALUES ('P14R2');
INSERT INTO map_points VALUES(2,14,'P14R2',10.88, -85.8791,'Rocas del Complejo Acrecional de Santa Rosa');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P14R2','','La base de la secuencia de rocas en la península de Santa Elena corresponde con el Complejo Acrecional de Santa Roca. Este se encuentra comprendido por un conjunto de rocas sedimentarias silíceas, o radiolaritas, producto de la acumulación de microorganismos muertos y rocas ígneas volcánicas conocidas como basaltos.','text',0);

INSERT INTO pages VALUES ('P15R2');
INSERT INTO map_points VALUES(2,15,'P15R2',10.85402, -85.85996,'La isla Colorada');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P15R2','','Entre la isla Colorada y las rocas de la costa se está formando una barra de arena, como resultado de la deriva litoral, esta barra una vez formada es llamada tómbolo.','text',0);

INSERT INTO pages VALUES ('P16R2');
INSERT INTO map_points VALUES(2,16,'P16R2',10.85262, -85.91207,'La erosión');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P16R2','','La erosión es el proceso de desintegración de las rocas en la superficie terrestre y puede ser provocado por el viento, la lluvia, los seres vivos y procesos fluviales, marítimos y glaciales.','text',0);

INSERT INTO pages VALUES ('P17R2');
INSERT INTO map_points VALUES(2,17,'P17R2',10.85607, -85.9103,'Basaltos del archipiélago Murciélago');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P17R2','','Este archipiélago está constituido principalmente por rocas basálticas que son rocas ígneas extruidas en el fondo oceánico. Tienen estructuras típicas en almohadilla como consecuencia de su rápido enfriamiento al estar en contacto con agua durante su emplazamiento.','text',0);

INSERT INTO pages VALUES ('P18R2');
INSERT INTO map_points VALUES(2,18,'P18R2',10.85919, -85.93745,'Otra vista de las islas Murciélago');
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page)
VALUES ('P18R2','','Las dunas fósiles o paleodunas son dunas que pasaron por un proceso de litificación o endurecimiento, formando rocas cuya principal característica es la estratificación cruzada de alto ángulo.','text',0);

-- Contenido del Mapa de península Santa Elena
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES
	('P1R2', '../../resources/travel/maps/2/01-1a.jpg','La Formación Descartes','image',0),
	('P1R2', '../../resources/travel/maps/2/01-1b.jpg','Inclinación típica de las rocas de la Formación Descartes','image',0),
	('P1R2', '../../resources/travel/maps/2/01-1c.jpg','Vegetación sobre las rocas de la Formación Descartes','image',0),
	('P1R2', '../../resources/travel/maps/2/01-1d.jpg','Rocas sedimentarias de la Formación Descartes','image',0),
	('P1R2', '../../resources/travel/maps/2/01-1e.jpg','Vegetación sobre las rocas de la Formación Descartes','image',0),
	('P1R2', '../../resources/travel/maps/2/01-1f.jpg','Capas de rocas','image',0),

	('P2R2', '../../resources/travel/maps/2/02-1.jpg','2-1	Mapa geológico de la península de Santa Elena. En color morado se aprecia la distribución de las peridotitas y rocas asociadas.','image',0),
	('P2R2', '../../resources/travel/maps/2/2-3.jpg','Vista a la península','image',0),

	('P3R2', '../../resources/travel/maps/2/03-1.jpg','Peridotita (roca verde, común en el manto de la Tierra), intruída o “cruzada” por un dique basáltico (roca gris, común en la superficie terrestre.).','image',0),
	('P3R2', '../../resources/travel/maps/2/03-1b.jpg','Vista bajo el microscopio de una peridotita.','image',0),
	('P3R2','https://www.youtube.com/watch?v=C_ps7PMQHIk','Vista a la Península','video',0),

	('P4R2', '../../resources/travel/maps/2/04-3 rudista.jpg','Rudista.','image',0),
	('P4R2', '../../resources/travel/maps/2/05-1.jpg','Estratos de la Formación Piedras Blancas','image',0),
	('P4R2', '../../resources/travel/maps/2/05-2.jpg','Estratos de la Formación Piedras Blancas','image',0),
	('P4R2', '../../resources/travel/maps/2/05-3.jpg','Estratos de la Formación Piedras Blancas','image',0),
	('P4R2', '../../resources/travel/maps/2/06-01.jpg','Columna estratigráfica','image',0),

	('P5R2', '../../resources/travel/maps/2/7-1.jpg','Intercalaciones de areniscas y lutitas típicas de la Formación Rivas, inclinadas hacia el Norte.','image',0),
	('P5R2', '../../resources/travel/maps/2/7-2.jpg','Intercalaciones de areniscas y lutitas típicas de la Formación Rivas, inclinadas hacia el Norte.','image',0),
	('P5R2', '../../resources/travel/maps/2/7-3.jpg','Intercalaciones de areniscas y lutitas típicas de la Formación Rivas, inclinadas hacia el Norte.','image',0),

	('P6R2', '../../resources/travel/maps/2/08-3a.jpg','Rocas sedimentarias dobladas','image',0),
	('P6R2', '../../resources/travel/maps/2/08-3b.jpg','Pliegue sinsedimentario','image',0),
	('P6R2', '../../resources/travel/maps/2/08-3c.jpg','Rocas sedimentarias dobladas','image',0),
	('P6R2', '../../resources/travel/maps/2/08-2.jpg','Columna estratigráfica','image',0),

	('P7R2', '../../resources/travel/maps/2/09-1.jpg','Pliegue sinsedimentario','image',0),

	('P8R2', '../../resources/travel/maps/2/10-1.jpg','Estratos inclinados','image',0),
	('P8R2', '../../resources/travel/maps/2/10-21.jpg','Estratos inclinados','image',0),

	('P9R2', '../../resources/travel/maps/2/11-1.jpg','Formación Descartes, rocas inclinados hacia el Norte','image',0),
	('P9R2', 'https://www.youtube.com/watch?v=0Z0Ny-iACVg&t','Formación Sedimentaria Descartes - ACG SINAC','video',0),

	('P10R2', '../../resources/travel/maps/2/12-2.jpg','Vista a los cerros de la península de Santa Elena','image',0),

	('P11R2', '../../resources/travel/maps/2/13-1a.jpg','Intrusiones de diabasas en peridotitas','image',0),
	('P11R2', '../../resources/travel/maps/2/13-1b.jpg','Intrusiones de diabasas en peridotitas','image',0),
	('P11R2', '../../resources/travel/maps/2/13-1c.jpg','Intrusiones de diabasas en peridotitas','image',0),

	('P12R2', '../../resources/travel/maps/2/14-1a.jpg','Brechas por fricción entre las rocas','image',0),
	('P12R2', '../../resources/travel/maps/2/14-1b.jpg','Brechas por fricción entre las rocas','image',0),
	('P12R2', '../../resources/travel/maps/2/14-1c.jpg','Brechas por fricción entre las rocas','image',0),
	
	('P13R2', '../../resources/travel/maps/2/15-1.jpg','Duna costera','image',0),

	('P14R2', '../../resources/travel/maps/2/16-1a.jpg','Complejo Acrecional de Santa Rosa','image',0),
	('P14R2', '../../resources/travel/maps/2/16-1b.jpg','Complejo Acrecional de Santa Rosa','image',0),
	('P14R2', '../../resources/travel/maps/2/16-2.jpg','Complejo Acrecional de Santa Rosa','image',0),

	('P15R2', '../../resources/travel/maps/2/17.png','Tómbolo','image',0),

	('P16R2', '../../resources/travel/maps/2/19-1.jpg','Arco en roca','image',0),
	('P16R2', '../../resources/travel/maps/2/19-2.jpg','Arco en roca','image',0),
	('P16R2', '../../resources/travel/maps/2/19-3.jpg','Arco en roca','image',0),

	('P17R2', '../../resources/travel/maps/2/20-1.jpg','Basaltos en almohadilla','image',0),
	('P17R2', '../../resources/travel/maps/2/20-1a.jpg','Basaltos en almohadilla','image',0),
	('P17R2', '../../resources/travel/maps/2/21-4.jpg','Duna costera','image',0),
	('P17R2', '../../resources/travel/maps/2/21-5.jpg','Duna costera','image',0),
	('P17R2', '../../resources/travel/maps/2/21-6.jpg','Duna costera','image',0),
	('P17R2', '../../resources/travel/maps/2/21-7.jpg','Duna costera','image',0),

	('P18R2', '../../resources/travel/maps/2/22-1.jpg','Paleoduna','image',0),
	('P18R2', '../../resources/travel/maps/2/22-2.jpg','Paleoduna','image',0),
	('P18R2', '../../resources/travel/maps/2/22-3.jpg','Paleoduna','image',0),
	('P18R2', '../../resources/travel/maps/2/22-4.jpg','Paleoduna','image',0);

-- Contenido de las Galerías
INSERT INTO contents (page_id, link_path, description, content_type, sequence_in_page) 
VALUES('gallery1','../../resources/gallery/Bolanos/Bajo Rojo20.jpg','Bajo Rojo','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Capas de roca inclinadas en la isla Bolanos.png','Capas de Roca inclinadas','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Concrecion.jpg','Concreción','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Duna activa.jpg','Duna Activa','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/El Gallito.png','El Gallito','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/El Muneco5.jpg','El Muñeco','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Estratos de la Formacion Junquillal5.jpg','Estratos de la Formación Junquillal','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Isla Bolanos1.jpg','Isla Bolaños','image',0),  	
	  ('gallery1','../../resources/gallery/Bolanos/Isla David12.jpg','Isla David','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Isla Despensa.jpg','Isla Despensa','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Isla Munecos.jpg','Isla Muñecos','image',0), 
	  ('gallery1','../../resources/gallery/Bolanos/Isla Munecos10.jpg','Isla Muñecos','image',0), 
	  ('gallery1','../../resources/gallery/Bolanos/Ondulitas.jpg','Isla Bolaños','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Pliegue sinsedimentario.jpg','Pliegue sinsedimentario','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Relictos de erosion.png','Relictos de erosión','image',0),
	  ('gallery1','../../resources/gallery/Bolanos/Relictos de erosion1.jpg','Relictos de erosión','image',0),
	  -- Santa Elena
	  ('gallery2','../../resources/gallery/SantaElena/Arco en roca de la isla San Jose.png','Arco en roca de la Isla San José','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Arco en roca.jpg','Arco en roca','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Cabo Santa Elena.jpg','Cabo Santa Elena','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Capas de roca inclinadas.png','Capas de roca inclinadas','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Duna activa.jpg','Duna activa','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/El Complejo Acrecional de Santa Rosa.jpg','El Complejo Acrecional de Santa Rosa','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Estratos de la Formacion Descartes.png','Estratos de la Formacion Descartes','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Estratos de la Formacion Descartes2.jpg','Estratos de la Formacion Descartes','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Estratos de la Formacion Rivas4.jpg','Estratos de la Formacion Rivas','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Estratos doblados de la Formacion Descartes3.jpg','Estratos doblados de la Formacion Descartes','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Formacion Descartes.png','Formacion Descartes','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Intrusiones y peridotitas.jpg','Intrusiones y peridotitas','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Paleo-duna.jpg','Paleo-duna','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Punta Blanca11.jpg','Punta Blanca','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Relicto de erosion.jpg','Relicto de erosion','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Vista a los cerros de la peninsula de Santa Elena.jpg','Vista a los cerros de la Península de Santa Elena','image',0),
	  ('gallery2','../../resources/gallery/SantaElena/Vista del macizo Orosi Cacao.png','Vista del macizo Orosi Cacao','image',0);