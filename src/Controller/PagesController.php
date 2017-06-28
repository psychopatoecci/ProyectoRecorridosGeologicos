<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Pages Controller.
 *
 * @property \App\Model\Table\PagesTable $Pages */
class PagesController extends AppController
{

    /**
     * Allows the user to access these pages without logging in.
     * Created by Christian Duran.
     */
    public function beforeFilter (Event $event) 
    {
        parent::beforeFilter ($event);
        $this->Auth->allow (['home', 'information', 'tourSantaElena', 'tourBolanos', 'description', 'gallery', 'contact', 'about']);
    }
    /**
     * Home method.
     * Used for the main / page.
     * Created by José Daniel Sánchez, Adrián Madrigal and Jean Carlo Lara.
     * This method shows a carousel and a little text box
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
     * Created by Jose Daniel Sánchez y Adrián Madrigal
     * This method shows photos about tours.
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

        $tourId = 'gallery'.$tourNum;

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
     * Created by Adrian Madrigal
     * This method sends the information contact
     * by email
     *
     * @return \Cake\Network\Response|null
     */
    public function contact()
    {
		$this->set('title', 'Contacto');
        if ($this->request->is(['post'])) {            
            $email = new Email('default');
            $email
                ->transport ('gmail')
                ->from ('soporte.recorridosgeologicos@gmail.com')
                ->to ('soporte.recorridosgeologicos@gmail.com')
                ->emailFormat('text')
                ->subject ($_POST['asunto'])
                ->send ("Mensaje enviado por: ".$_POST['nombre']."\nCorreo: ".$_POST['correo']."\n\nMensaje:\n".$_POST['mensaje']);

                $this->Flash->success("Mensaje enviado exitosamente.");                
        }
    }

    /**
     * About method.
     * Created by Jean Carlo Lara
     * This method shows the names of people and organizations 
     * that collaborate to developed this application.
     *
     * @return \Cake\Network\Response|null
     */
    public function about()
    {
        $this->set('title', 'Acerca de');
    }
}
