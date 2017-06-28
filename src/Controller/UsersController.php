<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Network\Exception\SocketException;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time; 

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
         */
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $datos = $this->request->getData ();
            $user = $this->Users->patchEntity($user, $datos);
            //$user -> username = $datos ['username'];
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Se eliminó el usuario.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el usuario, favor inténtelo nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * login method.
     * Created by Christian Durán.
     * Allows logging in for administrative purposes.
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        $this -> set ('title', 'Iniciar sesión');
        $this -> viewBuilder() -> layout ('defaultAdmin');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Datos erróneos, intente nuevamente.'));
        }
    }
    
    /** 
     * Method to send an email to recover the account.
     * Created by Christian Durán.
     * Sends a mail to the admin with a message to recover the account.
     */
    public function forgottenPassword () {
        $this->set('title', 'Contraseña olvidada');
        $email = new Email('default');
        $tokenNum = bin2hex(random_bytes(32));
        $tokenTable = TableRegistry::get ('tokens');
        $token = $tokenTable->newEntity();
        $token -> tokenNum = $tokenNum;
        $token -> created  = Time::now();
        $tokenTable-> save ($token);
        try {
            $email
                ->transport ('gmail')
                ->from ('soporte.recorridosgeologicos@gmail.com')
                ->to ('soporte.recorridosgeologicos@gmail.com')
                ->emailFormat('html')
                ->subject ('Reestablecimiento de contraseña')
                ->send ("Para recuperar la contraseña usar el siguiente enlace:\n"
                    ."http://rutageologica.ucr.ac.cr/users/recover/".$tokenNum);
            $this->set ('sentMessage', true);
        } catch (\Exception $e) {
            $this->Flash->error ('No se pudo enviar el correo de recuperación, posiblemente la contraseña de gmail cambió. Pedir a un administrador que coloque la nueva en config/app.php');
            $this->set ('sentMessage', false);
        }
    }

    /** 
     * Method to create a new password for the user.
     */
    public function recover ($token) {
    // Esta función supone que solo existe la cuenta de administrador.
    // Si se cambia la contraseña de la cuenta de correo hay que cambiarlo
    // en config/app.php o no se van a poder enviar los correos.
        $this->set('title', 'Recuperar contraseña');
        $tokenTable = TableRegistry::get ('tokens');
        $tokens = $tokenTable -> find ('all')->toArray ();
        $isCorrect = false;
        foreach ($tokens as $tokenToCheck) {
            if ($tokenToCheck -> created >= new Time('yesterday') && ($tokenToCheck -> tokenNum == $token)) {
                // Token correcto.
                $isCorrect = true;
            }
        }
        if (!$isCorrect) {
            $this->redirect (['controller' => 'Users', 'action' => 'login']);
        } else {
            if ($this->request->is('post')) {
               if (isset($this->request->data ['Contraseña'])) {
                    $admins = $this->Users->find('all')->toArray();
                    assert (count($admins) == 1);
                    $admin = $admins [0];
                    //assert ($admin -> username == 'admin');
                    $admin -> password = $this->request->data ['Contraseña'];
                    if ($this -> Users -> save ($admin)) {
                        // Se borran los tokens:
                        // Ojo que si luego se agregan usuarios esto borraría los de todos.
                        // Tampoco permite tener una bitácora de los tokens.
                        foreach ($tokens as $token) {
                            $tokenTable -> delete ($token);
                        }
                        $this -> redirect (['controller' => 'Users', 'action' => 'login']);
                        $this -> Flash -> success (__('Contraseña cambiada correctamente'));
                    } else {
                        $this -> Flash -> error (__('Error cambiando contraseña, favor intentar nuevamente.'));
                    }
                }
            }
        }
    }

    /**
     * logout method.
     * Created by Christian Durán.
     * This method logout Administrative site
     * @return \Cake\Network\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
