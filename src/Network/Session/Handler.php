<?php

namespace App\Network\Session;

use App\Controller\AppController;

class Handler extends AppController {

    public function SetData($idTask, $idProject){
        $_SESSION["idProject"] = $idProject;
        $_SESSION["idTask"] = $idTask;
    }

    public function GetIdProject(){
        return $_SESSION["idProject"];//$this->request->session()->read('idProject');
    }

    public function GetIdTask(){
        return $_SESSION["idTask"];//$this->request->session()->read('idTask');
    }
}

?>