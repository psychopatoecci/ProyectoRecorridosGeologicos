<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages */
class PagesController extends AppController
{

    /**
     * Home method
     *
     * @return \Cake\Network\Response|null
     */
    public function home()
    {

        $action = $this->request->params['action'];
        //Obtiene los datos de las imagenes del carrusel.
        $contents = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home')
        ));

        $contentsLength = $this->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home', 
                                  'Contents.content_type' => 'image')
        ))->count();        

        //Envía los datos a la vista
        $this->set([
            'contents' => $contents,
            'contentsLength' => $contentsLength,                    
        ]);
    }
	
	    /**
     * Information method
     *
     * @return \Cake\Network\Response|null
     */
    public function information()
    {
		
    }
	
	/**
     * Gallery method
     *
     * @return \Cake\Network\Response|null
     */
    public function gallery()
    {
		
    }
	
		    /**
     *Contact method
     *
     * @return \Cake\Network\Response|null
     */
    public function contact()
    {
		
    }
}
