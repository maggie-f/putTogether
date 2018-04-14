<?php

namespace App\View\Helper;

use Cake\View\Helper;

class FilesHelper extends Helper
{

    public function getExtention($file_name){
        $chop = strlen($file_name) - 5;
        $type = substr($file_name, $chop, strlen($file_name));

        if(substr_compare($type, "png", 0, strlen($type))){
            return "png";
        }else if(substr_compare($type, "docx", 0, strlen($type))){
            return "docx";
        }else if(substr_compare($type, "doc", 0, strlen($type))){
            return "doc";
        }else if(substr_compare($type, "pdf", 0, strlen($type))){
            return "pdf";
        }else if(substr_compare($type, "jpg", 0, strlen($type))){
            return "jpg";
        }else if(substr_compare($type, "exl", 0, strlen($type))){
            return "exl";
        }else if(substr_compare($type, "exls", 0, strlen($type))){
            return "exls";
        }else{
            return "How do you uploaded that?";
        }
    }

}