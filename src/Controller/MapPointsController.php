<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MapPoints Controller
 * > Corresponds to the map tour tabs (Isla Bolaños & Peninsula de Santa Elena).
 *
 * @property \App\Model\Table\MapPointsTable $MapPoints
 */
class MapPointsController extends AppController
{

    /**
     * View method
     * Created by Christian Durán and Adrián Madrigal
     * > Shows the map with the respective markers of the respective tour.
     *
     * @param int $tourNum > whether the first (1) tour is Isla Bolaños or second (2) tour is Peninsula de Santa Elena.
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
     * loadImage method
     * Created by José Daniel Sánchez and Andreína Alvarado.
     * > This method lets load an image to show in the pop-up window.
     * @return \Cake\Network\Response|null
     */
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

    /**
     * loadVideo method
     * Created by José Daniel Sánchez and Andreína Alvarado.
     * > This method lets load a video to show in the pop-up window.
     * @return \Cake\Network\Response|null
     */
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
