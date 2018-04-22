<style>
    .panel-default {
        border-color: #5cb85c;
    }
    .panel-default > .panel-heading {
        color: #5cb85c;
        background-color: #f5f5f5;
        border-color: #5cb85c;
        text-transform: uppercase;
    }
</style>

<div class="col-xm-12 col-sm-8 nopadding" id="taskList">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-11">
                    Tasks of  <strong><?= $project->name; ?> </strong>
                </div>
                <div class="col-xs-1">
                    <a id="lnkActionEditor" onclick="putTogether.checkState();" title="Open Task Editor"><i id="iconActionEditor" class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="panel-body" >
            <table class="table table-hover" id="accordion" role="tablist" aria-multiselectable="true">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tasks as $task): ?>
                        <tr> 
                            <td>
                                <a onclick="putTogether.loadTaskData(<?= $task->id ?>)"><?= $task->name; ?></a>
                            </td>
                            <td style="position: relative;">
                                <!-- Delete Task-->
                                    <a title="Delete" style="font-size:1.3em; color:#000;" data-toggle="modal" data-target=".bs-example-modal-sm-<?= $task->id; ?>"><?= $this->element('Items\trash'); ?></a>
                                    <div class="modal fade bs-example-modal-sm-<?= $task->id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="mySmallModalLabel">Delete Task</h4> 
                                            </div>
                                            <div class="modal-body"> 
                                                <p>Are you sure you want to delete your task: <?= $task->name; ?>? <br /> All the information will be errace.</p>
                                                <?= $this->Form->postLink('delete', ['action' => 'delete', $task->id],
                                                    ['escape'=>false, 'class' => 'btn btn-primary btn-block']); ?>
                                                <button type="button" class="btn btn-default btn-block" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Cancel</span></button>
                                            </div>
                                            </div>
                                        </div>	
                                    </div>
                                <!-- End Delete Task-->
                                <!-- State Icon -->
                                    <div class="floatPanel" id="stateOptions<?= $task->id ?>" style="display: none;"
                                        onmouseover="putTogether.seeStatePanelOptions(<?= $task->id ?>);"
                                        onmouseout="putTogether.unseeStatePanelOptions(<?= $task->id ?>)">
                                            <a class="stateProcess" title="State In Process"  
                                            onclick="putTogether.editState(<?= $task->id ?>, 'p')"><i class="fa fa-play-circle fa-2" aria-hidden="true"></i></a>
                                            <a class="stateWaiting" title="State Waiting"  
                                            onclick="putTogether.editState(<?= $task->id ?>, 'w')"><i class="fa fa-pause-circle fa-2" aria-hidden="true"></i></a>
                                            <a class="stateFinished" title="State Fishied"  
                                            onclick="putTogether.editState(<?= $task->id ?>, 'f')"><i class="fa fa-check-circle fa-2" aria-hidden="true"></i></a>
                                    </div>
                                    <?php
                                        switch ($task->state_id){
                                            case 1:
                                                echo "<a id=\"option".$task->id."\" style=\"font-size: 1.3em;\" class=\"stateProcess\" title=\"State Process\"
                                                onmouseover=\"putTogether.seeStatePanelOptions(".$task->id.");\"
                                                onmouseout=\"putTogether.unseeStatePanelOptions(".$task->id.")\"
                                                ><i id=\"icon".$task->id."\" class=\"fa fa-play-circle fa-2\" aria-hidden=\"true\"></i></a>";
                                                break;
                                            case 2: 
                                                echo "<a id=\"option".$task->id."\" style=\"font-size: 1.3em;\" class=\"stateWaiting\" title=\"State Waiting\".
                                                onmouseover=\"putTogether.seeStatePanelOptions($task->id);\".
                                                onmouseout=\"putTogether.unseeStatePanelOptions($task->id)\".
                                                ><i id=\"icon".$task->id."\" class=\"fa fa-pause-circle fa-2\" aria-hidden=\"true\"></i></a>";
                                                break;
                                            case 3:
                                                echo "<a id=\"option".$task->id."\" style=\"font-size: 1.3em;\" class=\"stateFinished\" title=\"State Finished\" onmouseover=\"putTogether.seeStatePanelOptions($task->id);\"
                                                onmouseout=\"putTogether.unseeStatePanelOptions($task->id)\" 
                                                ><i id=\"icon".$task->id."\" class=\"fa fa-check-circle fa-2\" aria-hidden=\"true\"></i></a>";
                                                break;
                                            default:
                                                echo "<a id=\"option".$task->id."\" style=\"font-size: 1.3em;\" class=\"stateCreated\" title=\"State Created\"
                                                onmouseover=\"putTogether.seeStatePanelOptions($task->id);\"
                                                onmouseout=\"putTogether.unseeStatePanelOptions($task->id)\"
                                                ><i id=\"icon".$task->id."\" class=\"fa fa-circle fa-2\" aria-hidden=\"true\"></i></a>";
                                                break;
                                        }
                                    ?>
                                <!-- End State Icon -->
                                <!-- Descriptio -->
                                    <?php if(!is_null($task->description) && !empty($task->description))
                                        echo "
                                                <a title=\"Show/hide description\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne".$task->id."\" aria-expanded=\"true\"
                                                aria-controls=\"collapseOne\" style=\"font-size:1.3em; color:#000;\">
                                                    <i class=\"fa fa-plus-square\" aria-hidden=\"true\"></i> </a>
                                            ";
                                    ?>
                                <!-- End Descriptio -->
                            </td>
                        </tr>
                         <?php if(!is_null($task->description) && !empty($task->description)) {
                             echo "<tr id=\"collapseOne".$task->id."\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingOne\">
                                        <td style=\"width:80%; font-size: 0.96em;\" >".$task->description."</td>
                                    </tr>";
                            }
                         ?>
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
                <!--<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>-->
            </div>
        </div>
    </div>

</div>
<div class="col-xm-4 col-sm-4" id="taskEditor" >
    <?= $this->element('Editors\taskEdit'); ?>
</div>  