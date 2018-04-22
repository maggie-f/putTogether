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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $pageDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
   
   <!-- Style -->
   <?= $this->Html->css('bootstrap.css'); ?>
    <?= $this->Html->css('font-awesome.min.css'); ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('jquery-ui-1.12.1.css') ?>
    <?= $this->fetch('css') ?>
    
    <!-- js -->
    <?= $this->fetch('meta') ?>
    <?= $this->Html->script('jquery-1.12.4.js'); ?> 
    <?= $this->Html->script('jquery-ui-1.12.1.js'); ?>
    <?= $this->Html->script('bootstrap.js'); ?> 
    <?= $this->Html->script('putTogether.js'); ?>
    <?= $this->fetch('script') ?>

    <!-- Fetch -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
	<header class="header">
    <div class="navbar-header">
      <h1>Put Together</h1>
    </div>
    <div id="navbar" class="navbar-collapse collapse"></div>
  </header>
  
  <!-- After the green  -->
    <!-- Main Content -->
      <div class="container">
        <div class="row">
          <?= $this->fetch('content') ?>
          <?= $this->Flash->render() ?>
        </div>	
      </div>

  <footer class="container">
    <div class="row" >
      <div class="col-md-12">
          <hr />
          <p>&copy; 2017 Company, Inc.</p>
      </div>
    </div>
  </footer>
</body>
</html>