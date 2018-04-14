<style>
    .panel-default {
        border-color: #6B1687;
    }
    .panel-default > .panel-heading {
        color: #6B1687;
        background-color: #f5f5f5;
        border-color: #6B1687;
        text-transform: uppercase;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        Project Data
    </div>
    <div class="panel-body">
        <div id="dataProject">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Begining&nbsp;&nbsp;&nbsp;</span>
                <input type="text" class="form-control" placeholder="Created Date" aria-describedby="basic-addon1"
                value="<?= $project->created; ?>" >
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">End date&nbsp;&nbsp;&nbsp;</span>
                <?php if($project->ended == null || empty($project->ended)){
                    echo "<input type=\"text\" class=\"form-control\" placeholder=\"Complete end date\" aria-describedby=\"basic-addon1\"
                    value=\"\" />" ;}
                else{
                    
                    echo "<input type=\"text\" class=\"form-control\" placeholder=\"End date\" aria-describedby=\"basic-addon1\"
                    value=\"".$project->ended."\" />";
                } ?>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Project&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="text" class="form-control" placeholder="Project Name" aria-describedby="basic-addon1"
                value="<?= $project->name; ?>" >
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Description</span>
                <?php if($project->description == null || empty($project->description)){
                    echo "<input type=\"text\" class=\"form-control\" placeholder=\"Complete Project Description\" aria-describedby=\"basic-addon1\"
                    value=\"\" />" ;}
                else{
                    echo "<input type=\"text\" class=\"form-control\" placeholder=\"End date\" aria-describedby=\"basic-addon1\"
                    value=\"$project->description;\" />";
                } ?>
            </div>
            <input type="button" class="btn btn-violet btn-block" value="edit info" onclick="putTogether.openEditor();" />
        </div>
        <div id="editProjecto" style="display: none;">
            <?= $this->Form->create($project, ['type' => 'post', 'url' => ['controller' => 'Projects', 'action' => 'edit']]); ?>
            <?= $this->Form->input('Form.Created', ['value'=> $project->created,  'type' => 'text', 'class' => 'form-control', 'id' => 'created', 'placeholder'=>'From ', 'label'=>false]);?>
            <?= $this->Form->input('Form.Ended', ['value'=> $project->ended, 'type' => 'text', 'class' => 'form-control', 'id' => 'ended', 'placeholder'=>'To', 'label'=>false]);?>
            <?= $this->Form->input('Form.Name', ['value'=> $project->name, 'type' => 'text', 'class' => 'form-control', 'id' => 'idProject', 'label'=>false]); ?>
            <?= $this->Form->hidden('Form.idPro', ['id'=>'idPro', 'value'=>$project->id]); ?>
            <?= $this->Form->input('Form.Description', ['value'=>$project->description,'type' => 'textarea',  'class' => 'form-control', 'id' => 'idProject', 'label'=>false]); ?>
            <br />
            <?= $this->Form->submit(__('Edit'), ['class' => 'btn btn-violet btn-block']); ?>
            <?= $this->Form->reset(__('Cancelar'), ['class' => 'btn btn-default btn-block', "onclick" => "putTogether.closeEditor();"]); ?>
            <?=  $this->Form->end(); ?>
        </div>
    </div>
</div>