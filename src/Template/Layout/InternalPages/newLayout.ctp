<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$pageDescription = 'Wellcome to PutTogether';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $pageDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <!-- Style -->
    <?= $this->Html->css('bootstrap.min.v4.css'); ?>
    <?= $this->Html->css('bootstrap-grid.min.css'); ?>
    <?= $this->Html->css('bootstrap-reboot.min.css'); ?>
    <?= $this->Html->css('fontawesome-all.min.css'); ?>
    <?= $this->Html->css('site.css') ?>

    <!-- Js -->
    <?= $this->Html->script('jquery-3.1.1.min.js'); ?>
    <?= $this->Html->script('jquery-ui-1.12.1.js'); ?>
    <?= $this->Html->script('bootstrap.bundle.min.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>
    <?= $this->Html->script('putTogether.js'); ?>

    <!-- Fetch -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link rel="shortcut icon" href="/PutTogether/favicon.ico" type="image/x-icon" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- HEADER -->
    <header class="header">
        <?= $this->element('Bars\header'); ?>
    </header>
        
    <div class="container-fluid">
        <div class="row">
            <!-- MENU  -->
            <div class="col-xs-12 col-sm-2" id="menu" style="display: none;">
                <?php echo $this->element('Bars/navBar'); ?>
            </div>
            <!-- Contenido -->
            <div class="col-xs-12 col-sm-12" id="content">
                <br />
                <div class="row">
                    <div class="col-xs-4 col-md-2">
                        <?= $this->element('Bars\verticalOptionTaskBar'); ?>
                    </div>
                    <div class="col-xs-8 col-md-10 ">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>	
                    </div>
                </div> 
            </div>
        </div>
        <hr>
    </div> 
     
    <footer class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; 2017 Company, Inc.</p>
            </div>
        </div>
    </footer>
    
  </body>
</html>