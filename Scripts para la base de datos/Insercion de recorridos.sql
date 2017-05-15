-- Project: A través de la historia geológica
-- Update of contents in the DB.

USE recorridos_geologicosdb;


-- Insertions
INSERT INTO pages VALUES ('tour_santa_elena');
INSERT INTO pages VALUES ('tour_bolanos');


INSERT INTO contents VALUES (104, 'tour_santa_elena', '../resources/travel/santa_elena/santa_elena.png', '', 'image', 0);
INSERT INTO contents VALUES (105, 'tour_santa_elena', '../resources/travel/santa_elena/santa_elena.txt','La península de Santa Elena se encuentra compuesta por rocas ígneas y sedimentarias. Las primeras corresponden a peridotitas formadas en el manto superior de la Tierra, mientras que, las últimas son calizas e intercalaciones de areniscas y lutitas, las formaciones de El Viejo, Santa Ana, Curú y Descartes, pertenecen respectivamente a esos tipos de roca generadas en el talud continental, contenidas en una historia geológica de más de 100 millones de años, culminando en Isla Bolaños.', 'text', 0);
INSERT INTO contents VALUES (106, 'tour_santa_elena', 'http://revistes.ub.edu/index.php/GEOACTA/article/download/105.000000365/4199','Magmatic and geotectonic significance of Santa Elena Peninsula, Costa Rica', 'url', 0);
INSERT INTO contents VALUES (107, 'tour_santa_elena', 'http://revistes.ub.edu/index.php/GEOACTA/article/download/105.000000364/4198','Evidence for middle Cretaceous accretion at Santa Elena Peninsula (Santa Rosa Accretionary Complex), Costa Rica', 'url', 1);

INSERT INTO contents VALUES (108, 'tour_bolanos', '../resources/travel/bolanos/bolanos.png', '', 'image', 0);
INSERT INTO contents VALUES (109, 'tour_bolanos', '../resources/travel/bolanos/bolanos.txt', 'En la isla Bolaños y sus cercanías se visualizan rocas sedimentarias, específicamente intercalaciones areniscas y lutitas reflejadas en las formaciones Descartes y Bolaños, moldeadas en el talud continental. Además se encuentran depósitos de arena de playa recientes, comprendiendo más de 40 millones de años de historia.', 'text', 0);
INSERT INTO contents VALUES (110, 'tour_bolanos', 'http://www.geologia.ucr.ac.cr/revista/revista/to_pdf/revista/01/01-BAUMGARTNERETAL.pdf','', 'url', 0);

