<!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li>
                <a href="#">User</a>
              </li>
              <li><a href="#" class="active">Edit User</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->
            <div class="row">

            <?php if ($this->session->flashdata('update_success')): ?>
            <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong><?php echo $this->session->flashdata('update_success'); ?></strong>
            </div>
            <?php endif; ?>

              <div class="col-lg-7 col-md-6 ">
                <!-- START PANEL -->
                

                <div class="panel panel-transparent">
                  <div class="panel-body">
                   <?php echo form_open(base_url('user/'.$user['id_user'].'/update'), 'id="form-personal" class="form_update" role="form" autocomplete="off"'); ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Name</label>
                             <?php echo form_input(array('name'=>'fullname', 'id'=>'fullname','placeholder'=>'Enter Your Name', 'class'=>'form-control', 'required'=>'required'), $user['nama_lengkap']); ?>
                          </div>
                           <span class="validation-form" for="fullname"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Pages username</label>
                            <?php echo form_input(array('name'=>'username', 'class'=>'form-control','placeholder'=>'Enter Your Username', 'required'=>'required'),$user['username']); ?>
                       </div>
                        <span class="validation-form" for="username"></span>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Phone Number</label>
                            <?php echo form_input(array('name'=>'telephone', 'class'=>'form-control','placeholder'=>'Enter Your Phone Number', 'required'=>'required'),$user['no_telp']); ?>
                       </div>
                        <span class="validation-form" for="telephone"></span>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label>Password</label>
                           <?php echo form_input(array('name'=>'password', 'class'=>'form-control','placeholder'=>'Enter Your New Password')); ?>
                          </div>
                          <span class="validation-form" for="password"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Email</label>
                          <?php echo form_input(array('name'=>'email', 'class'=>'form-control','placeholder'=>'Email address', 'required'=>'required'),$user['email']); ?>
                          </div>
                           <span class="validation-form" for="email"></span>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-sm-12">
                         <div class="form-group form-group-default form-group-default-select2 required">
                          <label>Roles</label>
                          <?php echo form_dropdown('roles', $data_roles, $user['level'], 'data-init-plugin="select2" class="full-width"'); ?>
                          </div>
                          <span class="validation-form" for="roles"></span>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-sm-12">
                         <div class="form-group form-group-default form-group-default-select2 required">
                          <label>Block</label>
                           <?php echo form_dropdown('block', array('N'=>'N', 'Y'=>'Y'), $user['blokir'], 'class="full-width" data-init-plugin="select2"'); ?>
                          </div>
                          <span class="validation-form" for="block"></span>
                        </div>
                      </div>

                      
                      <div class="clearfix"></div>
                      <button class="btn btn-primary" type="submit">Update a new account</button>&nbsp;
                      <button class="btn btn-primary" type="button" onclick="window.location.href='../list-user'">Cancel</button>
                       <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
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
  $('.form_update').ajaxForm({
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
        $('#form_response').html('');
      }
    }
  });
</script>