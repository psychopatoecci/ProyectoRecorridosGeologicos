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

}
