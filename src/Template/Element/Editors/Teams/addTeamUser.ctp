<div class="teamsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($teamsUser) ?>
    <fieldset>
        <legend><?= __('Add Teams User') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('team_id', ['options' => $teams]);
            echo $this->Form->input('createDate');
            echo $this->Form->input('modify');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>