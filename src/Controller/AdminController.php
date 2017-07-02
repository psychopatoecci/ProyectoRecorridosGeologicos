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
     * Verify Image File method.
     * Created by Psychopato ECCI.
     * This method verify the image size and 
     * format and then update the database.
     * @return \Cake\Network\Response|null
     */ 
    private function verify_image_file($imgName = 'imagen_fondo') 
    {
        //Verificar y actualizar la base
        if(is_uploaded_file($_FILES[$imgName]['tmp_name'])) {
            
            //Verificacion del tamano. 
            if ($_FILES[$imgName]['size'] > 5*1024*1024) {
                $msj_error = "La imagen excede el tamaño máximo permitido.";
                return array("error" => $msj_error);
            }
            
            $extension = "";
            $fh=fopen($_FILES[$imgName]['tmp_name'],'rb');
            if ($fh) { 
                $bytes6=fread($fh,6);
                fclose($fh); 
                if (!($bytes6===false)){
                    if (substr($bytes6,0,3)=="\xff\xd8\xff") {
                        $extension = 'jpg';
                    }
                    if ($bytes6=="\x89PNG\x0d\x0a"){
                        $extension = 'png';
                    }
                }
            }
            
            if (!$extension) {
                $msj_error = "El archivo subido no tiene el formato adecuado (jpg, png).";
                return array("error" => $msj_error);
            }

            //No hubo error
            return array("extension" => $extension);
           
        } else {
            $msj_error = "Error al intentar subir la imagen '". $_FILES[$imgName]['tmp_name']."'. Pudo haber ocurrido un ataque.";
            return array("error" => $msj_error);
        }
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
        $this->loadModel('Pages');
        $this->set('userController', 'Pages');
        $this->set('userAction', 'information');
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(is_uploaded_file($_FILES['imagen_fondo']['tmp_name'])) {
                if (isset($_POST['image_id'])) {
                    $imFile = $this->verify_image_file();
                    if (isset($imFile["error"])) {
                        $this->Flash->error($imFile["error"]);

                    } else {
                        $image = $this->Pages->Contents->get($_POST['image_id']);
                        $updateLinkPath = !strpos($image->link_path, $imFile["extension"]);
                        if($updateLinkPath) {
                            //Si la extension es diferente se debe cambiar
                            $image->link_path = preg_replace('/(png|jpg)$/i', $imFile["extension"], $image->link_path);
                        }
                        $name = str_replace("../resources/intro/background_images/", "", $image->link_path);
                        $path = 'resources'.DS.'intro'.DS.'background_images'.DS.$name;
                        //Se guarda la imagen en el directorio
                        if (!move_uploaded_file($_FILES['imagen_fondo']['tmp_name'], WWW_ROOT.$path)) {
                            $msj_error = "Error al intentar subir la imagen '". $_FILES['imagen_fondo']['tmp_name']."'. Pudo haber ocurrido un ataque.";
                            $this->Flash->error($msj_error);

                        }

                         else if($updateLinkPath) {
                            //Se actualiza la base con la nueva extension si es necesario
                            if (!$this->Pages->Contents->save($image)) {
                                $this->Flash->error("Error al intentar guardar la imagen.");
                            }
                        }
                    }
                }
                if (isset($_POST['text_id'])) {
                    $text = $this->Pages->Contents->get($_POST['text_id']);
                    $text->description = $_POST['descripcion'];
                    if ($this->Pages->Contents->save($text)) {
                        $this->Flash->success("Cambios guardados exitosamente.");
                    }

                    if (isset($_POST['text2_id'])) {
                        $text = $this->Pages->Contents->get($_POST['text2_id']);
                        $text->description = $_POST['descripcion2'];
                        $this->Pages->Contents->save($text);
                    }

                }else{
                    $this->Flash->error("Error al intentar guardar el texto.");
                }
            } else {
                $msj_error = 'Error subiendo imagen';
                if ($_FILES['imagen_fondo']['error'] == 1) {
                    $msj_error = $msj_error.': Imagen muy pesada';
                }
                $this->Flash->error ($msj_error);
            }
        }
        
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
     * Verify Image File method.
     * Created by Christian Durán and Jean Carlo Lara.
     * [GET]  Gets contents to display in view.
     * [POST] Updates database.
     * @return \Cake\Network\Response|null
     */ 
    public function home($addingImage = null)
    {
        $this->set('title', 'Administración de inicio');
        $this->set('userController', 'Pages');
        $this->set('userAction', 'home');
        $this->viewBuilder()->layout("defaultAdmin");
        $pagesController = new PagesController();
        $contentsController = $pagesController->Pages->Contents;
        if ($this->request->is(['post', 'patch', 'put'])) {
            if (isset($this->request->data['uploading'])) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $imFile = $this->verify_image_file('image');
                    if (isset($imFile["error"])) {
                        $this->Flash->error ($imFile ["error"]);
                    } else {
                        $imageNum = $contentsController -> find('all', [
                            'fields' => ['Contents.id']
                        ])->max ('id') ['id'] + 1;
                        $lastSeqInPage = $contentsController -> find ('all', [
                            'fields' => ['Contents.sequence_in_page'],
                            'conditions' => ['Contents.page_id' => 'home']
                        ])->max ('sequence_in_page') ['sequence_in_page'] + 1;
                        $image = $contentsController -> newEntity ();
                        $lpath = 'resources'.DS.'home'.DS.'carousel'.DS.$imageNum.'.'.$imFile['extension'];
                        if (!move_uploaded_file($_FILES['image']['tmp_name'], WWW_ROOT.$lpath)) {
                            $msj_error = "Error al intentar subir la imagen '".$_FILES['image']['tmp_name']."'. Pudo haber ocurrido un ataque.";
                            $this->Flash->error ($msj_error);
                        } else {
                            $image -> page_id          = 'home'; 
                            $image -> content_type     = 'image';
                            $image -> description      = '';
                            $image -> link_path        = $lpath;
                            $image -> sequence_in_page = $lastSeqInPage;

                            if ($contentsController -> save ($image)) {
                                $this->Flash->success ('Imagen insertada correctamente');
                            } else {
                                // TO DO: Borrar la imagen subida.
                                $this->Flash->error ('Error insertando imagen en base');
                            } // Fin if se metió en base.
                        } // Fin if se subió.
                    }
                } else {
                    $msj_error = 'Error subiendo imagen';
                    if ($_FILES['image']['error'] == 1) {
                        $msj_error = $msj_error.': Imagen muy pesada';
                    }
                    $this->Flash->error ($msj_error);
                }
            // No se están subiendo imágenes.
            } else if (isset($this->request->data['removing'])) {
                // Hay que borrar una imagen.
                $image = $this -> request -> data ['imagen'];
                $image = $contentsController->get ($image);
                if ($contentsController->delete ($image)) {
                    $this->Flash->success(__('Cambios guardados.'));
                } else {
                    $this->Flash->error(__('No se pudo borrar la imagen.'));
                }
            // No se están borrando imágenes.
            } else if (isset ($this->request->data['reorder'])) {
                $newOrder = explode(',', $this->request->data['reorder']);
                $seq = 0;
                foreach ($newOrder as $imgId) {
                    $image = $contentsController -> get ($imgId);
                    $image -> sequence_in_page = $seq;
                    $seq ++;
                    if (!$contentsController -> save ($image)){
                        $this->Flash->error (__('No se pudo reordenar.'));
                        break;
                    }
                }
            } else if ( isset ($this->request->data['message']) || isset ($this->request->data['url_bolanos']) || isset ($this->request->data['url_santa_elena']) ) {
                
                $changes_url = false;
                if(isset ($this->request->data['message']))
                {
                    $toModify = $contentsController -> get ($this->request->data('id'));
                    $toModify -> description = $this->request->data ['message'];
                    if ($contentsController -> save ($toModify)) {
                        $this->Flash->success(__('Cambios guardados.'));
                        $changes_url = true;
                    } else {
                        $this->Flash->error (__('No se pudo cambiar el mensaje.'));
                    }
                }

                if(isset ($this->request->data['url_bolanos']) && isset ($this->request->data['id_bolanos']) )
                {
                    $toModifyBolanos = $contentsController -> get ($this->request->data('id_bolanos'));
                    $toModifyBolanos -> link_path = $this->request->data ['url_bolanos'];
                    if ($contentsController -> save ($toModifyBolanos)) {
                        if($changes_url == false)
                        {
                          $this->Flash->success(__('Cambios guardados.'));      
                        }
                    } else {
                        $this->Flash->error (__('No se pudo cambiar la url.'));
                    }  
                }

                if(isset ($this->request->data['url_santa_elena']) && isset ($this->request->data['id_santa_elena']))
                {
                    $toModifySantaElena = $contentsController -> get ($this->request->data('id_santa_elena'));
                    $toModifySantaElena -> link_path = $this->request->data ['url_santa_elena'];
                    if ($contentsController -> save ($toModifySantaElena)) {
                        if($changes_url == false)
                        {
                          $this->Flash->success(__('Cambios guardados.'));      
                        }
                    } else {
                        $this->Flash->error (__('No se pudo cambiar la url.'));
                    }  
                }
            }
        }
        //Crea el objeto query con la consulta especificada.
        
        $textsQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home',
                                'Contents.content_type' => 'text',)
        ))->toArray ()[0];

        $urlBolanosQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home',
                                'Contents.content_type' => 'url',
                                'Contents.description' => 'RIB',)
        ))->toArray ()[0];      
        
        $urlSantaElenaQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home',
                                'Contents.content_type' => 'url',
                                'Contents.description' => 'RSE',)
        ))->toArray ()[0];

        $imagesQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'home',
                                'Contents.content_type' => 'image'),
            'order' => array ('Contents.sequence_in_page')
        ));

        $this->set([
            'initialPath' => isset ($agregarImagen) ? '../' : '/',
            'text'      => $textsQuery,       
            'images'    => $imagesQuery,
            'urlBolanos' => $urlBolanosQuery,
            'urlSantaElena' => $urlSantaElenaQuery,            
        ]);
    }
    
    /**
     * Admin Description method.
     * Created by Adrián Madrigal.
     * [GET]  Gets contents to display in view.
     * [POST] Updates database.
     * @return \Cake\Network\Response|null
     */
    public function description()
    {
        $this->set('title', 'Administración de Descripción General');
        $this->viewBuilder()->layout("defaultAdmin");       
        $pagesController = new PagesController();
        $this->set('userController', 'Pages');
        $this->set('userAction', 'description');
        if ($this->request->is(['post'])) {
            
                //Verificar y actualizar la base
                //$this->Flash->success(__('Cambios guardados.'));
        
        $modelContents = new PagesController();
        
        $i = 0;
                //Crea el objeto query con la consulta especificada.
        $textQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'text',)
        ));
        
        $urlQuery = $pagesController->Pages->Contents->find('all', array(
            'conditions' => array('Contents.page_id' => 'toursDescription',
                                'Contents.content_type' => 'url',)
        )); 
        

        // Ejecuta la consulta al tratar de convertirla en array.
        $texts   = $textQuery->toArray();
        $url    = $urlQuery->toArray();
                                
        //borrar el url, con url[0]->id
        $pagesController->Pages->Contents->deleteAll(array('Contents.id' => $url[0]->id));
        
        //se borra cada texto en la base
        foreach($texts as $text){
            $pagesController->Pages->Contents->deleteAll(array('Contents.id' => $text->id));
        }
                    
        foreach($_POST as $postValue){
            $content = $modelContents->Pages->Contents->newEntity();
            if(!empty($postValue)){
            if($i != 0){
                //Es texto
                $content->content_type = 'text';    
                $content->link_path = '';       
                $content->description = $postValue;                            
            }else{
                //Es url(solo pasa una vez)
                $content->content_type = 'url';
                if(preg_match('/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌​[\w\?‌​=]*)?/', $postValue)){                                    
                    preg_match('/(?<=\?v\=).+/', $postValue, $matches_out);            
                    $content->link_path = 'https://www.youtube.com/embed/'.$matches_out[0].'?autoplay=1&rel=0&showinfo=0';
                }else{
                    if(preg_match('/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/embed\/.+)/', $postValue)){
                        $content->link_path = $postValue;
                    }else{
                        $content->link_path = '';
                    }
                }

                $content->description = '';                         
            }
                $content->page_id = 'toursDescription';             
                $content->sequence_in_page = 0;
            }
                $modelContents->Pages->Contents->save($content); 
            $i++;
        }     
                $this->Flash->success("Cambios guardados exitosamente.");
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
     * Method to insert links into tours tables.
     * Created by Josin Madrigal & Isabel Chaves.
     * @return \Cake\Network\Response|null
     */
     public function toursLinks()
     {

        $callerTourPage = $this->request->getQuery('page');
        $this->loadModel('Pages');

        $this->Pages->Contents->deleteAll(array('Contents.content_type' => 'url', 'Contents.page_id' => $callerTourPage));
        
        $dataArray          = $this->request->getData();
        $urlArray           = array();
        $descriptionArray   = array();

        foreach ($dataArray as $key => $value) {
            if(strpos($key, 'url') !== false){
                if(preg_match('/https?:\/\/.+/', $value)){ 
                    $urlArray[] = $value;
                }
                else
                {
                   $this->Flash->success("Debe ingresar un URL válido.");
                }
            }
            elseif (strpos($key, 'description') !== false) {
                $descriptionArray[] = $value;
            }
        }

        for ($i=0; $i < count($urlArray); $i++) { 
            $content = $this->Pages->Contents->newEntity();
            $content->content_type  = 'url';    
            $content->page_id       = $callerTourPage;    
            $content->link_path     = $urlArray[$i];       
            $content->description   = $descriptionArray[$i]; 
            $content->sequence_in_page = $i; 
            $this->Pages->Contents->save($content);
        }

        $this->Flash->success("Cambios guardados exitosamente.");

        $this->redirect(['controller' => 'admin', 'action'=>$callerTourPage]);
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
        $this->loadModel('Pages');
        
        $this->set('userController', 'Pages');
        $this->set('userAction', 'tourSantaElena');

        if ($this->request->is(['patch', 'post', 'put'])) {

            if(is_uploaded_file($_FILES['imagen_fondo']['tmp_name'])) {
                if (isset($_POST['image_id'])) {
                    $imFile = $this->verify_image_file();
                    if (isset($imFile["error"])) {
                        $this->Flash->error($imFile["error"]);

                    } else {

                        $image = $this->Pages->Contents->get($_POST['image_id']);
                        $updateLinkPath = !strpos($image->link_path, $imFile["extension"]);
                        if($updateLinkPath) {
                            //Si la extension es diferente se debe cambiar
                            $image->link_path = preg_replace('/(png|jpg)$/i', $imFile["extension"], $image->link_path);
                        }
                        $name = str_replace("../resources/travel/santa_elena/", "", $image->link_path);
                        $path = 'resources'.DS.'travel'.DS.'santa_elena'.DS.$name;
                        //Se guarda la imagen en el directorio
                        if (!move_uploaded_file($_FILES['imagen_fondo']['tmp_name'], WWW_ROOT.$path)) {
                            $msj_error = "Error al intentar subir la imagen '". $_FILES['imagen_fondo']['tmp_name']."'. Pudo haber ocurrido un ataque.";
                            $this->Flash->error($msj_error);

                        }

                         else if($updateLinkPath) {
                            //Se actualiza la base con la nueva extension si es necesario
                            if (!$this->Pages->Contents->save($image)) {
                                $this->Flash->error("Error al intentar guardar la imagen");
                            }
                        }
                    }
                }
            } else {
                    $msj_error = 'Error subiendo imagen';
                    if ($_FILES['imagen_fondo']['error'] == 1) {
                        $msj_error = $msj_error.': Imagen muy pesada';
                    }
                    $this->Flash->error ($msj_error);
                }

            if (isset($_POST['text_id'])) {
                $text = $this->Pages->Contents->get($_POST['text_id']);
                $text->description = $_POST['descripcion'];
                if ($this->Pages->Contents->save($text)) {
                    $this->Flash->success("Cambios guardados");
                }

            }else{
                $this->Flash->error("Error al intentar guardar el texto.");
            }

        }

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
     * Admin tourBolanos method.
     * Created by Josin Madrigal & Isabel Chaves.
     * [GET]  Gets contents to display in view.
     * [POST] Updates database.
     * @return \Cake\Network\Response|null
     */
    public function tourBolanos()
    {
        $this->set('title', 'Administración del Recorrido de Isla Bolaños');
        $this->viewBuilder()->layout("defaultAdmin");
        $this->loadModel('Pages');
        
        $this->set('userController', 'Pages');
        $this->set('userAction', 'tourBolanos');
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(is_uploaded_file($_FILES['imagen_fondo']['tmp_name'])) {
                if (isset($_POST['image_id'])) {
                    $imFile = $this->verify_image_file();
                    if (isset($imFile["error"])) {
                        $this->Flash->error($imFile["error"]);

                    } else {
                        $image = $this->Pages->Contents->get($_POST['image_id']);
                        $updateLinkPath = !strpos($image->link_path, $imFile["extension"]);
                        if($updateLinkPath) {
                            //Si la extension es diferente se debe cambiar
                            $image->link_path = preg_replace('/(png|jpg)$/i', $imFile["extension"], $image->link_path);
                        }
                        $name = str_replace("../resources/travel/bolanos/", "", $image->link_path);
                        $path = 'resources'.DS.'travel'.DS.'bolanos'.DS.$name;
                        //Se guarda la imagen en el directorio
                        if (!move_uploaded_file($_FILES['imagen_fondo']['tmp_name'], WWW_ROOT.$path)) {
                            $msj_error = "Error al intentar subir la imagen '". $_FILES['imagen_fondo']['tmp_name']."'. Pudo haber ocurrido un ataque.";
                            $this->Flash->error($msj_error);

                        }

                         else if($updateLinkPath) {
                            //Se actualiza la base con la nueva extension si es necesario
                            if (!$this->Pages->Contents->save($image)) {
                                $this->Flash->error("Error al intentar guardar la imagen");
                            }
                        }
                    }
                }
                if (isset($_POST['text_id'])) {
                    $text = $this->Pages->Contents->get($_POST['text_id']);
                    $text->description = $_POST['descripcion'];
                    if ($this->Pages->Contents->save($text)) {
                        $this->Flash->success("Cambios guardados exitosamente.");
                    }
                }else{
                    $this->Flash->error("Error al intentar guardar el texto.");
                }
            } else {
                $msj_error = 'Error subiendo imagen';
                    if ($_FILES['imagen_fondo']['error'] == 1) {
                        $msj_error = $msj_error.': Imagen muy pesada';
                    }
                    $this->Flash->error ($msj_error);
                }
        }

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
     * Index method for administration of map
     * Created by José Daniel Sánchez
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
        $this -> set ('title', ''.($tourId == 1 ? 'Administración Isla Bola&ntilde;os' : 'Administración Pen&iacute;nsula de Santa Elena'));

        $this->set('userController', 'MapPoints');
        $this->set('userAction', 'view/'.$tourId);
        $this -> set ('tourId', $tourId);
        $this->set('mapPoints',$points);
    }

    /**
     * mapadd Method
     * Created by José Daniel Sánchez y Andreína Alvarado
     * [POST] Insert in database a map point and
     * all the content inside.
     * @return \Cake\Network\Response|null
     */
    public function mapadd($tourId)
    {
        $this->set('title', 'Agregar punto del mapa');

        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
        $modelPages = new PagesController();

        if ($this->request->is('post')) {

            /*Se crean los atributos para un punto del mapa*/
            $path = $tourId;
            $name = $this->request->data('name');
            $latitude = $this->request->data('latitude');
            $longitude = $this->request->data('longitude');
            $description_point = $this->request->data('descripcion_point');

            /* Contenido del punto del mapa*/
            $images_struct = $this->request->data('container_image');
            $video_struct = $this->request->data('container_video');

            /*Se busca el próximo id*/
            $points = $modelMapPoints->MapPoints->find('all', array(
                        'conditions' => array('MapPoints.path' => $tourId),
                        'fields'=>array('MapPoints.sequence_number') )
                      );   

            /*Se busca el próximo id*/
            $maxPoint = $points->max('sequence_number');

            /*Se genera el id de pages y el punto del mapa*/
            $sequence_number = ''.($maxPoint->sequence_number + 1).'';
            $key = 'P'.(($maxPoint->sequence_number) + 1).'R'.$tourId;

            /*Componentes de la nueva entidad Pages*/
            $dataPages = ['id' => $key ];

            /*Componentes de la nueva entidad MapPoints*/
            $dataPoint = [
                'path' => $path,
                'sequence_number' => $sequence_number,
                'page_id' => $key,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'name' => $name ];

            /* Crea las entidades Pages y MapPoints */
            $pagesPoint = $modelPages->Pages->newEntity();
            $mapPoint = $modelMapPoints->MapPoints->newEntity();

            /* Se asigna los componentes de las nuevas entidades Pages y MapPoints */
            $pagesPoint = $modelPages->Pages->patchEntity($pagesPoint, $dataPages);
            $mapPoint = $modelMapPoints->MapPoints->patchEntity($mapPoint, $dataPoint);

            /*Se guarda el elemento Pages en la base de datos*/
            if($modelPages->Pages->save($pagesPoint)) 
            {
                //$this->Flash->success(__('The Pages has been saved.'));
                
                /* Se guarda el elemento MapPoint en la base de datos */
                if ($modelMapPoints->MapPoints->save($mapPoint)) 
                {
                    //$this->Flash->success(__('The MapPoint has been saved.'));


                    /*-------------------------------------------------- Texto del punto ---------------------------------------------- */

                    if (!empty($description_point))
                    {
                        $contentText = $modelPages->Pages->Contents->newEntity();

                        /* Componentes de la nueva entidad de contenido */
                        $dataText = [
                            'page_id' => $key,
                            'link_path' => " ",
                            'description' => $description_point,
                            'content_type' => "text",
                            'sequence_in_page' => 0 ];

                         /* Se asigna el componente a la nueva entidad de contenido */   
                        $contentText = $modelPages->Pages->Contents->patchEntity($contentText, $dataText);

                        /* Se guarda entidad en la base de datos */
                        if ($modelPages->Pages->Contents->save($contentText))
                        {
                            //$this->Flash->success(__('The text has been saved.'));
                        }
                        else
                        {
                            //$this->Flash->error(__('The text could not be saved. Please, try again.'));     
                        }
                     }

                    /*------------------------------------------------- Imagenes del punto ---------------------------------------------- */

                    if (!empty($images_struct))
                    {
                        foreach($images_struct as $image) {

                            if ($image[0]['error'] != 4)
                            {
                                $contentImage = $modelPages->Pages->Contents->newEntity();

                                $path =  WWW_ROOT . 'resources/travel/maps/'.$tourId.'/' . $image[0]['name'];
                                $name_value = $image[0]['name'];

                                if (file_exists($path)) {
                                    $invalidate_path = true;
                                    $number_sequence = 2;

                                    while($invalidate_path == true)
                                    {
                                        $path =  WWW_ROOT . 'resources/travel/maps/'.$tourId.'/' . "r".$number_sequence."_".$image[0]['name'];  
                                        $name_value = "r".$number_sequence."_".$image[0]['name'];
                                        if (file_exists($path)) {
                                           $invalidate_path = true;
                                        }
                                        else
                                        {
                                           $invalidate_path = false;
                                        }

                                        $number_sequence = $number_sequence + 1;
                                    }
                                }

                                if ( move_uploaded_file($image[0]['tmp_name'], $path)) {
                                    // echo "El fichero es válido y se subió con éxito.\n";
                                } else {
                                    // echo "¡Posible ataque de subida de ficheros!\n";
                                }


                                /* Componentes de la nueva entidad de contenido */
                                $dataImage = [
                                    'page_id' => $key,
                                    'link_path' => "../../resources/travel/maps/".$tourId."/" .$name_value,
                                    'description' => $image[1],
                                    'content_type' => "image",
                                    'sequence_in_page' => 0 ];

                                /* Se asigna el componente a la nueva entidad de contenido */   
                                $contentImage  = $modelPages->Pages->Contents->patchEntity($contentImage , $dataImage);

                                /* Se guarda entidad en la base de datos */
                                if ($modelPages->Pages->Contents->save($contentImage))
                                {
                                    //$this->Flash->success(__('The image has been saved.'));
                                }
                                else
                                {
                                    //$this->Flash->error(__('The image could not be saved. Please, try again.'));     
                                }


                            }
                        }
                    }

                    /*------------------------------------------------- Video del punto ---------------------------------------------- */

                    if (!empty($video_struct))
                    {
                        /* Se itera sobre los componentes de video del punto del mapa */
                        foreach($video_struct as $video) 
                        {
                            /* Se crea una entidad de tipo contenido */
                            $contentVideo = $modelPages->Pages->Contents->newEntity();

                            /* Componentes de la nueva entidad de contenido */
                            $dataVideo = [
                                'page_id' => $key,
                                'link_path' => $video[1],
                                'description' => $video[0],
                                'content_type' => "video",
                                'sequence_in_page' => 0 ];

                             /* Se asigna el componente a la nueva entidad de contenido */   
                            $contentVideo = $modelPages->Pages->Contents->patchEntity($contentVideo, $dataVideo);

                            /* Se guarda entidad en la base de datos */
                            if ($modelPages->Pages->Contents->save($contentVideo))
                            {
                                //$this->Flash->success(__('The video has been saved.'));
                            }
                            else
                            {
                                //$this->Flash->error(__('The video could not be saved. Please, try again.'));     
                            }

                        }
                    }

                    $this->Flash->success(__('Punto del recorrido ingresado correctamente'));     
                    return $this->redirect(['controller'=> 'admin','action' => 'mapindex',$tourId]);
                }
                else
                {
                    //$this->Flash->error(__('The Point could not be saved. Please, try again.'));              
                }
            }
            else
            {
                //$this->Flash->error(__('The Pages could not be saved. Please, try again.'));
            }
        }

        $pages = $modelMapPoints->MapPoints->Pages->find('list', ['limit' => 200]);
        $this->set(compact('mapPoint', 'pages'));
        $this->set('_serialize', ['mapPoint']);
        $this -> set ('tourId', $tourId);

    }

    /**
     * mapedit method
     * Created by José Daniel Sánchez y Andreína Alvarado
     * [POST] Update in database a map point and
     * all the content inside.
     * @return \Cake\Network\Response|null
     */
    public function mapedit($pointId){
        $this->set('title', 'Editar un punto en el mapa');
        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
        $pagesController = new PagesController();
        
        $newPointName = "";
        
        $query = $modelMapPoints->MapPoints->find('all', array('conditions' => array('MapPoints.page_id' => $pointId)));
        $point = $query->first();
        $textContents = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'text'))); 
        $imageContents = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'image'))); 
        $videoContents = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'video'))); 
        
        $point = $query->first();

        $this->set('newPointName', $newPointName);
        $this->set('point', $point);
        $this->set('pointId', $pointId);
        $this->set('textContents', $textContents);
        $this->set('imageContents', $imageContents);
        $this->set('videoContents', $videoContents);
        $this->set('tourId', $point->path);
        $path = $point->path;
        
        $this->viewBuilder()->layout("defaultAdmin");
        $modelMapPoints = new MapPointsController();
        $modelPages = new PagesController();
        
        $pages = $modelMapPoints->MapPoints->Pages->find('list', ['limit' => 200]);
        $this->set(compact('mapPoint', 'pages'));
        $this->set('_serialize', ['mapPoint']);

        if ($this->request->is('post')) {
            //$debug($this->request->data($pointId));
            $pointName = $this->request->data('pointName');
            $pointLatitude = $this->request->data('latitude');
            $pointLongitude = $this->request->data('longitude');
            $descripcion_point = $this->request->data('descripcion_point');
            $container_image_delete = $this->request->data('container_image_delete');
            $container_image = $this->request->data('container_image');
            $container_image_new = $this->request->data('container_image_new');
            $container_video_delete = $this->request->data('container_video_delete');
            $container_video = $this->request->data('container_video');
            $container_video_new = $this->request->data('container_video_new');
            
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/
            /**************************************************** Nombre del punto *************************************************/
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/
            
            if($pointName != $point->name){
                $point->name = $pointName;
                $point->latitude = $pointLatitude;
                $point->longitude = $pointLongitude;
                
                /* Se guarda entidad en la base de datos */
                if ($modelMapPoints->MapPoints->save($point))
                {
                    //$this->Flash->success(__('The point has been modified.'));
                }
                else
                {
                    $this->Flash->error(__('The point could not be modified. Please, try again.'));     
                }
            }
            
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/
            /***************************************************** Texto del punto *************************************************/
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/

            /* Si el punto no tenía texto, entonces se va a agregar */
            if($textContents->count() == 0){
                if(!empty($descripcion_point)){
                    $contentText = $modelPages->Pages->Contents->newEntity();

                    $textContent = $modelPages->Pages->Contents->find('all', array(
                                        'fields'=>array('Contents.id') )
                                   );   

                    $maxText = $textContent->max('id');

                    /* Componentes de la nueva entidad de contenido */
                    $dataText = [
                        'id' => ($maxText->id + 1),
                        'page_id' => $point->page_id,
                        'link_path' => " ",
                        'description' => $descripcion_point,
                        'content_type' => "text",
                        'sequence_in_page' => 0 ];
                
                    /* Se asigna el componente a la nueva entidad de contenido */   
                    $contentText = $modelPages->Pages->Contents->patchEntity($contentText, $dataText);

                    /* Se guarda entidad en la base de datos */
                    if ($modelPages->Pages->Contents->save($contentText))
                    {
                        //$this->Flash->success(__('The text has been saved.'));
                    }
                    else
                    {
                        $this->Flash->error(__('The text could not be saved. Please, try again.'));     
                    }
                }
            }
            /* Si tenía texto, entonces se va a modificar */
            else{
                $contentText = $textContents->first();
                if($contentText->description != $descripcion_point){
                    $contentText->description = $descripcion_point;
                    
                    /* Se guarda entidad en la base de datos */
                    if ($modelPages->Pages->Contents->save($contentText))
                    {
                        //$this->Flash->success(__('The text has been modified.'));
                    }
                    else
                    {
                        $this->Flash->error(__('The text could not be modified. Please, try again.'));     
                    }
                }
            }
            
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/
            /*************************************************** Imágenes del punto ************************************************/
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/
            
            /*--------------------------------------------------- Caso de eliminar ----------------------------------------------- */
            
            if($container_image_delete != null){
                foreach($container_image_delete as $image){
                    $query = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.description' => $image[0], 'Contents.link_path' => $image[1]))); 
                    $imageContent = $query->first();
                    
                    /* Se guarda entidad en la base de datos */
                    if ($modelPages->Pages->Contents->delete($imageContent))
                    {
                        //$this->Flash->success(__('The image has been removed.'));
                    }
                    else
                    {
                        $this->Flash->error(__('The image could not be removed. Please, try again.'));     
                    }
                }
            }
            
            /*---------------------------------------------------- Caso de agregar ----------------------------------------------- */
            
            if($container_image_new != null){
                foreach($container_image_new as $image) {
                    if (true)
                    {
                        $contentImageNew = $modelPages->Pages->Contents->newEntity();

                        $imagesPointContent = $modelPages->Pages->Contents->find('all', array(
                                            'fields'=>array('Contents.id') )
                                       );   

                        $maxImage = $imagesPointContent->max('id');

                        $path =  WWW_ROOT . 'resources/travel/maps/'.$point->path.'/' . $image[1]['name'];
                        $name_value = $image[1]['name'];

                        if (file_exists($path)) {
                            $invalidate_path = true;
                            $number_sequence = 2;

                            while($invalidate_path == true)
                            {
                                $path =  WWW_ROOT . 'resources/travel/maps/'.$point->path.'/' . "r".$number_sequence."_".$image[1]['name']; 
                                $name_value = "r".$number_sequence."_".$image[1]['name'];
                                if (file_exists($path)) {
                                   $invalidate_path = true;
                                }
                                else
                                {
                                   $invalidate_path = false;
                                }

                                $number_sequence = $number_sequence + 1;
                            }
                        }

                        if(move_uploaded_file($image[1]['tmp_name'], $path)) {
                            //echo "El fichero es válido y se subió con éxito.\n";
                        } 
                        else{
                            //echo "¡Posible ataque de subida de ficheros!\n";
                        }

                        if($image[0] != ""){
                            /* Componentes de la nueva entidad de contenido */
                            $dataImage = [
                                'page_id' => $point->page_id,
                                'link_path' => "../../resources/travel/maps/".$point->path."/" .$name_value,
                                'description' => $image[0],
                                'content_type' => "image",
                                'sequence_in_page' => 0 ];
                        }
                        else{
                            /* Componentes de la nueva entidad de contenido */
                            $dataImage = [
                                'page_id' => $point->page_id,
                                'link_path' => "../../resources/travel/maps/".$point->path."/" .$name_value,
                                'description' => " ",
                                'content_type' => "image",
                                'sequence_in_page' => 0 ];
                        }

                        /* Se asigna el componente a la nueva entidad de contenido */   
                        $contentImageNew  = $modelPages->Pages->Contents->patchEntity($contentImageNew , $dataImage);

                        /* Se guarda entidad en la base de datos */
                        if ($modelPages->Pages->Contents->save($contentImageNew))
                        {
                            //$this->Flash->success(__('The image has been saved.'));
                        }
                        else
                        {
                            $this->Flash->error(__('The image could not be saved. Please, try again.'));     
                        }
                    }
                }
            }
            
            /*-------------------------------------------------- Caso de modificar ----------------------------------------------- */
            
            if($container_image != null){
                $images = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'image'))); 
                foreach($images as $image){
                    if (isset($container_image[$image->id])){
                        if($container_image[$image->id] != null){
                            if($image->description != $container_image[$image->id][0]){
                                $image->description = $container_image[$image->id][0];
                            
                                /* Se guarda entidad en la base de datos */
                                if ($modelPages->Pages->Contents->save($image))
                                {
                                    //$this->Flash->success(__('The image has been modified.'));
                                }
                                else
                                {
                                    $this->Flash->error(__('The image could not be modified. Please, try again.'));     
                                }
                            }
                        }
                    }

                }
            }
            
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/
            /**************************************************** Videos del punto *************************************************/
            /***********************************************************************************************************************/
            /***********************************************************************************************************************/
            
            /*--------------------------------------------------- Caso de eliminar ----------------------------------------------- */
            
            if($container_video_delete != null){
                foreach($container_video_delete as $video){
                    $query = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.description' => $video[0], 'Contents.link_path' => $video[1]))); 
                    $videoContent = $query->first();
                    
                    /* Se guarda entidad en la base de datos */
                    if ($modelPages->Pages->Contents->delete($videoContent))
                    {
                        //$this->Flash->success(__('The video has been removed.'));
                    }
                    else
                    {
                        $this->Flash->error(__('The video could not be removed. Please, try again.'));     
                    }
                }
            }
            
            /*---------------------------------------------------- Caso de agregar ----------------------------------------------- */
            
            if($container_video_new != null){
                foreach($container_video_new as $video){
                    $contentVideoNew = $modelPages->Pages->Contents->newEntity();

                    if($video[0] != ""){
                    /* Componentes de la nueva entidad de contenido */
                    $dataVideo = [
                        'page_id' => $point->page_id,
                        'link_path' => $video[1],
                        'description' => $video[0],
                        'content_type' => "video",
                        'sequence_in_page' => 0 ];
                    }
                    else{
                        /* Componentes de la nueva entidad de contenido */
                    $dataVideo = [
                        'page_id' => $point->page_id,
                        'link_path' => $video[1],
                        'description' => " ",
                        'content_type' => "video",
                        'sequence_in_page' => 0 ];
                    }
                    

                    /* Se asigna el componente a la nueva entidad de contenido */   
                    $contentVideoNew  = $modelPages->Pages->Contents->patchEntity($contentVideoNew , $dataVideo);

                    /* Se guarda entidad en la base de datos */
                    if ($modelPages->Pages->Contents->save($contentVideoNew))
                    {
                        //$this->Flash->success(__('The video has been saved.'));
                    }
                    else
                    {
                        $this->Flash->error(__('The video could not be saved. Please, try again.'));     
                    }
                }
            }
            
            /*-------------------------------------------------- Caso de modificar ----------------------------------------------- */
            
            if($container_video != null){
                $videos = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $point->page_id, 'Contents.content_type' => 'video'))); 
                if ($videos != null){
                    foreach($videos as $video){
                        if(isset($container_video[$video->id])){
                        if($container_video[$video->id] != null){
                            if($video->description != $container_video[$video->id][0]){
                                $video->description = $container_video[$video->id][0];
                            
                                /* Se guarda entidad en la base de datos */
                                if ($modelPages->Pages->Contents->save($video))
                                {
                                    //$this->Flash->success(__('The video has been modified.'));
                                }
                                else
                                {
                                    $this->Flash->error(__('The video could not be modified. Please, try again.'));     
                                }
                            }
                        }
                    }
                    }
                }
            }
        
        $this->Flash->success(__('El punto ha sido modificado correctamente'));
        }
    }
    
    /**
     * mapdelete method
     * Created by José Daniel Sánchez y Andreína Alvarado
     * [POST] Delete in database a map point and
     * all the content inside.
     * @return \Cake\Network\Response|null
     */
    public function mapdelete($pointId){
        $modelPages = new PagesController();
		$modelMapPoints = new MapPointsController();
		
		$queryPages = $modelPages->Pages->find('all', array('conditions' => array('Pages.id' => $pointId)));
		$queryPoint = $modelMapPoints->MapPoints->find('all', array('conditions' => array('MapPoints.page_id' => $pointId)));
		$point = $queryPoint->first();
		$tourId = $point->path;
		$page = $queryPages->first();
		
		if($this->request->is('post')){
			/* Se guarda entidad en la base de datos */
			if ($modelPages->Pages->delete($page))
			{
				$this->Flash->success(__('Punto del recorrido eliminado correctamente.'));
			}
			else
			{
				$this->Flash->error(__('The point could not be removed. Please, try again.'));     
			}
		}
		
		$this->redirect('/admin/mapindex/'.$tourId);
	}
	
	/**
	 * Index method for administration of gallery
	 * Created by Andreína Alvarado
	 * @return \Cake\Network\Response|null
	 */
	public function gallery($galleryId)
	{
		$this->viewBuilder()->layout("defaultAdmin");
		$pagesController = new PagesController();
		$galleryName = '';
		$galleryPage = '';
		
		$this->set('userController', 'Pages');
		if($galleryId == 1){
			$galleryName = 'Bolanos';
			$galleryPage = 'gallery1';
			$this->set('userAction', 'gallery/1');
		}
		else{
			$galleryName = 'SantaElena';
			$galleryPage = 'gallery2';
			$this->set('userAction', 'gallery/2');
		}	

		$images = $pagesController->Pages->Contents->find('all', array(
				'conditions' => array('contents.page_id' => $galleryPage)));

        if ($this->request->is('post')) {
            $container_image_delete = $this->request->data('container_image_delete');
            $container_image = $this->request->data('container_image');
            $container_image_new = $this->request->data('container_image_new');
            
            /*--------------------------------------------------- Caso de eliminar ----------------------------------------------- */
            
            if($container_image_delete != null){
                foreach($container_image_delete as $image){
                    $query = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.description' => $image[0], 'Contents.link_path' => $image[1]))); 
                    $imageContent = $query->first();
                    
                    /* Se guarda entidad en la base de datos */
                    if ($pagesController->Pages->Contents->delete($imageContent))
                    {
                        $this->Flash->success(__('La imagen ha sido eliminada exitosamente.'));
                    }
                    else
                    {
                        $this->Flash->error(__('La imagen no puede ser eliminada. Por favor, intente de nuevo.'));     
                    }
                }
            }
            
            /*---------------------------------------------------- Caso de agregar ----------------------------------------------- */
            
            if($container_image_new != null){
                foreach($container_image_new as $image) {
					$contentImageNew = $pagesController->Pages->Contents->newEntity();
					$path =  WWW_ROOT . 'resources/gallery/'.$galleryName.'/'. $image[1]['name'];
					$name_value = $image[1]['name'];

					if (file_exists($path)) {
						$invalidate_path = true;
						$number_sequence = 2;

						while($invalidate_path == true)
						{
							$path =  WWW_ROOT . 'resources/gallery/'.$galleryName.'/' . "r".$number_sequence."_".$image[1]['name']; 
							$name_value = "r".$number_sequence."_".$image[1]['name'];
							if (file_exists($path)) { $invalidate_path = true; }
							else{ $invalidate_path = false; }

							$number_sequence = $number_sequence + 1;
						}
					}

					if(move_uploaded_file($image[1]['tmp_name'], $path)) { 
						//echo "El fichero es válido y se subió con éxito.\n"; 
					} 
					else{ 
						//echo "¡Posible ataque de subida de ficheros!\n"; 
					}

					if($image[0] != ""){
						/* Componentes de la nueva entidad de contenido */
						$dataImage = [
							'page_id' => $galleryPage,
							'link_path' => "../../resources/gallery/".$galleryName."/" .$name_value,
							'description' => $image[0],
							'content_type' => "image",
							'sequence_in_page' => 0 ];
					}

					/* Se asigna el componente a la nueva entidad de contenido */   
					$contentImageNew  = $pagesController->Pages->Contents->patchEntity($contentImageNew , $dataImage);

					/* Se guarda entidad en la base de datos */
					if ($pagesController->Pages->Contents->save($contentImageNew)){ 
						$this->Flash->success(__('La imagen ha sido agregada exitosamente')); 
					}
					else{ 
						$this->Flash->error(__('No es posible agregar la imagen. Por favor, intente de nuevo.')); 
					}
                }
            }
            
            /*-------------------------------------------------- Caso de modificar ----------------------------------------------- */
            
            if($container_image != null){
                $images = $pagesController->Pages->Contents->find('all', array('conditions' => array('Contents.page_id' => $galleryPage, 'Contents.content_type' => 'image'))); 
                foreach($images as $image){
                    if (isset($container_image[$image->id])){
                        if($container_image[$image->id] != null){
                            if($image->description != $container_image[$image->id][0]){
                                $image->description = $container_image[$image->id][0];
                            
                                /* Se guarda entidad en la base de datos */
                                if ($pagesController->Pages->Contents->save($image))
                                {
                                    $this->Flash->success(__('La imagen ha sido modificada exitosamente.'));
                                }
                                else
                                {
                                    $this->Flash->error(__('La imagen no puede ser modificada. Por favor, intente de nuevo.'));     
                                }
                            }
                        }
                    }

                }
            }
        }
		$this -> set ('title', ''.($galleryName == 'Bolanos' ? 'Administración de la galería de isla Bola&ntilde;os' : 'Administración de la galería de pen&iacute;nsula de Santa Elena'));
		
		$this->set('images', $images);
		$this->set('galleryId', $galleryId);
	}
}
