<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="col-xs-12 col-sm-6">
    <h3><?= h($team->name) ?></h3>
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($team->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $team->has('user') ? $this->Html->link($team->user->id, ['controller' => 'Users', 'action' => 'view', $team->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($team->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add Date') ?></th>
            <td><?= h($team->add_date) ?></td>
        </tr>
    </table>
</div>
