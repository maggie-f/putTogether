<div class="container-fluid">
    <div class="row" id="headBar">    
        <div class="col-xs-8 col-sm-9 col-md-10">
            <span class="navbar-brand"><i class="fa fa-bars fa-2" id="icono"></i>
            <?= $this->Html->link('Put Together', '/Projects', ['class' => '']) ?>
            </span>
        </div>
        <div class="col-xs-4 col-sm-3 col-md-2">
            <span class="navbar-brand">
                <?= $this->Html->link('<i class="fa fa-sign-out" aria-hidden="true"></i>', 
                                    ['controller' => 'users', 'action' => 'logout' ], 
                                    ['escape'=>false]) ?>        
            </span>
        </div>
    </div>
</div>