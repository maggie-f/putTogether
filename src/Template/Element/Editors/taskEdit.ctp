<div class="card border-success mb-3">
    <div class="card-header">
        Task Admin
    </div>
    <div class="card-body">
        <?php 
            echo $this->Form->create(null, ['type' => 'post', 'id'=>'formPart', 'url' => ['controller' => 'Tasks', 'action' => 'add']]);   
            echo $this->Form->hidden('Form.idPro', ['id'=>'idPro', 'value'=>$idProjecto]);
            echo $this->Form->hidden('Form.task', ['id'=>'idTask']);
            echo $this->Form->input('Form.Name0', ['type' => 'text', 'class' => 'form-control', 'id' => 'nameTask0', 'placeholder'=>'Task Name', 'label'=>false, 'aria-required' => 'true',]);
            echo $this->Form->input('Form.Description0', ['type' => 'textarea', 'class' => 'form-control', 'id' => 'descriptionTask0', 'placeholder'=>'Task Description', 'label'=>false]);
            echo $this->Form->input('Form.Created0', ['type' => 'text', 'class' => 'form-control', 'id' => 'created', 'placeholder'=>'From ', 'label'=>false]);
            echo $this->Form->input('Form.Ended0', ['type' => 'text', 'class' => 'form-control', 'id' => 'ended', 'placeholder'=>'To', 'label'=>false]);
            echo $this->Form->submit(__('Grabar'), ['class' => 'btn btn-violet btn-block']);
            echo $this->Form->reset(__('Limpiar'), ['class' => 'btn btn-default btn-block', 'onclick'=>'putTogether.cleanData();', 'value' => 'Limpiar']);
            echo $this->Form->end();
        ?>
    </div>
</div>