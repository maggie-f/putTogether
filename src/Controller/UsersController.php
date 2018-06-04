<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\UserForm;
/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'register']);
        $isUser = true;
        $this->set('isUser', $isUser);
    }

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
        $user = $this->Users->get($id, [
        'contain' => ['Bookmarks']
        ]);
        
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    
    /**
    * Edit method
    *
    * @param string|null $id User id.
    * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('InternalPages/projects');
        $user = $this->Users->get($this->Auth->user('id'), [
        'contain' => ['Projects']
        ]);
        $projects = $user->projects;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            } else {
                (__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user', 'projects'));
        $this->set('_serialize', ['user', 'projects']);
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
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
    */
    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user->email = $this->request->data['Form']['Email'];
            $user->password = $this->request->data['Form']['Password'];
            if ($this->Users->save($user)) {
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
    * Login method
    *
    * @return \Cake\Network\Response|void Redirects on successful login, renders view otherwise.
    */
    public function login()
    {
        $this->set('login', 'View Login Users');
        $this->viewBuilder()->layout('InternalPages/sign');
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl('/projects'));
            }
            $this->Flash->error('Sorry, wrong pass or user.');
        }
    }
    
    public function logout(){
        $this->redirect($this->Auth->logout());
    }
}