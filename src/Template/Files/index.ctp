<?php
$this->loadHelper('Files');
?>

<div class="">
    <?= $this->Form->create(null,['type' => 'post', 'id'=>'submittedfile','enctype' => 'multipart/form-data', 'url' => ['controller' => 'Files', 'action' => 'add', $project->id]]); ?>
    <fieldset>
        <legend><?= __('Add File') ?></legend>
        <?php
             echo $this->Form->file('submittedfile', ['accept'=>'.jpg, .png, .doc, .docx, .exl, .exls, .pdf']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="">
    <h3><?= __('Files') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($files as $file): ?>
            <tr>
                <td><?= h($file->name) ?></td>
                <td><?= $this->Files->getExtention($file->name); ?></td>
                <td><?= $this->Number->format($file->size) ?></td>
                <td><?= h($file->created) ?></td>
                <td><?= $file->user->email ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Download'), ['action' => 'downloadFile', $file->id]) ?>
                    
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
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
