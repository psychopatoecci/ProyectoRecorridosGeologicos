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

    /**
     * Index method
     * > Left for content administration, not used as of now.
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pages']
        ];
        $mapPoints = $this->paginate($this->MapPoints);

        $this->set(compact('mapPoints'));
        $this->set('_serialize', ['mapPoints']);
    }

    /**
     * View method
     * > 
     *
     * @param int $tourNum whether the first (1) or second (2) tour.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($tourNum)
    {
        if ($tourNum != 1 && $tourNum != 2) {
            // Evitar que se caiga si se envian datos erroneos.
            $tourNum = 1;
        }
        $mapPoint = $this->MapPoints->find('all', [
            'conditions' => ['MapPoints.path' => $tourNum]]);

        $this->set('mapPoint', $mapPoint);
        $this->set('_serialize', ['mapPoint']);
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
}
