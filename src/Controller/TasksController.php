<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\StatesController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
* Tasks Controller
*
* @property \App\Model\Table\TasksTable $Tasks
*/
class TasksController extends AppController
{
    public $paginate = [
    'limit' => 20,
    'order' => [
        'Tasks.state_id' => 'asc'
        ]
    ];
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('InternalPages/newLayout');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Paginator');
    }
    
    /**
    * Index method
    *
    * @return \Cake\Network\Response|null
    *    public function index()
    *   {
    *      $this->paginate = [
    *         'contain' => ['Priorities', 'Users', 'Projects', 'States']
    *    ];
    *   $tasks = $this->paginate($this->Tasks);
    *
    *     $this->set(compact('tasks'));
    *     $this->set('_serialize', ['tasks']);
    *}
    */
    public function index($id=null)
    {
        if($id!=null){
            $tasks = $this->paginate($this->Tasks->find()->where(['project_id = ' => $id]));
            $project = $this->Tasks->Projects->get($id);
            $this->set('idProjecto', $project->id);
        }else{
            $idProj = $this->request->query('id');
            $tasks = $this->paginate($this->Tasks->find()->where(['project_id = ' => $idProj]));
            $project = $this->Tasks->Projects->get($idProj);
            $this->set('idProjecto', $idProj);
        }

        $this->set('tasks', $tasks);
        $this->set('project', $project);
    }
    
    /**
    * View method
    *
    * @param string|null $id Task id.
    * @return \Cake\Network\Response|null
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
        'contain' => ['Priorities', 'Users', 'Projects', 'States']
        ]);
        
        $this->set('task', $task);
        $this->set('_serialize', ['task']);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task->name = $this->request->data['Form']['Name0'];
            $task->description = $this->request->data['Form']['Description0'];
            if(!empty($this->request->data['Form']['Created0'])){
                $create = date_create_from_format('j#m#Y', $this->request->data['Form']['Created0']);
                $task->created = date_format($create, 'Y-m-d H:i:s');   
            }
            if(!empty($this->request->data['Form']['Ended0'])){
                $end = date_create_from_format('j#m#Y', $this->request->data['Form']['Ended0']);
                $task->ended = date_format($end, 'Y-m-d H:m:s');
            }
            $task->project_id = $this->request->data['Form']['idPro'];
            $task->user_id = $this->Auth->user('id');
            if ($this->Tasks->save($task)) {
                $this->Flash->save(__('ok'), ['params'=>['name'=> $task->name, 'action'=>'added', 'type'=>'task']]);
                return $this->redirect(['controller' => 'Tasks', 'action' => 'index', 'id' => $this->request->data['Form']['idPro']]);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }

        //$priorities = $this->Tasks->Priorities->find('list', ['limit' => 200]);
        $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        //$projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
        $this->set(compact('task', 'users'));
        $this->set('_serialize', ['task']);
    }
    
    /**
    * Edit method
    *
    * @param string|null $id Task id.
    * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($this->request->data['Form']['task']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task->name = $this->request->data['Form']['Name0'];
            $task->description = $this->request->data['Form']['Description0'];
            $create = date_create_from_format('j#m#Y', $this->request->data['Form']['Created0']);
            $task->created = date_format($create, 'Y-m-d H:m:s');
            $end = date_create_from_format('j#m#Y', $this->request->data['Form']['Ended0']);
            $task->ended = date_format($end, 'Y-m-d H:m:s');
            $task->user_id = $this->Auth->user('id');
            if ($this->Tasks->save($task)) {
                $this->Flash->save(__('ok'), ['params'=>['name'=> $task->name, 'action'=>'edited', 'type'=>'task']]);
                return $this->redirect(['action' => 'index', 'id' => $this->request->data['Form']['idPro']]);
            } else {
                $this->Flash->error(__('This is not post action.'));
            }
        }

        $priorities = $this->Tasks->Priorities->find('list', ['limit' => 200]);
        $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
        $this->set(compact('task', 'priorities', 'users', 'projects'));
        $this->set('_serialize', ['task']);
    }
    
    /**
    * Delete method
    *
    * @param string|null $id Task id.
    * @return \Cake\Network\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        $idProject = $task->project_id;
        if ($this->Tasks->delete($task)) {
            $this->Flash->save(__('ok'), ['params'=>['name'=> $task->name, 'action'=>'deleted', 'type'=>'task']]);
        } else {
            $this->Flash->save(__('ok'), ['params'=>['name'=> $task->name, 'action'=>'deleted', 'type'=>'task']]);
        }
        return $this->redirect(['action' => 'index', 'id' => $idProject]);
    }
    
    public function getAjax()
    {
        $name = $this->request->query('name');
        die($name);
    }
    
    /*
    * Get the data of one task
    */
    public function getTaskData()
    {
        $id = $this->request->query('id');
        $task = $this->Tasks->get($id);
        die(json_encode($task));
    }

    public function editState()
    {
        $idTask = $this->request->query('id');
        $code = $this->request->query('state');
        $task = $this->Tasks->get($idTask);

        $selectedState = $this->Tasks->States->find()->where(['code'=>$code])->first();
        $task->state_id = intval($selectedState->id);
        
        if($this->Tasks->save($task)){
            die(json_encode(['codeID' => $selectedState]));
        }else{
            die(json_encode($_messageTemplate));
        }
    }

    public function checkState(){
        $session = $this->request->session();
        $taskEditor = $session->read('taskEditor');
        if (is_null($taskEditor)) {
            $taskEditor = false;
            $session->write('taskEditor', $taskEditor);
        } else {
            $taskEditor = $session->read('taskEditor');
            $session->write('taskEditor', !$taskEditor);
        }
        die(json_encode($taskEditor));
    }
}