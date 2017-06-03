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

}
