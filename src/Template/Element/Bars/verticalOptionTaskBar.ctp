<div class="row">
    <div class="container-fluid">
        <div class="col-xs-12">
            <?= $this->Html->link($this->element('Items\Tasks\linkProject'), ['controller'=>'Projects', 'action'=>'edit', $project->id], ['escape'=>false]) ?>        
        </div>
        <div class="col-xs-12">
            <?= $this->Html->link($this->element('Items\Tasks\linkTask'), ['controller'=>'Tasks', 'action'=>'index', $project->id], ['escape'=>false]);  ?>
        </div>
        <div class="col-xs-12" >
            <?= $this->Html->link($this->element('Items\Tasks\linkComment'), ['controller'=>'Comments', 'action'=>'index', $project->id], ['escape'=>false]); ?>         
        </div>
        <div class="col-xs-12  disabled" >
            <?= $this->Html->link($this->element('Items\Tasks\linkFile'), ['controller'=>'Files', 'action'=>'index', $project->id], ['escape'=>false]); ?>
        </div>
        <div class="col-xs-12  disabled" >
            <?= $this->Html->link($this->element('Items\Tasks\linkMember'), ['controller'=>'Members', 'action'=>'index', $project->id], ['escape'=>false]) ?>
        </div>
        <div class="col-xs-12  disabled" >
            <?= $this->Html->link($this->element('Items\Tasks\linkCalendar'), ['controller'=>'Comments', 'action'=>'index', $project->id], ['escape'=>false]); ?> 
        </div>
    </div>
</div>