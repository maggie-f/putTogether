
<ul  class="nav nav-pills nav-stacked" id="vertical-menu">
    <li role="presentation">
      <a href="/PutTogether/Projects"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a>
    </li>
    <li role="presentation">
      <a href="#"><i class="fa fa-pencil fa-lg"></i> Create Project</a>
    </li>
    <li role="presentation">
      <a href="#"><i class="fa fa-inbox fa-lg"></i> Inbox</a>
    </li>
    <li role="presentation">
      <?= $this->html->link('<i class="fa fa-users"></i>'.'Teams', ['controller'=>'Teams', 'action'=>'index'], ['escape'=>false]); ?>
    </li>
    <li data-toggle="collapse" data-target="#projects" class="collapsed" role="presentation">
      <a href="#"><i class="fa fa-list fa-lg"></i> Projects <span class="arrow"></span></a>
    </li>  
    <ul class="collapse nav nav-pills nav-stacked" id="projects">
      <?php foreach ($projects as $project): ?>
        <li role="presentation">
          <?= $this->Html->link(__(h($project->name)), ['controller' => 'Tasks', 'action' => 'index', $project->id]) ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <li role="presentation">
       <?= $this->html->link('<i class="fa fa-user-o fa-lg"></i>'.' Profile', ['controller' => 'Users', 'action' => 'edit'], ['escape' => false]); ?>
    </li>
    <li role="presentation">
      <a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a>
    </li>
</ul>