
<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 nopadding tasks" id="taskList">
        <div class="card border-success mb-3">
            <div class="card-body" >
                <div class="row">
                    <div class="col-md-11">
                        Tasks of  <strong><?= $project->name; ?> </strong>
                    </div>
                    <div class="col-md-1">
                        <a id="lnkActionEditor" onclick="putTogether.checkState();" title="Open Task Editor"><i id="iconActionEditor" class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                

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
                                <td style="position: relative;">
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
                                    <a onclick="putTogether.loadTaskData(<?= $task->id ?>)"><?= $task->name; ?></a>
                                </td>
                                <td>
                                    <!-- Edit Task -->
                                        <a onclick="putTogether.loadTaskData(<?= $task->id ?>)"><i class="fas fa-pencil-alt fa-fw"></i></a> &nbsp;
                                    <!-- Edit Task -->
                                    <!-- Delete Task-->
                                        <a title="Delete" data-toggle="modal" data-target=".bs-example-modal-sm-<?= $task->id; ?>"><?= $this->element('Items\trash'); ?></a>
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
                                        </div>&nbsp;
                                    <!-- End Delete Task-->
                                    <!-- Description -->
                                        <?php if(!is_null($task->description) && !empty($task->description))
                                            echo "
                                                    <a title=\"Show/hide description\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne".$task->id."\" aria-expanded=\"true\"
                                                    aria-controls=\"collapseOne\">
                                                        <i class=\"fa fa-plus-square fa-fw\" aria-hidden=\"true\"></i> </a>
                                                ";
                                        ?>
                                    <!-- End Description -->
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
    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4" id="taskEditor" >
        <?= $this->element('Editors\taskEdit'); ?>
    </div>
</div>