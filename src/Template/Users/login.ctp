
<h2 class="form-signin-heading">Please sign in</h2>
<?= $this->Form->create() ?>
<?= $this->Form->input('', ['placeholder' => 'Email', 'class' => 'form-control', 'name' => 'email', 'type' => 'email', 'id' => 'loginMail']) ?>
<?= $this->Form->input('', ['placeholder' => 'Password', 'class' => 'form-control', 'type' => 'password', 'name' => 'password', 'id' => 'loginPass']) ?>
<div class="checkbox">
  <label>
    <input type="checkbox" value="remember-me"> Remember me
  </label>
</div>
<?= $this->Form->button('Login', ['class' => 'btn btn-lg btn-success btn-block']) ?>
<?= $this->Form->end() ?>