<?php echo $this->element('Editors/addProject'); ?>

  <?php foreach ($projects as $project): ?>
    <div class="col-md-3 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading panelGreen">
			<?= $this->Html->link(__(h($project->name)), ['controller' => 'Tasks', 'action' => 'index', $project->id]) ?>
			
			<a data-toggle="modal" data-target=".bs-example-modal-sm-<?= $project->id; ?>"><?= $this->element('Items\trash'); ?></a>

			<div class="modal fade bs-example-modal-sm-<?= $project->id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content" style="color: #000;">
						<div class="modal-header">
						<h4 class="modal-title" id="mySmallModalLabel">Delete Project</h4> 
						</div>
						<div class="modal-body"> 
							<p>Are you sure you want to delete your project: <strong><?= $project->name; ?></strong>? <br /> All the information will be errace.</p>
							<?= $this->Form->postLink('delete', ['action' => 'delete', $project->id],
							['escape'=>false, 'class' => 'btn btn-primary btn-block']); ?>
							<button type="button" class="btn btn-default btn-block" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Cancel</span></button>
						</div>
					</div>
				</div>	
			</div>
		</div>
        <div class="panel-body">
						<?= //$project->created->format('d/m/Y'); 
						""
						?>
            <?= $project->description; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

