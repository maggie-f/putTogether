

<div class="row">
    <div class="col-md-3 col-xs-6">
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkStats'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]);  ?>
        </div>
    </div>

    <div class="col-md-3 col-xs-6" >
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkInbox'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]); ?>         
        </div>
    </div>
        
    <div class="col-md-3 col-xs-6" >
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkFiles'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]); ?>         
        </div>
    </div>

    <div class="col-md-3 col-xs-6" >
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkCalendar'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]); ?> 
        </div>
    </div>

</div>

    

