<div class="col-md-3 col-xs-6" >
    <div class="card border-success mb-3">
        <div class="card-body">
            <div class="form-group">
                <?= $this->Form->create(null, ['type' => 'post', 'url' => ['controller' => 'Projects', 'action' => 'add']]); ?>
                <?= $this->Form->input('Form.Name', ['type' => 'text', 'class' => 'form-control', 'id' => 'idProject', 'label'=>false, 'placeholder'=>'New Project Name']); ?>
                <?= $this->Form->submit(__('Create'), ['class' => 'btn btn-primary btn-block']); ?>
                <?=  $this->Form->end(); ?>                                        
            </div>
        </div>
    </div>
</div>
