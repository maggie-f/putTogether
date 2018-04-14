<nav class="navbar navbar-defaul" >
  <div class="container-fluid">
    <div class="row" id="headBar">    
        <div class="col-xs-8 col-sm-9 col-md-10">
            <span class="navbar-brand">
                <?= $this->Html->link('Put Together', '/projects', ['class' => '']) ?>
            </span>
        </div>
        <div class="col-xs-4 col-sm-3 col-md-2">
            <span class="navbar-brand">
                <?= $this->Html->link('logout', ['controller' => 'users', 'action' => 'logout' ]); ?>   
            </span>
        </div>
    </div>
  </div>
</nav>