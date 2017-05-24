USE recorridos_geologicosdb;

-- Borramos las tuplas "viejas"
TRUNCATE TABLE map_points; 
TRUNCATE TABLE contents;
SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE TABLE pages;
SET FOREIGN_KEY_CHECKS = 1;

-- home & introduction
INSERT INTO pages VALUES ('home');
INSERT INTO pages VALUES ('introduction');
-- recorridos
INSERT INTO pages VALUES ('tourSantaElena');
INSERT INTO pages VALUES ('tourBolanos');
-- recomendaciones
INSERT INTO pages VALUES ('toursDescription');
-- recorrido Isla Bolaños 
INSERT INTO pages VALUES ('P1R1');
INSERT INTO pages VALUES ('P2R1');
INSERT INTO pages VALUES ('P3R1');
INSERT INTO pages VALUES ('P4R1');
INSERT INTO pages VALUES ('P5R1');
INSERT INTO pages VALUES ('P6R1');
INSERT INTO pages VALUES ('P7R1');
INSERT INTO pages VALUES ('P8R1');
INSERT INTO pages VALUES ('P9R1');
INSERT INTO pages VALUES ('P10R1');
INSERT INTO pages VALUES ('P11R1');
INSERT INTO pages VALUES ('P12R1');
INSERT INTO pages VALUES ('P13R1');
INSERT INTO pages VALUES ('P14R1');
INSERT INTO pages VALUES ('P15R1');
INSERT INTO pages VALUES ('P16R1');
INSERT INTO pages VALUES ('P17R1');
INSERT INTO pages VALUES ('P18R1');
INSERT INTO pages VALUES ('P19R1');
INSERT INTO pages VALUES ('P20R1');
INSERT INTO pages VALUES ('P21R1');
INSERT INTO pages VALUES ('P22R1');
INSERT INTO pages VALUES ('P23R1');
INSERT INTO pages VALUES ('P24R1');
INSERT INTO pages VALUES ('P25R1');
-- recorrido Península de Santa Elena
INSERT INTO pages VALUES ('P1R2');
INSERT INTO pages VALUES ('P2R2');
INSERT INTO pages VALUES ('P3R2');
INSERT INTO pages VALUES ('P4R2');
INSERT INTO pages VALUES ('P5R2');
INSERT INTO pages VALUES ('P6R2');
INSERT INTO pages VALUES ('P7R2');
INSERT INTO pages VALUES ('P8R2');
INSERT INTO pages VALUES ('P9R2');
INSERT INTO pages VALUES ('P10R2');
INSERT INTO pages VALUES ('P11R2');
INSERT INTO pages VALUES ('P12R2');
INSERT INTO pages VALUES ('P13R2');
INSERT INTO pages VALUES ('P14R2');
INSERT INTO pages VALUES ('P15R2');
INSERT INTO pages VALUES ('P16R2');
INSERT INTO pages VALUES ('P17R2');
INSERT INTO pages VALUES ('P18R2');
INSERT INTO pages VALUES ('P19R2');
INSERT INTO pages VALUES ('P20R2');
INSERT INTO pages VALUES ('P21R2');
INSERT INTO pages VALUES ('P22R2');
INSERT INTO pages VALUES ('P23R2');
INSERT INTO pages VALUES ('P24R2');
INSERT INTO pages VALUES ('P25R2');
INSERT INTO pages VALUES ('P26R2');

-- recorrido Isla Bolaños
INSERT INTO map_points VALUES(1,1,'P1R1',-85.709020,10.951780,'No asignado');
INSERT INTO map_points VALUES(1,2,'P2R1',-85.714920,10.951480,'Secuencia de estratos sedimentarios');
INSERT INTO map_points VALUES(1,3,'P3R1',-85.733630,10.957080,'Rocas sedimentarias de Bajo Rojo');
INSERT INTO map_points VALUES(1,4,'P4R1',-85.727130,10.969880,'No asignado');
INSERT INTO map_points VALUES(1,5,'P5R1',-85.717800,10.977700,'Calizas de isla Muñecos y alrededores');
INSERT INTO map_points VALUES(1,6,'P6R1',-85.717790,10.981760,'No asignado');
INSERT INTO map_points VALUES(1,7,'P7R1',-85.719070,10.982170,'Isla Muñecos');
INSERT INTO map_points VALUES(1,8,'P8R1',-85.718900,10.983900,'Plegamiento de estratos de calizas');
INSERT INTO map_points VALUES(1,9,'P9R1',-85.748100,11.001680,'Estratificación cruzada en isla Despensa');
INSERT INTO map_points VALUES(1,10,'P10R1',-85.748580,11.036130,'Vista del complejo Orosí – Cacao');
INSERT INTO map_points VALUES(1,11,'P11R1',-85.738710,11.038130,'El dragón de roca');
INSERT INTO map_points VALUES(1,12,'P12R1',-85.741690,11.044810,'La meteorización');
INSERT INTO map_points VALUES(1,13,'P13R1',-85.738060,11.046230,'Duna costera');
INSERT INTO map_points VALUES(1,14,'P14R1',-85.726660,11.048830,'Conglomerado');
INSERT INTO map_points VALUES(1,15,'P15R1',-85.721900,11.045760,'Duna costera');
INSERT INTO map_points VALUES(1,16,'P16R1',-85.708350,11.046530,'Conglomerado');
INSERT INTO map_points VALUES(1,17,'P17R1',-85.707580,11.046670,'No asignado');
INSERT INTO map_points VALUES(1,18,'P18R1',-85.707380,11.046950,'Rocas de la Formación Descartes');
INSERT INTO map_points VALUES(1,19,'P19R1',-85.707220,11.047210,'Pares conjugados producto de la compresión');
INSERT INTO map_points VALUES(1,20,'P20R1',-85.707130,11.048900,'Rocas de la Formación Junquillal');
INSERT INTO map_points VALUES(1,21,'P21R1',-85.707260,11.048980,'No asignado');
INSERT INTO map_points VALUES(1,22,'P22R1',-85.707280,11.049030,'No asignado');
INSERT INTO map_points VALUES(1,23,'P23R1',-85.707730,11.049180,'No asignado');
INSERT INTO map_points VALUES(1,24,'P24R1',-85.708200,11.049260,'No asignado');
INSERT INTO map_points VALUES(1,25,'P25R1',-85.708650,11.049330,'No asignado');
-- recorrido Santa Elena
INSERT INTO map_points VALUES(2,1,'P1R2',-85.709450,10.951240,'No asignado');
INSERT INTO map_points VALUES(2,2,'P2R2',-85.774040,10.940810,'Estratos de la Formación Descartes');
INSERT INTO map_points VALUES(2,3,'P3R2',-85.802090,10.940750,'Estratos de la Formación Descartes');
INSERT INTO map_points VALUES(2,4,'P4R2',-85.800620,10.967120,'Diferencias en la vegetación según el tipo de roca');
INSERT INTO map_points VALUES(2,5,'P5R2',-85.801950,10.913380,'Rocas del manto');
INSERT INTO map_points VALUES(2,6,'P6R2',-85.818710,10.924490,'Rocas de la Formación Santa Ana');
INSERT INTO map_points VALUES(2,7,'P7R2',-85.818240,10.925990,'Rocas de la Formación Piedras Blancas');
INSERT INTO map_points VALUES(2,8,'P8R2',-85.819470,10.927920,'Rocas de la Formación Rivas');
INSERT INTO map_points VALUES(2,9,'P9R2',-85.786930,10.917530,'Rocas de la Formación Rivas');
INSERT INTO map_points VALUES(2,10,'P10R2',-85.810370,10.936450,'Rocas de la Formación Descartes');
INSERT INTO map_points VALUES(2,11,'P11R2',-85.875000,10.950200,'No asignado');
INSERT INTO map_points VALUES(2,12,'P12R2',-85.883960,10.950160,'Estratos inclinados');
INSERT INTO map_points VALUES(2,13,'P13R2',-85.874380,10.940150,'Formación Descartes, estratos inclinados hacia el Norte');
INSERT INTO map_points VALUES(2,14,'P14R2',-85.877490,10.931710,'No asignado');
INSERT INTO map_points VALUES(2,15,'P15R2',-85.911000,10.911000,'Intrusiones en peridotitas');
INSERT INTO map_points VALUES(2,16,'P16R2',-85.949440,10.893430,'Intrusiones en peridotitas');
INSERT INTO map_points VALUES(2,17,'P17R2',-85.931880,10.892630,'Brechas producto del sobrecorrimiento del nappe de Santa Elena.');
INSERT INTO map_points VALUES(2,18,'P18R2',-85.926040,10.894280,'Brechas producto del sobrecorrimiento del nappe de Santa Elena.');
INSERT INTO map_points VALUES(2,19,'P19R2',-85.899800,10.884000,'No asignado');
INSERT INTO map_points VALUES(2,20,'P20R2',-85.879100,10.880000,'Rocas del Complejo Acrecional de Santa Rosa');
INSERT INTO map_points VALUES(2,21,'P21R2',-85.859960,10.854020,'No asignado');
INSERT INTO map_points VALUES(2,22,'P22R2',-85.859100,10.848000,'No asignado');
INSERT INTO map_points VALUES(2,23,'P23R2',-85.908640,10.853700,'Arco en roca');
INSERT INTO map_points VALUES(2,24,'P24R2',-85.908950,10.855160,'Basaltos del archipiélago Murciélago');
INSERT INTO map_points VALUES(2,25,'P25R2',-85.910300,10.856070,'Duna costera');
INSERT INTO map_points VALUES(2,26,'P26R2',-85.937450,10.859190,'Paleo-duna');

-- home
INSERT INTO contents VALUES (1, 'home', '../resources/home/carousel/01.png', '', 'image', 0);
INSERT INTO contents VALUES (2, 'home', '../resources/home/carousel/02.png', '', 'image', 0);
INSERT INTO contents VALUES (3, 'home', '../resources/home/carousel/03.png', '', 'image', 0);
INSERT INTO contents VALUES (4, 'home', '../resources/home/carousel/04.png', '', 'image', 0);
INSERT INTO contents VALUES (5, 'home', '../resources/home/carousel/arco_en_roca.png', '', 'image', 0);
INSERT INTO contents VALUES (6, 'home', '../resources/home/carousel/el_gallito.png', '', 'image', 0);
INSERT INTO contents VALUES (7, 'home', '../resources/home/carousel/estratos_descartes.png', '', 'image', 0);
INSERT INTO contents VALUES (8, 'home', '../resources/home/carousel/macizo_orosi.png', '', 'image', 0);
INSERT INTO contents VALUES (9, 'home', '../resources/home/main_message.txt', 'El litoral Pacífico Norte de Costa Rica ofrece sitios turísticos de importancia geológica, como lo son la Isla Bolaños y la Península de Santa Elena, con diversos orígenes y lugares por conocer.', 'text', 1);

-- introduction
INSERT INTO contents VALUES (10, 'introduction', '../resources/intro/parrafo1.txt','La geología es la ciencia que estudia las rocas, desde el punto de vista de composición, origen, procesos que las afectan antes, durante y después de su formación y edad. Además, de estudios aplicados como su capacidad hídrica y geomecánica. Costa Rica presenta rocas de diversos orígenes, con edades que abarcan desde 163 – 170 millones de años (Jurásico Medio) hasta la actualidad (Cuaternario).', 'text', 1);
INSERT INTO contents VALUES (11, 'introduction', '../resources/intro/parrafo2.txt','Actualmente los recorridos centran su atención dentro del Área de Conservación Guanacaste, incluyendo sitios como: La península de Santa Elena, la isla Bolaños, el archipiélago Murciélago, bahía Santa Elena, playa Naranjo, entre otros. Siendo todos estos territorios declarados Patrimonio de la Humanidad (UNESCO, 1999, id N°928).', 'text', 2);
INSERT INTO contents VALUES (12, 'introduction', '../resources/intro/parrafo3.txt','En el litoral Norte de la costa Pacífica de Costa Rica, la geología representa un elemento principal del paisaje, siendo de provecho para proyectos en varias áreas de interés como: educación, turismo y divulgación y concienciación de los parques nacionales.', 'text', 3);
INSERT INTO contents VALUES (13, 'introduction', '../resources/intro/parrafo4.txt','La principal actividad económica de la zona es la pesca, por tanto, la importancia del desarrollo de otras actividades como el geoturismo, proveyendo a los pobladores cercanos empleos directos e indirectos, fomentado el desarrollo de la economía y para los visitantes recreación y el rescate de valores patrimoniales de Costa Rica, desde el punto de vista geológico.', 'text', 3);
INSERT INTO contents VALUES (14, 'introduction', '../resources/intro/parrafo5.txt','Al día de hoy se realizan dos recorridos diferentes: Península de Santa Elena y alrededores e Isla Bolaños y Alrededores', 'text', 4);
INSERT INTO contents VALUES (15, 'introduction', '../resources/intro/background_images/01.png', '', 'image', 1);
INSERT INTO contents VALUES (16, 'introduction', '../resources/intro/background_images/02.png', '', 'image', 2);
INSERT INTO contents VALUES (17, 'introduction', '../resources/intro/background_images/03.png', '', 'image', 3);
INSERT INTO contents VALUES (18, 'introduction', '../resources/intro/background_images/04.png', '', 'image', 4);

-- tourBolanos
INSERT INTO contents VALUES (23, 'tourBolanos', '../resources/travel/bolanos/bolanos.png', '', 'image', 0);
INSERT INTO contents VALUES (24, 'tourBolanos', '../resources/travel/bolanos/bolanos.txt', 'En la Isla Bolaños y sus cercanías se visualizan rocas sedimentarias, específicamente intercalaciones areniscas y lutitas reflejadas en las formaciones Descartes y Bolaños, moldeadas en el talud continental. Además se encuentran depósitos de arena de playa recientes, comprendiendo más de 40 millones de años de historia.', 'text', 0);
INSERT INTO contents VALUES (110, 'tourBolanos', 'http://www.geologia.ucr.ac.cr/revista/revista/to_pdf/revista/01/01-BAUMGARTNERETAL.pdf','Sedimentación y Paleogeografía del Cretácico y Cenozoico del litoral Pacífico de Costa Rica', 'url', 0);
-- tourBolanos contents
INSERT INTO contents VALUES(26,'P2R1','../../resources/travel/maps/1/Punto1-1. Estratos Rocosos.jpg','Secuencia de estratos rocosos','image',0);
INSERT INTO contents VALUES(27,'P3R1','../../resources/travel/maps/1/Punto2-1. Bajo Rojo.jpg','Rocas sedimentarias de Bajo Rojo','image',0);
INSERT INTO contents VALUES(28,'P5R1','../../resources/travel/maps/1/Punto4-1. Calizas.jpg','Arrecifes coralinos fosilizados','image',0);
INSERT INTO contents VALUES(29,'P6R1','../../resources/travel/maps/1/Punto5-1.jpg','','image',0);
INSERT INTO contents VALUES(30,'P6R1','../../resources/travel/maps/1/Punto5-2.jpg','','image',0);
INSERT INTO contents VALUES(31,'P7R1','../../resources/travel/maps/1/Punto6-1.jpg','','image',0);
INSERT INTO contents VALUES(32,'P7R1','../../resources/travel/maps/1/Punto6-2.jpg','','image',0);
INSERT INTO contents VALUES(33,'P8R1','../../resources/travel/maps/1/Punto7-1. Estratos Volcados.jpg','Plegamiento de estratos de calizas','image',0);
INSERT INTO contents VALUES(34,'P9R1','../../resources/travel/maps/1/Punto8-1. Estratificacion.jpg','Estratificación cruzada en isla Despensa','image',0);
INSERT INTO contents VALUES(35,'P10R1','../../resources/travel/maps/1/Punto9-1. Vista Orosi-Cacao.jpg','Vista del complejo Orosí – Cacao','image',0);
INSERT INTO contents VALUES(36,'P11R1','../../resources/travel/maps/1/Punto10-1. El Dragon de Roca.jpg','','image',0);
INSERT INTO contents VALUES(37,'P11R1','../../resources/travel/maps/1/Punto10-2.jpg','El dragon de roca','image',0);
INSERT INTO contents VALUES(38,'P12R1','../../resources/travel/maps/1/Punto11-1. Estratos Rocosos.jpg','Intercalaciones de estratos rocosos','image',0);
INSERT INTO contents VALUES(39,'P12R1','../../resources/travel/maps/1/Punto11-2.jpg','','image',0);
INSERT INTO contents VALUES(40,'P13R1','../../resources/travel/maps/1/Punto12-1. Duna Costera.jpg','Duna costera','image',0);
INSERT INTO contents VALUES(41,'P14R1','../../resources/travel/maps/1/Punto13-1. Conglomerado.jpg','Conglomerado','image',0);
INSERT INTO contents VALUES(42,'P15R1','../../resources/travel/maps/1/Punto14-1. Duna Costera.jpg','Duna costera','image',0);
INSERT INTO contents VALUES(43,'P16R1','../../resources/travel/maps/1/Punto15-1. Conglomerado.jpg','Conglomerado','image',0);
INSERT INTO contents VALUES(44,'P16R1','../../resources/travel/maps/1/Punto15-2.jpg','','image',0);
INSERT INTO contents VALUES(45,'P16R1','../../resources/travel/maps/1/Punto15-3. Estratos Rocosos.jpg','Secuencia de estratos rocosos','image',0);
INSERT INTO contents VALUES(46,'P16R1','../../resources/travel/maps/1/Punto15-4. Pares Conjugados.jpg','Pares conjugados producto de la compresión','image',0);
INSERT INTO contents VALUES(47,'P20R1','../../resources/travel/maps/1/Punto19-1. Estratificacion Cruzada.jpg','Estratificación cruzada curva','image',0);
INSERT INTO contents VALUES(48,'P20R1','../../resources/travel/maps/1/Punto19-2.jpg','','image',0);
INSERT INTO contents VALUES(49,'P20R1','../../resources/travel/maps/1/Punto19-3.jpg','','image',0);
INSERT INTO contents VALUES(50,'P20R1','../../resources/travel/maps/1/Punto19-4.jpg','','image',0);
INSERT INTO contents VALUES(51,'P20R1','../../resources/travel/maps/1/Punto19-5.jpg','','image',0);
INSERT INTO contents VALUES(52,'P20R1','../../resources/travel/maps/1/Punto19-6.jpg','','image',0);
INSERT INTO contents VALUES(53,'P20R1','../../resources/travel/maps/1/Punto19-7.jpg','','image',0);
INSERT INTO contents VALUES(54,'P20R1','../../resources/travel/maps/1/Punto19-8.jpg','','image',0);

-- tourSantaElena
INSERT INTO contents VALUES (19, 'tourSantaElena', '../resources/travel/santa_elena/santa_elena.png', '', 'image', 0);
INSERT INTO contents VALUES (20, 'tourSantaElena', '../resources/travel/santa_elena/santa_elena.txt','La Península de Santa Elena se encuentra compuesta por rocas ígneas y sedimentarias. Las primeras corresponden a peridotitas formadas en el manto superior de la Tierra, mientras que, las últimas son calizas e intercalaciones de areniscas y lutitas, las formaciones de El Viejo, Santa Ana, Curú y Descartes, pertenecen respectivamente a esos tipos de roca generadas en el talud continental, contenidas en una historia geológica de más de 100 millones de años, culminando en Isla Bolaños.', 'text', 0);
INSERT INTO contents VALUES (21, 'tourSantaElena', 'http://revistes.ub.edu/index.php/GEOACTA/article/view/105.000000365/4199','Magmatic and geotectonic significance of Santa Elena Peninsula, Costa Rica', 'url', 0);
INSERT INTO contents VALUES (22, 'tourSantaElena', 'http://revistes.ub.edu/index.php/GEOACTA/article/view/105.000000364/4198','Evidence for middle Cretaceous accretion at Santa Elena Peninsula (Santa Rosa Accretionary Complex), Costa Rica', 'url', 1);
-- tourSantaElena contents
INSERT INTO contents VALUES(55,'P1R2','../../resources/travel/maps/2/Punto1-1. Columna Estratigrafica.jpg','Columna Estratigrafica','image',0);
INSERT INTO contents VALUES(56,'P1R2','../../resources/travel/maps/2/Punto1-2.jpg','','image',0);
INSERT INTO contents VALUES(57,'P1R2','../../resources/travel/maps/2/Punto1-3.jpg','','image',0);
INSERT INTO contents VALUES(58,'P1R2','../../resources/travel/maps/2/Punto1-4.jpg','','image',0);
INSERT INTO contents VALUES(59,'P1R2','../../resources/travel/maps/2/Punto1-5.jpg','','image',0);
INSERT INTO contents VALUES(60,'P1R2','../../resources/travel/maps/2/Punto1-6.jpg','','image',0);
INSERT INTO contents VALUES(61,'P1R2','../../resources/travel/maps/2/Punto1-7.jpg','','image',0);
INSERT INTO contents VALUES(62,'P3R2','../../resources/travel/maps/2/Punto3-1. Peridotita.jpg','Peridotita (roca verde, común en el manto de la Tierra), intruída o “cruzada” por un dique basáltico (roca gris, común en la superficie terrestre.)','image',0);
INSERT INTO contents VALUES(63,'P3R2','../../resources/travel/maps/2/Punto3-2. Microscopio Peridotita.jpg','Vista bajo el microscopio de una peridotita','image',0);
INSERT INTO contents VALUES(64,'P5R2','../../resources/travel/maps/2/Punto5-1. Piedras Blancas.jpg','Estratos de la Formación Piedras Blancas','image',0);
INSERT INTO contents VALUES(65,'P7R2','../../resources/travel/maps/2/Punto7-1. Areniscas y Lutitas.jpg','Intercalaciones de areniscas y lutitas típicas de la Formación Rivas, inclinadas hacia el Norte','image',0);
INSERT INTO contents VALUES(66,'P8R2','../../resources/travel/maps/2/Punto8-1. Formacion Descartes.jpg','Estratos de la Formación Descartes','image',0);
INSERT INTO contents VALUES(67,'P8R2','../../resources/travel/maps/2/Punto8-2. Formacion Descartes.jpg','Estratos de la Formación Descartes','image',0);
INSERT INTO contents VALUES(68,'P8R2','../../resources/travel/maps/2/Punto8-3. Formacion Descartes.jpg','Estratos de la Formación Descartes','image',0);
INSERT INTO contents VALUES(69,'P9R2','../../resources/travel/maps/2/Punto9-1.jpg','','image',0);
INSERT INTO contents VALUES(70,'P10R2','../../resources/travel/maps/2/Punto10-1. Estratos Inclinados.jpg','Estratos inclinados','image',0);
INSERT INTO contents VALUES(71,'P11R2','../../resources/travel/maps/2/Punto11-1. Formacion Descartes.jpg','Formación Descartes, estratos inclinados hacia el Norte','image',0);
INSERT INTO contents VALUES(72,'P13R2','../../resources/travel/maps/2/Punto13-1. Peridotita.jpg','Peridotita con intrusiones','image',0);
INSERT INTO contents VALUES(73,'P13R2','../../resources/travel/maps/2/Punto13-2. Peridotita.jpg','Peridotita con intrusiones','image',0);
INSERT INTO contents VALUES(74,'P13R2','../../resources/travel/maps/2/Punto13-3. Peridotita.jpg','Peridotita con intrusiones','image',0);
INSERT INTO contents VALUES(75,'P14R2','../../resources/travel/maps/2/Punto14-1.jpg','Brechas producto del sobrecorrimiento del nappe de Santa Elena','image',0);
INSERT INTO contents VALUES(76,'P14R2','../../resources/travel/maps/2/Punto14-2.jpg','Brechas producto del sobrecorrimiento del nappe de Santa Elena','image',0);
INSERT INTO contents VALUES(77,'P15R2','../../resources/travel/maps/2/Punto15-1. Duna Costera.jpg','Duna costera','image',0);
INSERT INTO contents VALUES(78,'P16R2','../../resources/travel/maps/2/Punto16-1.jpg','','image',0);
INSERT INTO contents VALUES(79,'P16R2','../../resources/travel/maps/2/Punto16-2.jpg','Complejo Acrecional de Santa Rosa','image',0);
INSERT INTO contents VALUES(80,'P16R2','../../resources/travel/maps/2/Punto16-3.jpg','Complejo Acrecional de Santa Rosa','image',0);
INSERT INTO contents VALUES(81,'P19R2','../../resources/travel/maps/2/Punto19-1. Arco en roca.jpg','Arco en roca','image',0);
INSERT INTO contents VALUES(82,'P21R2','../../resources/travel/maps/2/Punto21-1.jpg','Basaltos en almohadilla','image',0);
INSERT INTO contents VALUES(83,'P21R2','../../resources/travel/maps/2/Punto21-2.jpg','Basaltos en almohadilla','image',0);
INSERT INTO contents VALUES(84,'P21R2','../../resources/travel/maps/2/Punto21-3.jpg','Duna costera','image',0);
INSERT INTO contents VALUES(85,'P22R2','../../resources/travel/maps/2/Punto22-1.jpg','Paleo-duna','image',0);

-- recomendaciones
INSERT INTO contents VALUES (86, 'toursDescription', '../resources/travel/general/titulo.txt', 'Esperamos que el recorrido sea de su agrado, algunas recomendaciones de seguridad:', 'text', 0);
INSERT INTO contents VALUES (87, 'toursDescription', '../resources/travel/general/sugerencia1.txt', 'Utilizar sombrero o gorra y chaleco flotador.', 'text', 0);
INSERT INTO contents VALUES (88, 'toursDescription', '../resources/travel/general/sugerencia2.txt', 'Proteger la piel con bloqueador solar.', 'text', 0);
INSERT INTO contents VALUES (89, 'toursDescription', '../resources/travel/general/sugerencia3.txt', 'Mantenerse en su asiento durante el viaje.', 'text', 0);
INSERT INTO contents VALUES (90, 'toursDescription', '../resources/travel/general/sugerencia4.txt', 'Evitar sacar los brazos o piernas del bote.', 'text', 0);
INSERT INTO contents VALUES (91, 'toursDescription', '../resources/travel/general/sugerencia5.txt', 'Bajarse del bote solo si el botero se lo indica.', 'text', 0);
INSERT INTO contents VALUES (92, 'toursDescription', '../resources/travel/general/security.png', '', 'image', 0);

INSERT INTO contents VALUES(166,'P2R1','','Intercalaciones de areniscas gruesas con cemento carbonático y areniscas finas.','text',0);
INSERT INTO contents VALUES(167,'P5R1','','Las calizas de isla Muñecos, son características por estar establecidas a partir de bioconstrucciones, es decir corales que formaron arrecifes.','text',0);
INSERT INTO contents VALUES(168,'P12R1','','Uno de los procesos más importantes por los que, atraviesan las rocas desde su formación es la meteorización, siendo esta un medio físico o químico capaz de afectar a las rocas. Meteorización física por oleaje y química por reacción del agua con sus constituyentes.','text',0);
INSERT INTO contents VALUES(169,'P18R1','','Son una secuencia de estratos de rocas sedimentarias inclinados, de origen marino profundo, generadas por corrientes de turbidez o turbiditas distales.','text',0);
INSERT INTO contents VALUES(170,'P20R1','','Son rocas sedimentarias de diversas granulometrías, de génesis somera y que evidencian regímenes de alta energía, como las Tempestitas','text',0);


INSERT INTO contents VALUES(172,'P2R2','','La Formación Descartes, es una formación sedimentaria compuesta de intercalaciones de areniscas y lutitas. Estas intercalaciones son como un libro, cuyas hojas develan la historia de la Tierra.','text',0);
INSERT INTO contents VALUES(173,'P3R2','','La Formación Descartes, es una formación sedimentaria compuesta de intercalaciones de areniscas y lutitas. Estas intercalaciones son como un libro, cuyas hojas develan la historia de la Tierra.','text',0);
INSERT INTO contents VALUES(174,'P4R2','','En la península de Santa Elena es común encontrar diferencias en el tamaño de la vegetación, debido a las variaciones geológicas en las rocas que afloran sobre esta. La mayor parte de la península se encuentra cubierta por peridotitas, estás son rocas ultramáficas típicas del manto de la Tierra, de ahí que tengan altos contenidos de magnesio (alcanzan hasta un 30%, del total de la roca). Estos altos contenidos son la razón principal de que la vegetación no desarrolle grandes tamaños.','text',0);
INSERT INTO contents VALUES(175,'P6R2','','La Formación Santa Ana está compuesta de fragmentos de arrecifes de rudistas, formados sobre las peridotitas, y brechas volcánicas erosionadas.','text',0);
INSERT INTO contents VALUES(176,'P7R2','','Sobre la Formación Santa Ana, se ubica a la Formación Piedras Blancas, compuesta de rocas calcáreas finas de tonos rosados y blancos, generadas por la acumulación de organismos microscópicos como foraminíferos.','text',0);
INSERT INTO contents VALUES(177,'P8R2','','Son intercalaciones de areniscas y lutitas, típicas de flujos turbidíticos. Las areniscas son rocas sedimentarias con tamaño de grano variable entre 0,063 y 2 mm, mientras que las lutitas son de tamaños menores a los 0,063 mm.','text',0);
INSERT INTO contents VALUES(178,'P10R2','','Son una secuencia de estratos de rocas sedimentarias sobre la Formación Rivas, de origen marino profundo y generadas por corrientes de turbidez o turbiditas distales.','text',0);
INSERT INTO contents VALUES(179,'P17R1','','Bajo las peridotitas hay una brecha o roca con fragmentos angulosos flotando en una matriz, a consecuencia de la trituración de una roca preexistente por el desplazamiento de una unidad rocosa muy pesada, en este caso las peridotitas.','text',0);
INSERT INTO contents VALUES(180,'P18R1','','Bajo las peridotitas hay una brecha o roca con fragmentos angulosos flotando en una matriz, a consecuencia de la trituración de una roca preexistente por el desplazamiento de una unidad rocosa muy pesada, en este caso las peridotitas.','text',0);
INSERT INTO contents VALUES(181,'P20R1','','La base de la secuencia de rocas en la península de Santa Elena corresponde con el Complejo Acrecional de Santa Roca. Este se encuentra comprendido por un conjunto de rocas sedimentarias silíceas, o radiolaritas, producto de la acumulación de microorganismos muertos.','text',0);
INSERT INTO contents VALUES(182,'P24R1','','Interdigitadas entre las peridotitas hay lavas, estas lavas son diabasas. Conocidos como basaltos en almohadilla por sus formas típicas, a consecuencia de su rápido enfriamiento al estar en contacto con agua durante su emplazamiento.','text',0);

-- Vídeos de Santa Elena
INSERT INTO contents VALUES(183,'P11R2','https://www.youtube.com/watch?v=0Z0Ny-iACVg','Formación Descartes','video',0);
