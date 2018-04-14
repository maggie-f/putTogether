<?php

switch ($message) {
    case 'ok':
        echo '<div class="alert alert-success" role="alert" onclick="this.classList.add(\'hidden\');">
        The '.h($params['type']).' <strong>'.h($params['name']).'</strong> has been <strong>'.h($params['action']).'</strong>.
        </div>';
        break;
    case 'warning':
        echo '<div class="alert alert-warning" role="alert" onclick="this.classList.add(\'hidden\');">
        The '.h($params['type']).' <strong>'.h($params['name']).'</strong> has been <strong>'.h($params['action']).'</strong>.
        </div>';
        break;
    case 'bad':
        echo '<div class="alert alert-danger" role="alert" onclick="this.classList.add(\'hidden\');">
        The '.h($params['type']).' <strong>'.h($params['name']).'</strong> has not been <strong>'.h($params['action']).'</strong>.
        </div>';
        break;
    case 'ok_delete_project':
        echo '<div class="alert alert-success" role="alert" onclick="this.classList.add(\'hidden\');">
        The '.h($params['type']).' <strong>'.h($params['name']).'</strong> has been <strong>'.h($params['action']).'</strong>. 
        All the information is deleted.
        </div>';
        break;
    default:
        echo '<div class="alert alert-danger" role="alert" onclick="this.classList.add(\'hidden\');">
            Somethings is wrong, sorry.
        </div>';
        break;
}

?>
