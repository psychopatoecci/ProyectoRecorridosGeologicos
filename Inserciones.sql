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
INSERT INTO contents VALUES (8, 'home', 'resources/home/carousel/macizo_orosi.png', '', 'text', 0);
INSERT INTO contents VALUES (9, 'home', 'resources/home/main_message.txt', '', 'text', 1);
INSERT INTO contents VALUES (11, 'introduction', 'resources/intro/parrafo1.txt','', 'text', 1);
INSERT INTO contents VALUES (12, 'introduction', 'resources/intro/parrafo2.txt','', 'text', 2);
INSERT INTO contents VALUES (13, 'introduction', 'resources/intro/parrafo3.txt','', 'text', 3);
INSERT INTO contents VALUES (14, 'introduction', 'resources/intro/parrafo4.txt','', 'text', 4);
