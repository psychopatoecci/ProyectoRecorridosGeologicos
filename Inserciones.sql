-- Project: A través de la historia geológica
-- Update of contents in the DB.

USE recorridos_geologicosdb;

-- Update 'contents' table
UPDATE contents 
SET page_id = 'home', link_path = 'resources/home/carousel/01.png', content_type = 'image'
WHERE id = 1;

UPDATE contents 
SET page_id = 'home', link_path = 'resources/home/carousel/02.png', content_type = 'image'
WHERE id = 2;

UPDATE contents 
SET page_id = 'home', link_path = 'resources/home/carousel/03.png', content_type = 'image'
WHERE id = 3;

UPDATE contents 
SET page_id = 'home', link_path = 'resources/home/carousel/04.png', content_type = 'image'
WHERE id = 4;

UPDATE contents 
SET page_id = 'home', link_path = 'resources/home/carousel/arco_en_roca.png', content_type = 'image'
WHERE id = 5;

UPDATE contents 
SET page_id = 'home', link_path = 'resources/home/carousel/el_gallito.png', content_type = 'image'
WHERE id = 6;

UPDATE contents 
SET page_id = 'home', link_path = 'resources/home/carousel/estratos_descartes.png', content_type = 'image'
WHERE id = 7;

-- Insertions
INSERT INTO contents VALUES (8, 'home', 'resources/home/carousel/macizo_orosi.png', '', 'image', 0);
INSERT INTO contents VALUES (9, 'home', 'resources/home/main_message.txt', 'El litoral Pacífico Norte de Costa Rica ofrece sitios turísticos de importancia geológica, como lo son la Isla Bolaños y la Península de Santa Elena, con diversos orígenes y lugares por conocer.', 'text', 1);
INSERT INTO contents VALUES (11, 'introduction', 'resources/intro/parrafo1.txt','La geología es la ciencia que estudia las rocas, desde el punto de vista de composición, origen, procesos que las afectan antes, durante y después de su formación y edad. Además, de estudios aplicados como su capacidad hídrica y geomecánica. Costa Rica presenta rocas de diversos orígenes, con edades que abarcan desde 163 – 170 millones de años (Jurásico Medio) hasta la actualidad (Cuaternario).', 'text', 1);
INSERT INTO contents VALUES (12, 'introduction', 'resources/intro/parrafo2.txt','Actualmente los recorridos centran su atención dentro del Área de Conservación Guanacaste, incluyendo sitios como: La península de Santa Elena, la isla Bolaños, el archipiélago Murciélago, bahía Santa Elena, playa Naranjo, entre otros. Siendo todos estos territorios declarados Patrimonio de la Humanidad (UNESCO, 1999, id N°928).', 'text', 2);
INSERT INTO contents VALUES (13, 'introduction', 'resources/intro/parrafo3.txt','En el litoral Norte de la costa Pacífica de Costa Rica, la geología representa un elemento principal del paisaje, siendo de provecho para proyectos en varias áreas de interés como: educación, turismo y divulgación y concienciación de los parques nacionales.
La principal actividad económica de la zona es la pesca, por tanto, la importancia del desarrollo de otras actividades como el geoturismo, proveyendo a los pobladores cercanos empleos directos e indirectos, fomentado el desarrollo de la economía y para los visitantes recreación y el rescate de valores patrimoniales de Costa Rica, desde el punto de vista geológico.', 'text', 3);
INSERT INTO contents VALUES (14, 'introduction', 'resources/intro/parrafo4.txt','Al día de hoy se realizan dos recorridos diferentes:
Península de Santa Elena y alrededores
Isla Bolaños y Alrededores', 'text', 4);
