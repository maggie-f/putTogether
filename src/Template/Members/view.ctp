<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Member'), ['action' => 'edit', $member->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Member'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="members view large-9 medium-8 columns content">
    <h3><?= h($member->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $member->has('user') ? $this->Html->link($member->user->id, ['controller' => 'Users', 'action' => 'view', $member->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $member->has('project') ? $this->Html->link($member->project->name, ['controller' => 'Projects', 'action' => 'view', $member->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($member->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id Owner') ?></th>
            <td><?= $this->Number->format($member->user_id_owner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add Date') ?></th>
            <td><?= h($member->add_date) ?></td>
        </tr>
    </table>
</div>
