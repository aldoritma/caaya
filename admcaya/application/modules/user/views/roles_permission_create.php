<div class="row-fluid">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-align-justify"></i><span class="break"></span>Create Roles Form</h2>
						<div class="box-icon">

							<a href="<?php echo base_url('user/roles/add-permission'); ?>"><i class="icon-plus"></i></a>	
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">

						<?php if ($this->session->flashdata('success')): ?>
							<div class="alert alert-success">
							<?php echo $this->session->flashdata('success'); ?>
							</div>
						<?php endif; ?>

				<?php echo form_open(base_url('user/roles/create-roles-permission'), 'class="form-horizontal" id="form_create"'); ?>

 				<fieldset>
				<div class="control-group">
                <label class="control-label" for="inputError">Roles</label>
                <div class="controls">
                <?php echo form_dropdown('roles', $data_roles, '', 'id="roles"'); ?>
                  <span class="help-inline" for='fullname'></span>
                </div>
                </div>
 
							
							<div class="par control-group" id="div_title">
								<label class="control-label" for="label-title">Permission <sup style="font-size:12px">&ast;</sup> </label>
								<div class="controls">
									<?php echo generate_category($category); ?>
									<label class="error" for="category_id" generated="true"></label>
								</div>
							</div>


 				<div class="form-actions">
                <button type="submit" class="btn btn-primary" id="button_create">Save changes</button> <span id="form_response"></span>
                </div>
                </fieldset>

				<?php echo form_close();?>
					</div>
					</tbody>
						 </table> 

						 
					</div>
				</div><!--/span-->
			</div><!--/row-->


			<script type="text/javascript">
	var $ = jQuery;
	
	$('#form_create').ajaxForm({
		url: $(this).attr('action'),
		type: 'post',
		dataType: 'json',
		beforeSend: function()
		{
			$('#form_response').html('<img src="'+base_url+'assets/loader/loader.gif" />');
			$('#form_create :input').attr('disabled', true);
		},
		success: function(response)
		{
			if (response.status != 'success')
			{
				$('#form_create :input').attr('disabled', false);	
				$.each(response.message, function(key, val) {
					$('label[for="'+key+'"]').html(val);
				});
				
				$('#form_response').html('');
				$.colorbox.resize();
			}
			else
			{
				$('#form_response').html('');
				$('#form_create :input').attr('disabled', false);
				$('#form_create').resetForm();
				
				setTimeout(function() {
					$("html, body").animate({ scrollTop:265 }, "slow");
					location.reload();
				}, 1000);
				
			}
		}
	});
</script>