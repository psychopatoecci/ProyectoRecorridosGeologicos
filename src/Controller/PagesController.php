<?php
/**
 * Pages Controller.
 * Controller used in all pages as for now.
 */
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pages Controller.
 *
 * @property \App\Model\Table\PagesTable $Pages */
class PagesController extends AppController
{

    /**
     * Home method.
     * Used for the main / page.
     *
     * @return \Cake\Network\Response|null
     */
    public function home()
    {
        $this->set('title', 'Inicio');

        $action = $this->request->params['action'];
        //Obtiene los datos de las imagenes del carrusel.
        $contents = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home')
        ));

        $contentsLength = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home', 
                                  'Contents.content_type' => 'image')
        ))->count();        

			//query para el main message
				$textQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home',
                                'Contents.content_type' => 'text',)
        ));
			$text   = $textQuery->toArray();
        //Envía los datos a la vista
        $this->set([
						'text' => $text,
            'contents' => $contents,
            'contentsLength' => $contentsLength,                    
        ]);
    }
	
	/**
     * Information method.
     * As of now it doesn't need logic.
     *
     * @return \Cake\Network\Response|null
     */
    public function information()
    {
        $this->set('title', 'Información General');

        $action = $this->request->params['action'];

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
	
	
	/**
     * tour_santa_elena method.
     * Created by Josin Madrigal.
     *
     * @return \Cake\Network\Response|null
     */
    public function tourSantaElena()
    {
        $this->set('title', 'Recorrido Península de Santa Elena');

		$action = $this->request->params['action'];

        //Crea el objeto query con la consulta especificada.
        $textQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tour_santa_elena',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tour_santa_elena',
                                'Contents.content_type' => 'image',)
        ));

        $urlQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tour_santa_elena',
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
     * tour_bolanos method.
     * Created by Isavel Chaves.
     *
     * @return \Cake\Network\Response|null
     */
    public function tourBolanos()
    {
        $this->set('title', 'Recorrido Isla Bolaños');

		$action = $this->request->params['action'];

        //Crea el objeto query con la consulta especificada.
        $textQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tour_bolanos',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tour_bolanos',
                                'Contents.content_type' => 'image',)
        ));

        $urlQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'tour_bolanos',
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
     * toursDescription method.
     * Created by Jean Carlo Lara.
     *
     * @return \Cake\Network\Response|null
     */
    public function description()
    {
        $this->set('title', 'Descripción General de los Recorridos');

		$action = $this->request->params['action'];

        //Crea el objeto query con la consulta especificada.
        $textQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'text',)
        ));

        $imagesQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'image',)
        ));

        $urlQuery = $this->Pages->Contents->find('all', array(
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
     * Gallery method.
     * As of now it doesn't need logic.
     *
     * @return \Cake\Network\Response|null
     */
    public function gallery()
    {
		
    }
	
	/**
     * Contact method.
     * As of now it doesn't need logic.
     *
     * @return \Cake\Network\Response|null
     */
    public function contact()
    {
		
    }
}
