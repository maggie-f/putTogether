

<div class="form-signin" id="login">
  <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
    <ul class="nav nav-tabs" id="myTabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Login</a></li>
      <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Register</a></li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">
          <div class="">
            <h2 class="form-signin-heading">Please sign in</h2>
            <?= $this->Form->create() ?>
            <?= $this->Form->input('', ['placeholder' => 'Email', 'class' => 'form-control', 'name' => 'email', 'type' => 'email']) ?>
            <?= $this->Form->input('', ['placeholder' => 'Password', 'class' => 'form-control', 'type' => 'password', 'name' => 'password']) ?>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <?= $this->Form->button('Login', ['class' => 'btn btn-lg btn-success btn-block']) ?>
            <?= $this->Form->end() ?>
          </div>
      </div>
      
      <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
        <h2 class="form-signin-heading">Please Register</h2>
        <?= $this->Form->create(null, ['type' => 'post', 'url' => ['action' => 'add']]) ?>
        <?= $this->Form->input('Form.Email', ['placeholder' => 'Email', 'class' => 'form-control', 'label'=>false, 'style' => 'margin: 19px 0;', 'type' => 'email']) ?>
        <?= $this->Form->input('Form.Password', ['placeholder' => 'Password', 'class' => 'form-control', 'label'=>false, 'type' => 'password']) ?>
        <?= $this->Form->button('Register', ['class' => 'btn btn-lg btn-success btn-block']) ?>
        <?= $this->Form->end() ?>        
      </div>
    </div>

  </div>
  <!--'pattern' => '[A-Za-z-0-9]+\s[A-Za-z-0-9]+', , 'aria-required' => 'true', 'aria-describedby' => 'name-format'-->