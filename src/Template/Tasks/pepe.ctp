<h3><?= __('States') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($states as $state): ?>
            <tr>
                <td><?= $this->Number->format($state->id) ?></td>
                <td><?= h($state->name) ?></td>
                <td><?= h($state->code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $state->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $state->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>