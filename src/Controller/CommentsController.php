<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Network\Session\Handler;
/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 */
class CommentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('InternalPages/tasks');
        $this->loadComponent('RequestHandler');
        $this->set('projects', $this->Comments->Projects->find()
                                            ->where(['user_id' => $this->Auth->user('id')])
                                            ->all());
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id=null)
    {
        $project = $this->Comments->Projects->get($id);
        $comments = $this->Comments->find()->where(['project_id = ' => $project->id])->contain(['Users']);
        $this->set('project', $project);
        $this->set(compact('comments'));
        $this->set('_serialize', ['comments']);
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
         $comment = $this->Comments->get($id, [
             'contain' => []
         ]);

        $this->set('comment', $comment);
        $this->set('_serialize', ['comment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $idProject = $this->request->data['Form']['idPro'];
            $comment->comment = $this->request->data['Form']['Comment'];
            $comment->project_id = $idProject;
            $comment->user_id = $this->Auth->user('id');

            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'index', $idProject]);
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('comment'));
        $this->set('_serialize', ['comment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comments->get($id, []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $idProject = $this->request->data['Form']['idPro'];
            $comment->comment = $this->request->data['Form']['Comment'];
            $comment->project_id = $idProject;
            $comment->user_id = $this->Auth->user('id');

            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'index', $idProject]);
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('comment'));
        $this->set('_serialize', ['comment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
