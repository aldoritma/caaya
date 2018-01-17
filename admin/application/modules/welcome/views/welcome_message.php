  <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">            
         <img src="<?php echo base_url('assets/all/img/logo.png');?>" alt="logo" data-src="<?php echo base_url('assets/all/img/logo.png');?>" data-src-retina="<?php echo base_url('assets/all/img/logo.png');?>" width="250" height="100"> 			

         <p class="p-t-35">Sign into your pages account</p>
         <p class="alert-danger" id="response"></p>

          <!-- START Login Form -->
          <?php echo form_open('login', array('id'=>'form-login', 'class'=>'p-t-15', 'role'=>'form')); ?>
        
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Login</label>
              <div class="controls">
                <input type="text" name="_username" placeholder="User Name" class="form-control" id="_username" required>
              </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Password</label>
              <div class="controls">
              <input type="password" class="form-control" name="_password" placeholder="Credentials" id="_password" required>
              </div>
            </div>
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6 no-padding">
                <div class="checkbox ">
                  <input type="checkbox" value="1" id="checkbox1">
                  <label for="checkbox1">Keep Me Signed in</label>
                </div>
              </div>
            </div>
            <!-- END Form Control-->
            <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
          <?php echo form_close(); ?>
          <!--END Login Form-->
          
        </div>
      </div>
      <!-- END Login Right Container-->

      </div>
