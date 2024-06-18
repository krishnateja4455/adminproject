<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<?php echo $this->Flash->render();?>
     <?php echo $this->Form->create(null,['url'=>['controller'=>'Users','action'=>'login']])?>
        <div class="input-group mb-3">
		<?php echo $this->Form->control('email',['label'=>false,'class'=>'form-control','placeholder'=>'Email']);?>
		<!--------
          <input type="email" class="form-control" placeholder="Email">
		  ------>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
		<?php echo $this->Form->control('password',['label'=>false,'class'=>'form-control','placeholder'=>'Password']);?>
		<!----------
          <input type="password" class="form-control" placeholder="Password">
		  --------->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
	  <a href='<?php echo $this->Url->build(['controller'=>'Users','action'=>'add'])?>' class='text-center'>SignUp</a>
	  <!-----------
        <a href="register.html" class="text-center">Register a new membership</a>
		-------->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


