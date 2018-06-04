<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('InternalPages/projects');
        $this->set('projects', $this->Projects->find()
                                            ->where(['user_id' => $this->Auth->user('id')])
                                            ->all());
        $this->set('idTask', 0);
        $isUser = false;
        $this->set('isUser', $isUser);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project->name = "nombre";//$this->request->data['Form']['Name'];
            $project->user_id = $this->Auth->user('id');
            $project->priority_id = 1;

            if ($this->Projects->save($project)) {
                return $this->redirect(['controller' => 'Tasks', 'action' => 'index', 'id' => $project->id]);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        
        $priorities = $this->Projects->Priorities->find('list', ['limit' => 200]);
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $this->set(compact('project', 'priorities', 'users'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('InternalPages/newLayout');
        $project = $this->Projects->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project->name = $this->request->data['Form']['Name'];
            $project->description = $this->request->data['Form']['Description'];
            if(!empty($this->request->data['Form']['Created'])){
                $create = date_create_from_format('j#m#Y', $this->request->data['Form']['Created']);
                $project->created = date_format($create, 'Y-m-d H:i:s'); 
            }
            if(!empty($this->request->data['Form']['Ended'])){
                $end = date_create_from_format('j#m#Y', $this->request->data['Form']['Ended']);
                $project->ended = date_format($end, 'Y-m-d H:i:s');
            }

            if ($this->Projects->save($project)) {
                $this->Flash->success(__('ok'), ['params'=>['name'=>$project->name, 'action'=>'edited', 'type'=>'project']]);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $this->set('project', $project);
        //$priorities = $this->Projects->Priorities->find('list', ['limit' => 200]);
        $user = $this->Auth->user('id');
        $this->set(compact('project', 'user'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {            
            $this->Flash->save(__('ok_delete_project'), ['params'=>['type'=>'project', 'name'=>$project->name, 'action'=>'deleted']]);
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function testing()
    {
        $project = $this->Projects->newEntity();
        $project->name = "testing";
        if ($this->Projects->save($project)) {
            $this->Flash->success(__('The project has been saved.'));
        } else {
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
    }
}
