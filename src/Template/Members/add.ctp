
<div class="members form large-9 medium-8 columns content">
    <?= $this->Form->create(null,  ['type' => 'post', 'url' => ['controller' => 'Members', 'action' => 'add', $project->id]]) ?>
    <fieldset>
        <legend><?= __('Add Member') ?></legend>
        <?php
            
            echo $this->Form->input('project_id', ['type' => 'text', 'value' => $project->name, 'disable' =>'true']);
            echo $this->Form->input('Form.user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
