<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Core\Exception\Exception;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 */
class FilesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('InternalPages/tasks');
        $this->loadComponent('RequestHandler');
        $this->set('projects', $this->Files->Projects->find()
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
        $project = $this->Files->Projects->get($id);
        $this->paginate = ['contain' => ['Projects', 'Users'] ];
        $files = $this->paginate($this->Files->find()->where(['project_id'=>$id]));

        $this->set(compact('files', 'project'));
        $this->set('_serialize', ['files', 'project']);
    }

    /**
     * View method
     *
     * @param string|null $id File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => ['Types', 'Users', 'Projects']
        ]);

        $this->set('file', $file);
        $this->set('_serialize', ['file']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        if($this->request->is('post'))
        {
            $file = $this->request->data['submittedfile']['name'];
            $file_loc = $this->request->data['submittedfile']['tmp_name'];
            $file_size = $this->request->data['submittedfile']['size'];
            $file_type = $this->request->data['submittedfile']['type'];

            // make file name in lower case
            $new_file_name = strtolower($file);
            // make file name in lower case
            $final_file=str_replace(' ','-',$new_file_name);

            $aux_path = WWW_ROOT . 'uploads';
            $dir = new Folder($aux_path);
            $result = $dir->cd($id); 
            if(!$result){
                $create_folder = new Folder($aux_path . $id, true, 0755);
                $folder = $create_folder->path;
            }else{
                $folder = $dir->path;
                $exist_file = $dir->find($final_file);
                if($exist_file){
                    return $this->Flash->error(__('Un archivo con el mismo nombre ya se encuentra'));
                }
            }
            
            $chop = strlen($final_file) - 5;
            $type = substr($final_file, $chop, strlen($final_file));

            if(!substr_compare($type, "png", 0, strlen($type)) ||
                !substr_compare($type, "docx", 0, strlen($type)) ||
                !substr_compare($type, "doc", 0, strlen($type)) ||
                !substr_compare($type, "pdf", 0, strlen($type)) ||
                !substr_compare($type, "jpg", 0, strlen($type)) ||
                !substr_compare($type, "exl", 0, strlen($type)) ||
                !substr_compare($type, "exls", 0, strlen($type)))
                    return $this->Flash->error(__('Archivo no permitido.'));

            if(move_uploaded_file($file_loc,$folder.DS.$final_file))
            {
                $new_file = $this->Files->newEntity();
                $new_file->name = $final_file;
                $new_file->type = $file_type;
                $new_file->size = $file_size;
                $new_file->path = $folder;
                $new_file->user_id = $this->Auth->user('id');
                $new_file->project_id = $id;
        
                //Datos hardcodeados porque por ahora solo esta esta opcion
                $new_file->active = 1;                
                $new_file->type_id = 1; 

                if ($this->Files->save($new_file)) {
                    $this->Flash->success(__('The file has been saved.'));
                } else {
                     return $this->Flash->error(__('No se guardaron los datos en la base de datos'));
                }
            }
            else
            {
                return $this->Flash->error(__('no se guardo el archivo el el sistema de archivos.'));
            }
        }

        //return $this->redirect(['controller'=>'Files', 'action' => 'index', $id]);
        $user = $this->Files->Users->get($this->Auth->user('id'));
        $projects = $this->Files->Projects->find('list', ['limit' => 200]);
        $this->set(compact('file', 'user', 'projects', 'dir', 'folder', 'result'));
        $this->set('_serialize', ['file', 'user', 'dir', 'folder', 'result']);
    }

    /**
     * Edit method
     *
     * @param string|null $id File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->data);
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The file could not be saved. Please, try again.'));
            }
        }
        $types = $this->Files->Types->find('list', ['limit' => 200]);
        $users = $this->Files->Users->find('list', ['limit' => 200]);
        $projects = $this->Files->Projects->find('list', ['limit' => 200]);
        $this->set(compact('file', 'types', 'users', 'projects'));
        $this->set('_serialize', ['file']);
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);

        try{
            $delete_file = new File($file->path . DS . $file->name);
            $contents = $delete_file->read();
            $delete_file->delete(); // I am deleting this file
            $delete_file->close(); // Be sure to close the file when you're done

            if ($this->Files->delete($file)) {
                $this->Flash->success(__('The file has been deleted.'));
            } else {
                $this->Flash->error(__('The file could not be deleted. Please, try again.'));
            }
        }catch(Exception $e){
            $this->Flash->error(__('Error con la eliminacion.'));
        }
        return $this->redirect(['action' => 'index', $file->project_id]);
    }

    /**
    * Download File
    * 
    * @param string|null $id File id
    * @return the file 
    * 
    */
    public function downloadFile($id=null){
        $file = $this->Files->get($id);
        $response = $this->response->file($file['path'].DS.$file['name'],['download' => true, 'name' => $file['name']]);
        return $this->response;
    }

}
