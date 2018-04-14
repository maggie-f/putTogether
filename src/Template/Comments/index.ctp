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
<div class="panel panel-default">
    <div class="panel-heading">
    Comment Area
    </div>
    <div class="panel-body" id="comments">
        <?= $this->element('Editors/addComment') ?>
        <ul>
        <?php foreach($comments as $comment): ?>
            <li> 
                <?= $comment->user->email    ?>

                <?= $comment->created    ?>

                <?= $comment->comment    ?>

                <?= $this->Form->postLink($this->element('Items\trash'), 
                                            ['action' => 'delete', $comment->id], 
                                            ['confirm' => __('Are you sure you want to delete?'), 'escape'=>false] ) ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>