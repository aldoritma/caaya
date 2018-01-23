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
                   <?php echo form_open(base_url('user/roles/update-roles-permission'), 'class="form_create" id="form-personal" role="form" autocomplete="off"'); ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Roles</label>
                            <?php echo form_input(array('name'=>'roles', 'readonly'=>'readonly','class'=>'form-control'), $roles['type_name']); ?>
			    		    <input type="hidden" name="roles_slug" value="<?php echo $roles['type_slug']; ?>">
                          </div>
                        </div>
                      </div>
                     
                     
                       <div class="row">
                        <div class="col-sm-12">
                         <div class="form-group form-group-default form-group-default-select2 required">
                         
                         <?php if ($current_permission): ?>
									<?php foreach ($current_permission as $current): ?>
										<div class="controls" id="current_category_<?php echo $current['id']; ?>">
											<span class='formwrapper'>
												<input type="checkbox" disabled="disabled" checked="checked"> <?php echo $current['title']; ?> [ <a href="javascript:;" class="current-category" id="<?php echo $current['id']; ?>"><span class="fa fa-trash"></span>
</a> ] <span id="delete_categories_<?php echo $current['id']; ?>"></span>
											</span>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<div class="controls">
										<span class='formwrapper'><span style="color:red; font-weight:bold">Unset</span></span>	
									</div>
								<?php endif; ?>

                          </div>


                          
                        </div>
                      </div>

                      <div class="controls">
									<span class='formwrapper' id='add_categories_span'>
										<a href="javascript:;" class="add-categories">Click here if you want to add or add more permission to this roles</a>
									</span>	
								</div>

								<div class="par control-group" id="div_more_categories" style="display:none">
									<label class="control-label" for="label-title">&nbsp;</label>
									<div class="controls">
										<?php echo generate_category($category); ?>
										<label class="error" for="category_id" generated="true"></label>
									</div>
								</div>


                      <div class="clearfix"></div>
                      <button class="btn btn-primary" type="submit">Create a new account</button>
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
	
	$( "#add_categories_span" ).on('click', function() {
		$('.add-categories', this).text(function(i, v) {
			return v === 'Close' ? 'Click here if you want to add more categories to this post' : 'Close'
		})
		$( '#div_more_categories' ).slideToggle();
	});
	
	$('.current-category').on('click', function(){
		if (confirm('Do you want to delete this permission ?'))
		{
			var id = $(this).attr('id');
			$('#delete_categories_' + id).html('Deleting...');
			$.get( base_url + "user/delete_roles_permission/" + id, function( data ) {
				$('#delete_categories_' + id).html('');
				$('#current_category_' + id).fadeOut();
			});
		}
		else
		{
			$('#delete_categories_' + id).html('');
			return false;
		}
	});
	
	$('.form_create').ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		dataType: 'json',
		beforeSend: function()
		{
			$('#form_response').html('<img src="'+base_url+'assets/images/loaders/loader3.gif" />');
			$('.form_create :input').attr('disabled', true);
		},
		success: function(response)
		{
			if (response.status != 'success')
			{
				$('.form_create :input').attr('disabled', false);	
				$.each(response.message, function(key, val) {
					$('label[for="'+key+'"]').html(val);
				});
				
				$('#form_response').html('');
				$.colorbox.resize();
			}
			else
			{
				setTimeout(function() {
					$("html, body").animate({ scrollTop:265 }, "slow");
					location.reload();
				}, 1000);

				$('#form_response').html('');
				$('.form_create :input').attr('disabled', false);
				$('.form_create').resetForm();
				
			}
		}
	});
</script>
		