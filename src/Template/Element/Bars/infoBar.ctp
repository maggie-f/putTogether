
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="headPanel">
                    <?= $this->Html->link($this->element('Items\Tasks\linkTask'), ['controller'=>'Tasks', 'action'=>'index', $project->id], ['escape'=>false]);  ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3" >
                <div class="headPanel">
                    <?= $this->Html->link($this->element('Items\Tasks\linkComment'), ['controller'=>'Comments', 'action'=>'index', $project->id], ['escape'=>false]); ?>         
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3" >
                <div class="headPanel">
                    <?= $this->Html->link($this->element('Items\Tasks\linkFile'), ['controller'=>'Files', 'action'=>'index', $project->id], ['escape'=>false]); ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3" >
                <div class="headPanel">
                    <?= $this->Html->link($this->element('Items\Tasks\linkCalendar'), ['controller'=>'Comments', 'action'=>'index', $project->id], ['escape'=>false]); ?> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <?= $this->element('Editors\editProject'); ?>
    </div>
</div>