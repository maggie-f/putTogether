<div class="container-fluid">
    <div class="row" id="headBar">    
        <div class="col-xs-8 col-sm-9 col-md-11">
            <span class="navbar-brand"><i class="fas fa-bars seeUnseeMenu"></i>
                <?= $this->Html->link('Put Together', '/Projects', ['class' => '']) ?>
            </span>
        </div>
        <div class="col-xs-4 col-sm-3 col-md-1">
            <span class="navbar-brand">
                <?= $this->Html->link('<i class="fas fa-sign-out-alt"></i>', 
                                    ['controller' => 'users', 'action' => 'logout' ], 
                                    ['escape'=>false]) ?>        
            </span>
        </div>
    </div>
</div>