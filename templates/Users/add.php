<div class="text-center" style="margin-top: 50px;">
  <h4>User Registration Form</h4>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <?php echo $this->Form->create($userEnt, ['name'=>'add_users', 'class'=>'was-validated']) ?>
      <div class="form-group">
        <?php echo $this->Form->control('name', ['type'=>'text', 'class'=>'form-control','placeholder'=>'Enter name','required'=>true]);?>
      </div>
      <div class="form-group">
        <?php echo $this->Form->control('email', ['type'=>'email', 'class'=>'form-control','placeholder'=>'Enter email','required'=>true]);?>
      </div>
      <div class="form-group">
        <?php echo $this->Form->control('username', ['type'=>'text', 'class'=>'form-control','placeholder'=>'Enter username','required'=>true]);?>
      </div>
      <div class="form-group">
        <?php echo $this->Form->control('password', ['type'=>'password', 'class'=>'form-control','placeholder'=>'Enter password','required'=>true]);?>
      </div>
      <button type="submit" class="btn btn-primary" style="float: right;">Sign Up</button>
      <?php echo $this->Form->end() ?>
    </div>
  </div>
</div>