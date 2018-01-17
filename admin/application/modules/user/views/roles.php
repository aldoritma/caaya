    
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">User</a></li>
                  <li><a href="#" class="active"><?php echo $this->uri->segment(2);?></a>
                  </li>
                </ul>
                </div>
               </div>
              </div>
            
         
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">List Roles
                </div>
                <div class="pull-right">
                   <div class="col-xs-12">
                    <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add Roles</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                  <thead>
                     <tr>
                    <th>No</th>
                    <th>Roles Name</th>
					          <th>Permission</th>
					          <th>Created</th>
					          <th style="text-align:center"><a href="#" class="btn-setting"><i class="icon-wrench"></i></a></th>  
                    </tr>
                  </thead>
                  <tbody>
                	<?php if ($roles): ?>
							<?php $i = 1; foreach ($roles as $key => $roles): ?>
                    <tr>
                      <td class="v-align-middle">
                        <p><?php echo $i; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo ucwords($roles['type_name']); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p>
                      <?php if ($roles['permission']): ?>
											<?php foreach ($roles['permission'] as $key => $permission): ?>
												{<?php echo $permission['url']; ?>} 
											<?php endforeach; ?>
										<?php else: ?>
											<?php echo $roles['type_slug'] === "admin" ? "All Access" : "Not Set"; ?>
											
										<?php endif; ?>	
                        </p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $roles['type_date']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p>
                      <a href="<?php echo base_url('user/roles/'.$roles['type_id'].'/edit'); ?>"><span class="fa fa-edit"></span></a>
                        </p>
                      </td>
                    </tr>
                 <?php $i++; endforeach; ?>
						<?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->


           <!-- MODAL STICK UP  -->
  <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">

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
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">Add</span> Roles</h4>
              </div>
              <div class="modal-body">              
               <?php echo form_open(base_url('user/addroles'), 'id="form-personal" class="form_create" role="form" autocomplete="off"'); ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>name</label>
                       <?php echo form_input(array('name'=>'rolesname', 'id'=>'appName','placeholder'=>'Name of your Roles', 'class'=>'form-control', 'required'=>'required')); ?>
                      
                          <span class="validation-form" for="rolesname"></span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary  btn-cons">Add</button>
                <button type="button" class="btn btn-cons" data-dismiss="modal">Close</button>
              </div>
               <?php echo form_close();?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->



