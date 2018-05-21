<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Member'), ['action' => 'add', $project->id]) ?></li>
    </ul>
</nav>

<div class="col-xs-12 col-md-6">
    <h3><?= __('Members of: '.$project->name) ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('add_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?= $member->user->email ?></td>
                <td><?= h($member->add_date) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<div class="col-xs-12 col-md-6">
    <h3><?= __('My teams') ?></h3>
    <table class="table table-striped">
        <tbody>
            <?php foreach ($teams as $team): ?>
            <tr>
                <?php 
                    $paramsToFunction = $team->id.'a'.$project->id;
                ?>
                <td><?= $team->name ?></td>
                <td><?= h($team->add_date) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Add all members'), ['controller'=>'Members', 'action'=>'addAllMembers', $paramsToFunction]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>