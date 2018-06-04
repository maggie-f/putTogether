<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="col-md-4">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit info') ?></legend>

        <div class="form-group">
            <?= $this->Form->control('Name', ['class' => 'form-control']); ?> 
        </div>
        <div class="form-group">
            <?= $this->Form->control('surname', ['class' => 'form-control']); ?> 
        </div>
        <div class="form-group">
            <?= $this->Form->input('birthdate', ['type' => 'text', 'class' => 'form-control']); ?> 
        </div>
        <div class="form-group">
            <?= $this->Form->control('bio', ['class' => 'form-control']); ?> 
        </div>
        <div class="form-group">
            <?= $this->Form->control('profession', ['class' => 'form-control']); ?> 
        </div>
        <div class="form-group">
            <?= $this->Form->control('web_site', ['class' => 'form-control']); ?> 
        </div>
        <?php

            //echo $this->Form->control('teams._ids', ['options' => $teams]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
