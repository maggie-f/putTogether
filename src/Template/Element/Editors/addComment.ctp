
<?php 
    echo $this->Form->create(null, ['type' => 'post', 'id'=>'formComment', 'url' => ['controller' => 'Comments', 'action' => 'add'], 'style'=>'display: flex']);   
    
    echo $this->Form->input('Form.Comment', ['type' => 'text', 'class' => 'form-control', 
    'id' => 'comment', 'placeholder'=>'Write here', 'label'=>false]);

    echo $this->Form->hidden('Form.idPro', ['id'=>'idPro', 'value'=>$project->id]);
    echo $this->Form->submit(__('Comment'), ['class' => 'btn btn-primary']);
    echo $this->Form->end();
?>