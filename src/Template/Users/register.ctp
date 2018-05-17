<h2 class="form-signin-heading">Please Register</h2>
<?= $this->Form->create(null, ['type' => 'post', 'url' => ['action' => 'register']]) ?>
<?= $this->Form->input('Form.Email', ['placeholder' => 'Email', 'class' => 'form-control', 'label'=>false, 'style' => 'margin: 19px 0;', 'type' => 'email']) ?>
<?= $this->Form->input('Form.Password', ['placeholder' => 'Password', 'class' => 'form-control', 'label'=>false, 'type' => 'password']) ?>
<?= $this->Form->button('Register', ['class' => 'btn btn-lg btn-success btn-block']) ?>
<?= $this->Form->end() ?>        