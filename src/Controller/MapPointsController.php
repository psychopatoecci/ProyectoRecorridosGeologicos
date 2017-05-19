<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MapPoints Controller
 * > Corresponds to the tour tabs (Recorrido 1 & Recorrido 2).
 *
 * @property \App\Model\Table\MapPointsTable $MapPoints
 */
class MapPointsController extends AppController
{

    /*
     * Index method
     * > Left for content administration, not used as of now.
     *
     * @return \Cake\Network\Response|null
     *
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pages']
        ];
        $mapPoints = $this->paginate($this->MapPoints);

        $this->set(compact('mapPoints'));
        $this->set('_serialize', ['mapPoints']);
    }*/

    /**
     * View method
     * > Shows the map with the respective markers of the respective tour.
     *
     * @param int $tourNum > whether the first (1) or second (2) tour.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($tourNum)
    {
        if ($tourNum != 1 && $tourNum != 2) {
            // Evitar que se caiga si se envian datos erroneos.
            $tourNum = 1;
        }
        $this -> set ('title', 'Recorrido '.($tourNum == 1 ? 'Isla Bola&ntilde;os' : 'Santa Elena'));
        $this -> set ('tourNumber', $tourNum == 1 ? 'Isla Bolanos' : 'Santa Elena');
        $this -> set ('latLong', $tourNum == 1 ? '11.021101, -85.705462' : '10.905865, -85.760166');
        $mapPoints = $this->MapPoints->find('all', [
            'conditions' => ['MapPoints.path' => $tourNum]]
        ) -> contain (['Pages.Contents']);
        $pointsToSend = [];
        foreach ($mapPoints as $point) {
            $images = [];
            $videos = [];
            $texts  = [];
            foreach ($point ['page']['contents'] as $content) {
                switch ($content ['content_type']) {
                    case 'image':
                        $images [] = [$content ['link_path'], $content ['description'], $content['sequence_in_page']];
                        break;
                    case 'video':
                        $videos [] = [$content ['link_path'], $content ['description'], $content['sequence_in_page']];
                        break;
                    case 'text':
                        $texts [] = [$content ['link_path'], $content ['description'], $content['sequence_in_page']];
                        break;
                    default:
                        assert (false);
                }
            }
            $pointsToSend [] = [
                'latitude'        => $point ['latitude'],
                'longitude'       => $point ['longitude'],
                'name'            => $point ['name'],
                'page_id'         => $point ['page_id'],
                'sequence_number' => $point ['sequence_number'],
                'images'          => $images,
                'videos'          => $videos,
                'texts'           => $texts
            ];
        }

        $this->set('mapPoints', $pointsToSend);
        //$this->set('_serialize', ['mapPoints']);
    }

    /**
     * Add method
     * > Left for content administration, not used as of now.
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mapPoint = $this->MapPoints->newEntity();
        if ($this->request->is('post')) {
            $mapPoint = $this->MapPoints->patchEntity($mapPoint, $this->request->getData());
            if ($this->MapPoints->save($mapPoint)) {
                $this->Flash->success(__('The map point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The map point could not be saved. Please, try again.'));
        }
        $pages = $this->MapPoints->Pages->find('list', ['limit' => 200]);
        $this->set(compact('mapPoint', 'pages'));
        $this->set('_serialize', ['mapPoint']);
    }

    /**
     * Edit method
     * > Left for content administration, not used as of now.
     *
     * @param string|null $id Map Point id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mapPoint = $this->MapPoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mapPoint = $this->MapPoints->patchEntity($mapPoint, $this->request->getData());
            if ($this->MapPoints->save($mapPoint)) {
                $this->Flash->success(__('The map point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The map point could not be saved. Please, try again.'));
        }
        $pages = $this->MapPoints->Pages->find('list', ['limit' => 200]);
        $this->set(compact('mapPoint', 'pages'));
        $this->set('_serialize', ['mapPoint']);
    }

    /**
     * Delete method
     * > Left for content administration, not used as of now.
     *
     * @param string|null $id Map Point id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mapPoint = $this->MapPoints->get($id);
        if ($this->MapPoints->delete($mapPoint)) {
            $this->Flash->success(__('The map point has been deleted.'));
        } else {
            $this->Flash->error(__('The map point could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function loadImage(){

      if ($this->request->isPost()) {
        if( $this->request->is('ajax') ) {

        $action = $this->request->data['point'];

        $imagesQuery = $this->MapPoints->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => $action,
                                'Contents.content_type' => 'image',),'fields'=>array('Contents.link_path')
        ));

        $images = $imagesQuery->toArray();
        echo json_encode($images);
        exit();
        }


      }
   }

    public function loadVideo(){

      if ($this->request->isPost()) {
        if( $this->request->is('ajax') ) {

        $action = $this->request->data['point'];

        $imagesQuery = $this->MapPoints->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => $action,
                                'Contents.content_type' => 'video',),'fields'=>array('Contents.link_path')
        ));

        $images = $imagesQuery->toArray();
        echo json_encode($images);
        exit();
        }


      }
   }

}
