<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Admin Controller
 *
 * @property \App\Model\Table\AdminTable $Admin */
class AdminController extends AppController
{

private function verify_image_file() {
        //Verificar y actualizar la base
        if(is_uploaded_file($_FILES['imagen_fondo']['tmp_name'])) {
            
            //Verificacion del tamano. 
            if ($_FILES['imagen_fondo']['size'] > 5*1024*1024) {
                $msj_error = "La imagen excede el tamaño máximo permitido.";
                return array("error" => $msj_error);
            }
            
            $extension = "";
            $fh=fopen($_FILES['imagen_fondo']['tmp_name'],'rb');
            if ($fh) { 
                $bytes6=fread($fh,6);
                fclose($fh); 
                if (!($bytes6===false)){
                    if (substr($bytes6,0,3)=="\xff\xd8\xff") {
                        $extension = 'jpg';
                    }
                    if ($bytes6=="\x89PNG\x0d\x0a"){
                        $extension = 'png';
                    }
                }
            }
            
            if (!$extension) {
                $msj_error = "El archivo subido no tiene el formato adecuado (jpg, png).";
                return array("error" => $msj_error);
            }

            //No hubo error
            return array("extension" => $extension);
           
        } else {
            $msj_error = "Error al intentar subir la imagen '". $_FILES['imagen_fondo']['tmp_name']."'. Pudo haber ocurrido un ataque.";;
            return array("error" => $msj_error);
        }
    }
    
    /**
     * Admin Information method.
     * Created by Josin Madrigal.
     * [GET]  Gets contents to display in view.
     * [POST] Updates database.
     * @return \Cake\Network\Response|null
     */  
    public function information() 
    {
        $this->set('title', 'Administración de Información General');
        $this->viewBuilder()->layout("defaultAdmin");
        $this->loadModel('Pages');
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(is_uploaded_file($_FILES['imagen_fondo']['tmp_name'])) {
                if (isset($_POST['image_id'])) {

                    $imFile = $this->verify_image_file();
                    if (isset($imFile["error"])) {
                        $this->Flash->error($imFile["error"]);
                    }else{

                        //Se guarda la imagen en el directorio
                        $image = $this->Pages->Contents->get($_POST['image_id']);
                        $path = str_replace("..", "webroot", $image->link_path);

                        if (!move_uploaded_file($_FILES['imagen_fondo']['tmp_name'], $path)) {

                            $msj_error = "Error al intentar subir la imagen '". $_FILES['imagen_fondo']['tmp_name']."'. Pudo haber ocurrido un ataque.";;
                            $this->Flash->error($msj_error);

                        } else {

                            if(!strpos($image->link_path, $imFile["extension"])){
                                //Si la extension es diferente se actualiza la base con la nueva extension
                                $image->link_path = preg_replace('/(png|jpg)$/i', $imFile["extension"], $image->link_path);
                                if (!$this->Pages->Contents->save($image)) {
                                    $this->Flash->error("Error al intentar guardar la imagen");
                                }
                                
                            }
                        }
                    }
                }
            }

            if (isset($_POST['text_id'])) {
                $text = $this->Pages->Contents->get($_POST['text_id']);
                $text->description = $_POST['descripcion'];
                if ($this->Pages->Contents->save($text)) {
                    $this->Flash->success("Cambios guardados");
                }

                if (isset($_POST['text2_id'])) {
                    $text = $this->Pages->Contents->get($_POST['text2_id']);
                    $text->description = $_POST['descripcion2'];
                    $this->Pages->Contents->save($text);
                }

            }else{
                $this->Flash->error("Error al intentar guardar el texto.");
            }

        }
        
        //Crea el objeto query con la consulta especificada.
        $textQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'introduction',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'introduction',
                                'Contents.content_type' => 'image',)
        ));

        // Ejecuta la consulta al tratar de convertirla en array.
        $text   = $textQuery->toArray();
        $images = $imagesQuery->toArray();

        $this->set([
            'text' => $text,              
            'images' => $images,              
        ]);
    }
    
    
    public function home($addingImage = null)
    {
        $this->set('title', 'Administración de inicio');
        $this->viewBuilder()->layout("defaultAdmin");
        $pagesController = new PagesController();
        $contentsController = $pagesController->Pages->Contents;
        if ($this->request->is(['post', 'patch', 'put'])) {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $imFile = $this->verify_image_file();
                if (isset($imFile["error"])) {
                    $this->Flash->error ($imFile ["error"]);
                } else {
                    $image = $this -> Pages -> Contents -> newEntity ();
                    $this->Flash->success ('Vamos bien');
                    //$path = str_replace("..", webroot, 
                }
            }
            /*
            $imagen = $this -> request -> data ['imagen'];
            $imagen = $contentsController->get ($imagen);
            if ($contentsController->delete ($imagen)) {
                $this->Flash->success(__('Cambios guardados.'));
            } else {
                $this->Flash->error(__('No se pudo borrar la imagen.'));
            }*/
		}
        //Crea el objeto query con la consulta especificada.
        
        $textsQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home',
                                'Contents.content_type' => 'image',)
        ));

        $this->set([
            'initialPath' => isset ($agregarImagen) ? '../' : '/',
            'text'      => $textsQuery,       
            'images'    => $imagesQuery,            
        ]);
    }
    
    public function addimage()
    {
        $this->viewBuilder()->layout("defaultAdmin");
    }

 public function description(){
        $this->set('title', 'Administración de Descripción General');
        $this->viewBuilder()->layout("defaultAdmin");       
        
        $pagesController = new PagesController();
        
        if ($this->request->is(['post'])) {
            
                //Verificar y actualizar la base
                
                $this->Flash->success(__('Cambios guardados.'));
        }
        
        //Crea el objeto query con la consulta especificada.
        $textQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'image',)
        ));
        
        $urlQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'url',)
        )); 
        

        // Ejecuta la consulta al tratar de convertirla en array.
        $text   = $textQuery->toArray();
        $images = $imagesQuery->toArray();
        $url    = $urlQuery->toArray();

        $this->set([
            'text'      => $text,              
            'images'    => $images, 
            'url'       => $url,       
        ]);     
    
    }
    
    public function modifyDescription(){
        //Para saber si es el url
        $pagesController = new PagesController();
        $modelContents = new PagesController();
        
        $i = 0;
                //Crea el objeto query con la consulta especificada.
        $textQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'text',)
        ));
        
        $urlQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'url',)
        )); 
        

        // Ejecuta la consulta al tratar de convertirla en array.
        $texts   = $textQuery->toArray();
        $url    = $urlQuery->toArray();
                                
        //borrar el url, con url[0]->id
        $pagesController->Pages->Contents->deleteAll(array('Contents.id' => $url[0]->id));
        
        //se borra cada texto en la base
        foreach($texts as $text){
            $pagesController->Pages->Contents->deleteAll(array('Contents.id' => $text->id));
        }
                    
        foreach($_POST as $postValue){
            $content = $modelContents->Pages->Contents->newEntity();
            if(!empty($postValue)){
            if($i != 0){
                //Es texto
                $content->content_type = 'text';    
                $content->link_path = '';       
                $content->description = $postValue;                            
            }else{
                //Es url(solo pasa una vez)
                $content->content_type = 'url';
                if(preg_match('/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌​[\w\?‌​=]*)?/', $postValue)){                                    
                    preg_match('/(?<=\?v\=).+/', $postValue, $matches_out);            
                    $content->link_path = 'https://www.youtube.com/embed/'.$matches_out[0].'?autoplay=1&rel=0&showinfo=0';
                }else{
                    if(preg_match('/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/embed\/.+)/', $postValue)){
                        $content->link_path = $postValue;
                    }else{
                        $content->link_path = '';
                    }
                }

                $content->description = '';                         
            }
                $content->id = 500+$i;
                $content->page_id = 'toursDescription';             
                $content->sequence_in_page = 0;
            }
                $modelContents->Pages->Contents->save($content);            

            $i++;
        }
     
     
        $this->redirect(['controller' => 'admin', 'action'=>'description']);    
    }

    /**
     * Admin tourSantaElena method.
     * Created by Josin Madrigal & Isabel Chaves.
     * [GET]  Gets contents to display in view.
     * [POST] Updates database.
     * @return \Cake\Network\Response|null
     */
    public function tourSantaElena()
    {
        $this->set('title', 'Administración del recorrido de la Península de Santa Elena');
        $this->viewBuilder()->layout("defaultAdmin"); 
        $this->loadModel('Pages');
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(is_uploaded_file($_FILES['imagen_fondo']['tmp_name'])) {
                if (isset($_POST['image_id'])) {

                    $imFile = $this->verify_image_file();
                    if (isset($imFile["error"])) {
                        $this->Flash->error($imFile["error"]);
                    }else{

                        //Se guarda la imagen en el directorio
                        $image = $this->Pages->Contents->get($_POST['image_id']);
                        $path = str_replace("..", "webroot", $image->link_path);

                        if (!move_uploaded_file($_FILES['imagen_fondo']['tmp_name'], $path)) {

                            $msj_error = "Error al intentar subir la imagen '". $_FILES['imagen_fondo']['tmp_name']."'. Pudo haber ocurrido un ataque.";;
                            $this->Flash->error($msj_error);

                        } else {

                            if(!strpos($image->link_path, $imFile["extension"])){
                                //Si la extension es diferente se actualiza la base con la nueva extension
                                $image->link_path = preg_replace('/(png|jpg)$/i', $imFile["extension"], $image->link_path);
                                if (!$this->Pages->Contents->save($image)) {
                                    $this->Flash->error("Error al intentar guardar la imagen");
                                }
                                
                            }
                        }
                    }
                }
            }

            if (isset($_POST['text_id'])) {
                $text = $this->Pages->Contents->get($_POST['text_id']);
                $text->description = $_POST['descripcion'];
                if ($this->Pages->Contents->save($text)) {
                    $this->Flash->success("Cambios guardados");
                }

            }else{
                $this->Flash->error("Error al intentar guardar el texto.");
            }

        }

        //Crea el objeto query con la consulta especificada.
        $textQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tourSantaElena',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tourSantaElena',
                                'Contents.content_type' => 'image',)
        ));

        $urlQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tourSantaElena',
                                'Contents.content_type' => 'url',)
        ));

        // Ejecuta la consulta al tratar de convertirla en array.
        $text   = $textQuery->toArray();
        $images = $imagesQuery->toArray();
        $url    = $urlQuery->toArray();

        $this->set([
            'text'      => $text,              
            'images'    => $images,
            'url'       => $url,              
        ]);

    }
    
    /**
     * Admin tourBolanos method.
     * Created by Josin Madrigal & Isabel Chaves.
     * [GET]  Gets contents to display in view.
     * [POST] Updates database.
     * @return \Cake\Network\Response|null
     */
    public function tourBolanos()
    {
        $this->set('title', 'Administración del Recorrido de Isla Bolaños');
        $this->viewBuilder()->layout("defaultAdmin");
      $this->loadModel('Pages');
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(is_uploaded_file($_FILES['imagen_fondo']['tmp_name'])) {
                if (isset($_POST['image_id'])) {

                    $imFile = $this->verify_image_file();
                    if (isset($imFile["error"])) {
                        $this->Flash->error($imFile["error"]);
                    }else{

                        //Se guarda la imagen en el directorio
                        $image = $this->Pages->Contents->get($_POST['image_id']);
                        $path = str_replace("..", "webroot", $image->link_path);

                        if (!move_uploaded_file($_FILES['imagen_fondo']['tmp_name'], $path)) {

                            $msj_error = "Error al intentar subir la imagen '". $_FILES['imagen_fondo']['tmp_name']."'. Pudo haber ocurrido un ataque.";;
                            $this->Flash->error($msj_error);

                        } else {

                            if(!strpos($image->link_path, $imFile["extension"])){
                                //Si la extension es diferente se actualiza la base con la nueva extension
                                $image->link_path = preg_replace('/(png|jpg)$/i', $imFile["extension"], $image->link_path);
                                if (!$this->Pages->Contents->save($image)) {
                                    $this->Flash->error("Error al intentar guardar la imagen");
                                }
                                
                            }
                        }
                    }
                }
            }

            if (isset($_POST['text_id'])) {
                $text = $this->Pages->Contents->get($_POST['text_id']);
                $text->description = $_POST['descripcion'];
                if ($this->Pages->Contents->save($text)) {
                    $this->Flash->success("Cambios guardados");
                }
            }else{
                $this->Flash->error("Error al intentar guardar el texto.");
            }

        }

        //Crea el objeto query con la consulta especificada.
        $textQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tourBolanos',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tourBolanos',
                                'Contents.content_type' => 'image',)
        ));

        $urlQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tourBolanos',
                                'Contents.content_type' => 'url',)
        ));


        // Ejecuta la consulta al tratar de convertirla en array.
        $text   = $textQuery->toArray();
        $images = $imagesQuery->toArray();
        $url    = $urlQuery->toArray();

        $this->set([
            'text'      => $text,              
            'images'    => $images,
            'url'       => $url,              
        ]);

    }    


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function mapindex($tourId)
    {
        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
        $points = $this->paginate(
            $modelMapPoints->MapPoints->find('all', array(
                'conditions' => array('MapPoints.path' => $tourId)
            ))   
        );
        $this -> set ('title', ''.($tourId == 1 ? 'Isla Bola&ntilde;os' : 'Pen&iacute;nsula de Santa Elena'));
        $this -> set ('tourId', $tourId);
        $this->set('mapPoints',$points);
    }

 /**
     * mapadd method
     *
     * @return \Cake\Network\Response|null
     */
    public function mapadd($tourId)
    {
        $this->set('title', 'Agregar punto del mapa');

        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
        $modelPages = new PagesController();

        if ($this->request->is('post')) {

            debug($this->request->data('container_image'));
            debug($this->request->data('container_video'));

            /*Se crean los atributos para un punto del mapa*/
            $path = $tourId;
            $name = $this->request->data('name');
            $latitude = $this->request->data('latitude');
            $longitude = $this->request->data('longitude');
            $description_point = $this->request->data('descripcion_point');

            /* Contenido del punto del mapa*/
            $images_struct = $this->request->data('container_image');
            $video_struct = $this->request->data('container_video');

            /*Se busca el próximo id*/
            $points = $modelMapPoints->MapPoints->find('all', array(
                        'conditions' => array('MapPoints.path' => $tourId),
                        'fields'=>array('MapPoints.sequence_number') )
                      );   

            /*Se busca el próximo id*/
            $maxPoint = $points->max('sequence_number');

            /*Se genera el id de pages y el punto del mapa*/
            $sequence_number = ''.($maxPoint->sequence_number + 1).'';
            $key = 'P'.(($maxPoint->sequence_number) + 1).'R'.$tourId;

            /*Componentes de la nueva entidad Pages*/
            $dataPages = ['id' => $key ];

            /*Componentes de la nueva entidad MapPoints*/
            $dataPoint = [
                'path' => $path,
                'sequence_number' => $sequence_number,
                'page_id' => $key,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'name' => $name ];

            /* Crea las entidades Pages y MapPoints */
            $pagesPoint = $modelPages->Pages->newEntity();
            $mapPoint = $modelMapPoints->MapPoints->newEntity();

            /* Se asigna los componentes de las nuevas entidades Pages y MapPoints */
            $pagesPoint = $modelPages->Pages->patchEntity($pagesPoint, $dataPages);
            $mapPoint = $modelMapPoints->MapPoints->patchEntity($mapPoint, $dataPoint);

            /*Se guarda el elemento Pages en la base de datos*/
            if($modelPages->Pages->save($pagesPoint)) 
            {
                $this->Flash->success(__('The Pages has been saved.'));
                
                /* Se guarda el elemento MapPoint en la base de datos */
                if ($modelMapPoints->MapPoints->save($mapPoint)) 
                {
                    $this->Flash->success(__('The MapPoint has been saved.'));


                    /*-------------------------------------------------- Texto del punto ---------------------------------------------- */

                    if (!empty($description_point))
                    {
                        $contentText = $modelPages->Pages->Contents->newEntity();

                        /* Componentes de la nueva entidad de contenido */
                        $dataText = [
                            'page_id' => $key,
                            'link_path' => " ",
                            'description' => $description_point,
                            'content_type' => "text",
                            'sequence_in_page' => 0 ];

                         /* Se asigna el componente a la nueva entidad de contenido */   
                        $contentText = $modelPages->Pages->Contents->patchEntity($contentText, $dataText);

                        /* Se guarda entidad en la base de datos */
                        if ($modelPages->Pages->Contents->save($contentText))
                        {
                            $this->Flash->success(__('The text has been saved.'));
                        }
                        else
                        {
                            $this->Flash->error(__('The text could not be saved. Please, try again.'));     
                        }
                     }

                    /*------------------------------------------------- Imagenes del punto ---------------------------------------------- */


                    foreach($images_struct as $image) {

                        if ($image[0]['error'] != 4)
                        {
                            $contentImage = $modelPages->Pages->Contents->newEntity();

                            $path =  WWW_ROOT . 'resources/travel/maps/'.$tourId.'/' . $image[0]['name'];
                            $name_value = $image[0]['name'];

                            if (file_exists($path)) {
                                $invalidate_path = true;
                                $number_sequence = 2;

                                while($invalidate_path == true)
                                {
                                    $path =  WWW_ROOT . 'resources/travel/maps/'.$tourId.'/' . "r".$number_sequence."_".$image[0]['name'];  
                                    $name_value = "r".$number_sequence."_".$image[0]['name'];
                                    if (file_exists($path)) {
                                       $invalidate_path = true;
                                    }
                                    else
                                    {
                                       $invalidate_path = false;
                                    }

                                    $number_sequence = $number_sequence + 1;
                                }
                            }

                            if ( move_uploaded_file($image[0]['tmp_name'], $path)) {
                                echo "El fichero es válido y se subió con éxito.\n";
                            } else {
                                echo "¡Posible ataque de subida de ficheros!\n";
                            }


                            /* Componentes de la nueva entidad de contenido */
                            $dataImage = [
                                'page_id' => $key,
                                'link_path' => "../../resources/travel/maps/".$tourId."/" .$name_value,
                                'description' => $image[1],
                                'content_type' => "image",
                                'sequence_in_page' => 0 ];

                            /* Se asigna el componente a la nueva entidad de contenido */   
                            $contentImage  = $modelPages->Pages->Contents->patchEntity($contentImage , $dataImage);

                            /* Se guarda entidad en la base de datos */
                            if ($modelPages->Pages->Contents->save($contentImage))
                            {
                                $this->Flash->success(__('The image has been saved.'));
                            }
                            else
                            {
                                $this->Flash->error(__('The image could not be saved. Please, try again.'));     
                            }


                        }
                    }


                    /*------------------------------------------------- Video del punto ---------------------------------------------- */


                    /* Se itera sobre los componentes de video del punto del mapa */
                    foreach($video_struct as $video) 
                    {
                        /* Se crea una entidad de tipo contenido */
                        $contentVideo = $modelPages->Pages->Contents->newEntity();

                        /* Componentes de la nueva entidad de contenido */
                        $dataVideo = [
                            'page_id' => $key,
                            'link_path' => $video[1],
                            'description' => $video[0],
                            'content_type' => "video",
                            'sequence_in_page' => 0 ];

                         /* Se asigna el componente a la nueva entidad de contenido */   
                        $contentVideo = $modelPages->Pages->Contents->patchEntity($contentVideo, $dataVideo);

                        /* Se guarda entidad en la base de datos */
                        if ($modelPages->Pages->Contents->save($contentVideo))
                        {
                            $this->Flash->success(__('The video has been saved.'));
                        }
                        else
                        {
                            $this->Flash->error(__('The video could not be saved. Please, try again.'));     
                        }

                    }

                    //return $this->redirect([$path,'controller'=> 'admin','action' => 'mapindex']);
                }
                else
                {
                    $this->Flash->error(__('The Point could not be saved. Please, try again.'));              
                }
            }
            else
            {
                $this->Flash->error(__('The Pages could not be saved. Please, try again.'));
            }
        }

        $pages = $modelMapPoints->MapPoints->Pages->find('list', ['limit' => 200]);
        $this->set(compact('mapPoint', 'pages'));
        $this->set('_serialize', ['mapPoint']);
        $this -> set ('tourId', $tourId);

    }

	/**
     * mapedit method
     *
     * @return \Cake\Network\Response|null
     */
    public function mapedit($pointId){
        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
		$pagesController = new PagesController();
		
		$newPointName = "";
		
		$query = $modelMapPoints->MapPoints->find('all', array('conditions' => array('MapPoints.page_id' => $pointId)));
		$point = $query->first();
		$textContents = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'text'))); 
		$imageContents = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'image'))); 
		$videoContents = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'video'))); 
		
		$point = $query->first();

		$this->set('newPointName', $newPointName);
		$this->set('point', $point);
        $this->set('pointId', $pointId);
		$this->set('textContents', $textContents);
		$this->set('imageContents', $imageContents);
		$this->set('videoContents', $videoContents);
		$this->set('tourId', $point->path);
		$path = $point->path;
		
		$this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
        $modelPages = new PagesController();
		
		$pages = $modelMapPoints->MapPoints->Pages->find('list', ['limit' => 200]);
        $this->set(compact('mapPoint', 'pages'));
        $this->set('_serialize', ['mapPoint']);

        if ($this->request->is('post')) {
			//$debug($this->request->data($pointId));
			$descripcion_point = $this->request->data('descripcion_point');
			$container_image_delete = $this->request->data('container_image_delete');
			$container_image = $this->request->data('container_image');
			$container_image_new = $this->request->data('container_image_new');
			
			/*-------------------------------------------------- Texto del punto ---------------------------------------------- */

			if (!empty($descripcion_point))
			{
				/* Si el punto no tenía texto, entonces se va a agregar */
				if($textContents->count() == 0){
					$contentText = $modelPages->Pages->Contents->newEntity();

					$textContent = $modelPages->Pages->Contents->find('all', array(
										'fields'=>array('Contents.id') )
								   );   

					$maxText = $textContent->max('id');

					/* Componentes de la nueva entidad de contenido */
					$dataText = [
						'id' => ($maxText->id + 1),
						'page_id' => $point->page_id,
						'link_path' => " ",
						'description' => $descripcion_point,
						'content_type' => "text",
						'sequence_in_page' => 0 ];
				
					/* Se asigna el componente a la nueva entidad de contenido */   
					$contentText = $modelPages->Pages->Contents->patchEntity($contentText, $dataText);

					/* Se guarda entidad en la base de datos */
					if ($modelPages->Pages->Contents->save($contentText))
					{
						$this->Flash->success(__('The text has been saved.'));
					}
					else
					{
						$this->Flash->error(__('The text could not be saved. Please, try again.'));     
					}
				}
				/* Si tenía texto, entonces se va a modificar */
				else{
					$contentText = $textContents->first();
					$contentText->description = $descripcion_point;
					
					/* Se guarda entidad en la base de datos */
					if ($modelPages->Pages->Contents->save($contentText))
					{
						$this->Flash->success(__('The text has been modified.'));
					}
					else
					{
						$this->Flash->error(__('The text could not be modified. Please, try again.'));     
					}
				}
			}
			
			/*-------------------------------------------------- Imágenes del punto ---------------------------------------------- */
			
			/*--------------------------------------------------- Caso de eliminar ----------------------------------------------- */
			
			debug($this->request->data('container_image'));
			debug($this->request->data('container_image_new'));
			
			if($container_image_delete != null){
				foreach($container_image_delete as $image){
					$query = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.description' => $image[0], 'Contents.link_path' => $image[1]))); 
					$imageContent = $query->first();
					
					/* Se guarda entidad en la base de datos */
					if ($modelPages->Pages->Contents->delete($imageContent))
					{
						$this->Flash->success(__('The image has been removed.'));
					}
					else
					{
						$this->Flash->error(__('The image could not be removed. Please, try again.'));     
					}
				}
			}
			
			/*---------------------------------------------------- Caso de agregar ----------------------------------------------- */
			
			if($container_image_new != null){
				foreach($container_image_new as $image) {
					if (true)
					{
						$contentImageNew = $modelPages->Pages->Contents->newEntity();

						$imagesPointContent = $modelPages->Pages->Contents->find('all', array(
											'fields'=>array('Contents.id') )
									   );   

						$maxImage = $imagesPointContent->max('id');

						$path =  WWW_ROOT . 'resources/travel/maps/'.$point->path.'/' . $image[1]['name'];
						$name_value = $image[1]['name'];

						if (file_exists($path)) {
							$invalidate_path = true;
							$number_sequence = 2;

							while($invalidate_path == true)
							{
								$path =  WWW_ROOT . 'resources/travel/maps/'.$point->path.'/' . "r".$number_sequence."_".$image[1]['name'];	
								$name_value = "r".$number_sequence."_".$image[1]['name'];
								if (file_exists($path)) {
								   $invalidate_path = true;
								}
								else
								{
								   $invalidate_path = false;
								}

								$number_sequence = $number_sequence + 1;
							}
						}

						if(move_uploaded_file($image[1]['tmp_name'], $path)) {
							echo "El fichero es válido y se subió con éxito.\n";
						} 
						else{
							echo "¡Posible ataque de subida de ficheros!\n";
						}

						/* Componentes de la nueva entidad de contenido */
						$dataImage = [
							'page_id' => $point->page_id,
							'link_path' => "../../resources/travel/maps/".$point->path."/" .$name_value,
							'description' => $image[0],
							'content_type' => "image",
							'sequence_in_page' => 0 ];

						/* Se asigna el componente a la nueva entidad de contenido */   
						$contentImageNew  = $modelPages->Pages->Contents->patchEntity($contentImageNew , $dataImage);

						/* Se guarda entidad en la base de datos */
						if ($modelPages->Pages->Contents->save($contentImageNew))
						{
							$this->Flash->success(__('The image has been saved.'));
						}
						else
						{
							$this->Flash->error(__('The image could not be saved. Please, try again.'));     
						}
					}
				}
			}
			
			/*-------------------------------------------------- Caso de modificar ----------------------------------------------- */
			
			if($container_image != null){
				$images = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'image'))); 
				foreach($images as $image){
					if($container_image[$image->id] != null){
						$image->description = $container_image[$image->id][0];
						$image->link_path = $container_image[$image->id][1];
					
						/* Se guarda entidad en la base de datos */
						if ($modelPages->Pages->Contents->save($image))
						{
							$this->Flash->success(__('The image has been modified.'));
						}
						else
						{
							$this->Flash->error(__('The image could not be modified. Please, try again.'));     
						}
					}
				}
			}
		}
    }
	
}
