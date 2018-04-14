<div class="col-md-3 col-xs-6" >
    <div class="panel panel-default">
    <div class="panel-heading panelGreen">
        Create Project
    </div>
        <div class="panel-body">
            <div class="form-group">
                <?= $this->Form->create(null, ['type' => 'post', 'url' => ['controller' => 'Projects', 'action' => 'add']]); ?>
                <?= $this->Form->input('Form.Name', ['type' => 'text', 'class' => 'form-control', 'id' => 'idProject', 'label'=>false, 'placeholder'=>'Project Name']); ?>
                <br />
                <?= $this->Form->submit(__('Create'), ['class' => 'btn btn-primary btn-block']); ?>
                <?=  $this->Form->end(); ?>                                        
            </div>
        </div>
    
    </div>
</div>
