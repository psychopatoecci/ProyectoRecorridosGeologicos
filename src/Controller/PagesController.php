<?php
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
     * Created by José Daniel Sánchez, Adrián Madrigal and Jean Carlo Lara.
     * This method show a carousel and a little text box
     * with some information.
     * @return \Cake\Network\Response|null
     */
    public function home()
    {
        $this->set('title', 'Inicio');

        $action = $this->request->params['action'];
        //Obtiene los datos de las imagenes del carrusel.
        $contents = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home'),
            'order' => array ('Contents.sequence_in_page')
        ));

        $contentsLength = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home', 
                                  'Contents.content_type' => 'image'),
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
     * Created by Josin Madrigal
     * This method get some content from 
     * the database and send it to the view.
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
     * This method get the Santa Elena information paths from 
     * the database to get content and send it to the view.
     * @return \Cake\Network\Response|null
     */
    public function tourSantaElena()
    {
        $this->set('title', 'Recorrido Península de Santa Elena');

		$action = $this->request->params['action'];

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
     * tour_bolanos method.
     * Created by Isabel Chaves.
     * This method get the Isla Bolaños information paths from 
     * the database to get content and send it to the view.
     * @return \Cake\Network\Response|null
     */
    public function tourBolanos()
    {
        $this->set('title', 'Recorrido Isla Bolaños');

		$action = $this->request->params['action'];

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
     * toursDescription method.
     * Created by Jean Carlo Lara.
     * This method get the general tours information paths from 
     * the database to get content and send it to the view.
     * @return \Cake\Network\Response|null
     */
    public function description()
    {
        $this->set('title', 'Descripción General');

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
    public function gallery($tourNum)
    {        
        if ($tourNum != 1 && $tourNum != 2) {
             // Evitar que se caiga si se envian datos erroneos.
             $tourNum = 1;
        }
        $this -> set ('title', 'Galer&iacute;a '.($tourNum == 1 ? 'Isla Bola&ntilde;os' : 'Pen&iacute;nsula de Santa Elena'));

        $tourId = 'R'.$tourNum;

        $imagesQuery = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id LIKE' => '%'.$tourId.'%',
                                  'Contents.content_type' => 'image')
        ));        

        $images = $imagesQuery->toArray();        

        $this->set([
            'images'    => $images
        ]);        
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
