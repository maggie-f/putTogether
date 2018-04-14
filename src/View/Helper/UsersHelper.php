<?php
namespace App\View\Helper;

use Cake\View\Helper;
use App\Controller\UsersController;

class UsersHelper extends Helper
{

    public function getEmail($id){
        $this->loadModel('Users');
        return 'This number: '.$id;
    }

}

?>