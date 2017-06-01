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
    public function mapIndex()
    {
        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new mapPointsController();
        $points = $this->paginate($modelMapPoints->MapPoints);
        $this->set('mapPoints',$points);
    }

}
