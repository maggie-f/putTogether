<style>
    .panel-default {
        border-color: #5bc0de;
    }
    .panel-default > .panel-heading {
        color: #5bc0de;
        background-color: #f5f5f5;
        border-color: #5bc0de;
        text-transform: uppercase;
    }
</style>

<h4 style="color:#5bc0de;">For any update or comment, please feel free to leave it here </h4>

<br />
<?= $this->element('Editors/addComment') ?>
<ul>
<?php foreach($comments as $comment): ?>
    <li> 
        <div class="commentBody">
        <?= $comment->user->Name    ?>: <?= $comment->comment    ?>
        </div>
        <div class="commentDetails">
            <?= $comment->created    ?>

            <?= $this->Form->postLink($this->element('Items\trash'), 
                                        ['action' => 'delete', $comment->id], 
                                        ['confirm' => __('Are you sure you want to delete?'), 'escape'=>false] ) ?>
        </div>
    </li>
<?php endforeach; ?>
</ul>
