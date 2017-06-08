<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Admin Controller
 *
 * @property \App\Model\Table\AdminTable $Admin */
class AdminController extends AppController
{

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
		
		$pagesController = new PagesController();
		
		if ($this->request->is(['post'])) {
			
				//Verificar y actualizar la base
			    
				$this->Flash->success(__('Cambios guardados.'));
		}
		
        //Crea el objeto query con la consulta especificada.
        $textQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'introduction',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $pagesController->Pages->Contents->find('all', array(
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

        $pagesController = new PagesController();

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
        $this->set('title', 'Administración del recorrido de Isla Bolaños');
        $this->viewBuilder()->layout("defaultAdmin"); 

        $pagesController = new PagesController();

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
        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
        $modelPages = new PagesController();

        if ($this->request->is('post')) {

            /*---------------------Subir fotos -------------------
                $photo = [
                    'name' => $this->request->data['ad_photos']['name'],
                    'type' => $this->request->data['ad_photos']['type'],
                    'tmp_name' => $this->request->data['ad_photos']['tmp_name'],
                    'error' => $this->request->data['ad_photos']['error'],
                    'size' => $this->request->data['ad_photos']['size']
                ];
                echo "<pre>"; print_r($photo); echo "</pre>";
                echo "<pre>"; print_r($photo); echo "</pre>";


                if ( move_uploaded_file($this->request->data['ad_photos']['tmp_name'], WWW_ROOT . 'resources/' . $this->request->data['ad_photos']['name'])) {
                    echo "El fichero es válido y se subió con éxito.\n";
                } else {
                    echo "¡Posible ataque de subida de ficheros!\n";
                }

            ---------------------Subir fotos -------------------*/

            debug($this->request->data('hola'));
            debug($this->request->data('hola2'));
            debug($this->request->data('container_name_image'));
            /*Se crean los atributos para un punto del mapa*/
            $path = $tourId;
            $name = $this->request->data('name');
            $latitude = $this->request->data('latitude');
            $longitude = $this->request->data('latitude');
            $video_name = $this->request->data('container_name');
            $video_path = $this->request->data('container_path');

            $description_point = $this->request->data('descripcion_point');

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

                    $contentText = $modelPages->Pages->Contents->newEntity();

                    $textContent = $modelPages->Pages->Contents->find('all', array(
                                        'fields'=>array('Contents.id') )
                                   );   

                    $maxText = $textContent->max('id');

                    /* Componentes de la nueva entidad de contenido */
                    @$dataText = [
                        'id' => ($maxText->id + 1),
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

                    /*------------------------------------------------- Video del punto ---------------------------------------------- */


                    /* Se itera sobre los componentes de video del punto del mapa */
                    for($i = 0; $i < count($video_name); ++$i) 
                    {
                        /* Se crea una entidad de tipo contenido */
                        $contentVideo = $modelPages->Pages->Contents->newEntity();

                        /* Se busca el próximo id de contenido */
                        $videos_array = $modelPages->Pages->Contents->find('all', array(
                                        'fields'=>array('Contents.id') )
                                        );   
                        $maxVideo = $videos_array->max('id');


                        /* Componentes de la nueva entidad de contenido */
                        $dataVideo = [
                            'id' => ($maxVideo->id + 1),
                            'page_id' => $key,
                            'link_path' => $video_path[$i],
                            'description' => $video_name[$i],
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

}
