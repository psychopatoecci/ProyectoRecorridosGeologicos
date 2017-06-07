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
        $this->set('mapPoints',$points);
    }

    public function mapadd()
    {
        $this->viewBuilder()->layout("defaultAdmin");
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
    
    
    public function home()
    {
        $this->set('title', 'Administración de inicio');
        $this->viewBuilder()->layout("defaultAdmin");
		//$action = $this->request->params['action'];
        $pagesController = new PagesController();
        if ($this->request->is(['post'])) {
			
				//Verificar y actualizar la base
			    
				$this->Flash->success(__('Cambios guardados.'));
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

}
