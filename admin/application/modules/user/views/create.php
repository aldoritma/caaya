<!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li>
                <a href="#">User</a>
              </li>
              <li><a href="#" class="active">Add User</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->
            <div class="row">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
            <?php endif; ?>

              <div class="col-lg-7 col-md-6 ">
                <!-- START PANEL -->
                

                <div class="panel panel-transparent">
                  <div class="panel-body">
                     <?php echo form_open(base_url('user/create'), 'id="form-personal" class="form_create" role="form" autocomplete="off"'); ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Name</label>
                             <?php echo form_input(array('name'=>'fullname', 'id'=>'fullname','placeholder'=>'Enter Your Name', 'class'=>'form-control', 'required'=>'required')); ?>
                          </div>
                           <span class="validation-form" for="fullname"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Pages username</label>
                            <?php echo form_input(array('name'=>'username', 'class'=>'form-control','placeholder'=>'Enter Your Username', 'required'=>'required')); ?>
                       </div>
                        <span class="validation-form" for="username"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Password</label>
                           <?php echo form_input(array('name'=>'password', 'class'=>'form-control','placeholder'=>'Enter Your Password', 'required'=>'required')); ?>
                          </div>
                          <span class="validation-form" for="password"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Email</label>
                          <?php echo form_input(array('name'=>'email', 'class'=>'form-control','placeholder'=>'Email address', 'required'=>'required')); ?>
                          </div>
                           <span class="validation-form" for="email"></span>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-sm-12">
                         <div class="form-group form-group-default form-group-default-select2 required">
                          <label>Roles</label>
                          <?php echo form_dropdown('roles', $data_roles, '', 'class="full-width" data-init-plugin="select2"'); ?>
                          </div>
                          <span class="validation-form" for="roles"></span>
                        </div>
                      </div>

                      <div class="clearfix"></div>
                      <button class="btn btn-primary" type="submit">Create a new account</button>
                      &nbsp;
                      <button class="btn btn-primary" type="button" onclick="window.location.href='list-user'">Cancel</button>
                    <?php echo form_close();?>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

              </div>
              </div>
              </div>

<script type="text/javascript">
  var $ = jQuery;
  $('.form_create').ajaxForm({
    url: $(this).attr('action'),
    type: 'post',
    dataType: 'json',
    beforeSend: function()
    {
      $('#form_response').html('<img src="'+base_url+'assets/loader/loader.gif" />');
     
    },
    success: function(response)
    {
      if (response.status != 'success')
      {
        $('.form_create :input').attr('disabled', false); 
        $.each(response.message, function(key, val) {
          $('span[for="'+key+'"]').html(val);
        });
        
        $('#form_response').html('');
        //$.colorbox.resize();
      }
      else
      {
        setTimeout(function() {
          $("html, body").animate({ scrollTop:265 }, "slow");
          location.reload();
        }, 1000);
        
        $('.form_create').resetForm();
        $('#form_response').html('');
      
      }
    }
  });
</script>