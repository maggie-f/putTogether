
<ul  class="nav flex-column" id="vertical-menu">
    <li class="nav-item">
      <a href="/PutTogether/Projects"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </li>
    <li class="nav-item">
      <a href="#"><i class="fa fa-pencil fa-lg"></i> Create Project</a>
    </li>
    <li class="nav-item">
      <a href="#"><i class="fa fa-inbox fa-lg"></i> Inbox</a>
    </li>
    <li class="nav-item">
      <?= $this->html->link('<i class="fa fa-users"></i>'.'Teams', ['controller'=>'Teams', 'action'=>'index'], ['escape'=>false]); ?>
    </li>
    <li data-toggle="collapse" data-target="#projects" class="collapsed nav-item">
      <a href="#"><i class="fa fa-list fa-lg"></i> Projects <span class="arrow"></span></a>
    </li>  
    <ul class="nav flex-column" id="projects">
      <?php foreach ($projects as $project): ?>
        <li class="nav-item">
          <?= $this->Html->link(__(h($project->name)), ['controller' => 'Tasks', 'action' => 'index', $project->id]) ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <li class="nav-item">
       <?= $this->html->link('<i class="fa fa-user-o fa-lg"></i>'.' Profile', ['controller' => 'Users', 'action' => 'edit'], ['escape' => false]); ?>
    </li>
    <li class="nav-item">
      <a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a>
    </li>
</ul>