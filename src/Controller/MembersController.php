<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 */
class MembersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('InternalPages/newLayout');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id=null)
    {
        $project = $this->Members->Projects->get($id);
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $members = $this->paginate($this->Members->find()->where(['project_id'=>$id]));

        $this->loadModel('Teams');
        $teams = $this->Teams->find()
            ->where(['user_id'=>$this->Auth->user('id')])
            ->all();
        $this->set(compact('members', 'project', 'teams'));
        $this->set('_serialize', ['members', 'project', 'teams']);
    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => ['Projects']
        ]);

        $this->set('member', $member);
        $this->set('_serialize', ['member']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            $member->user_id_owner = $this->Auth->user('id');
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['controller'=>'Members', 'action' => 'index', $member->project_id]);
            } else {
                $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
        }
        $users = $this->Members->Users->find('list', ['limit' => 200]);
        $projects = $this->Members->Projects->find('list', ['limit' => 200]);
        $this->set(compact('member', 'users', 'projects'));
        $this->set('_serialize', ['member']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['controller'=>'Members', 'action' => 'index', $member->project_id]);
            } else {
                $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
        }
        $users = $this->Members->Users->find('list', ['limit' => 200]);
        $projects = $this->Members->Projects->find('list', ['limit' => 200]);
        $this->set(compact('member', 'users', 'projects'));
        $this->set('_serialize', ['member']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Members', 'action' => 'index', $member->project_id]);
    }

    public function addAllMembers($data=null){
        $this->loadModel('TeamsUsers');
        $this->loadModel('Users');
        list($idTeam, $projectId) = !is_null($data) ? explode('a', $data) : '';
        $teamsUsers = $this->TeamsUsers->find()->where(['team_id'=>$idTeam])->all();
        $members = $this->Members->find()->where(['project_id'=>$projectId]);
        if(!is_null($teamsUsers) && !empty($teamsUsers)){
            foreach ($teamsUsers as $teamUser) {
                if(!$this->__isOnTeam($members, $teamUser)){
                    $member = $this->Members->newEntity();
                    $member->project_id = $projectId;
                    $member->user_id = $teamUser->user_id;
                    $user = $this->Users->get($teamUser->user_id);
                    $member->user_id_owner = $this->Auth->user('id');
                    if ($this->Members->save($member)) {
                        $this->Flash->save(__('ok'), ['params'=>['type'=>'member', 'name'=> $user->email, 'action'=> 'add to the members']]);
                    } else {
                        $this->Flash->save(__('bad'), ['params'=>['type'=>'member', 'name'=> $user->email, 'action'=> 'add to the members']]);
                    }
                }
            }
        }
        $this->set(compact('idTeam', 'projectId', 'teamsUsers', 'members'));
        $this->set('_serialize', ['idTeam', 'projectId', 'teamsUsers', 'members']);
        $this->redirect(['controller'=>'Members', 'action'=>'index', $projectId]);    
    }

    private function __isOnTeam($members, $teamUser){

        if(is_null($members))
            return false;

        foreach ($members as $member) {
            if($teamUser->user_id == $member->user_id){
                return true;
            }
        }
        return false;
    }
}
