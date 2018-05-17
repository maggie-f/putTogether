
<br />
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkStats'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]);  ?>
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3" >
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkInbox'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]); ?>         
        </div>
    </div>
        
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3" >
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkFiles'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]); ?>         
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3" >
        <div class="headPanel">
            <?= $this->Html->link($this->element('Items\Projects\linkCalendar'), ['controller'=>'Tasks', 'action'=>'index'], ['escape'=>false]); ?> 
        </div>
    </div>

</div>

    

