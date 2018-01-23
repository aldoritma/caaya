<div class="modal-header">
	<button aria-hidden="true" data-dismiss="modal" class="close" type="button" onclick="$.colorbox.close()">&times;</button>
	<h3 id="myModalLabel"><?php echo $modal_header; ?></h3>
</div>
<div class="modal-body">
	<?php $app_menu = $this->uri->segment(3); ?>
	<?php echo form_open(base_url('website/navigation/'.$app_menu.'/'.$navigation['id'].'/update'), 'id="form_update"'); ?>
	<table width="100%">
		<tr>
			<td>Is Active</td>
			<td> <?php echo form_checkbox('is_active', '1', $navigation['is_active'] === "1" ? TRUE : FALSE, 'id="is_active" style="margin:0 0 0 0"'); ?></td>
		</tr>
		<tr>
			<td>Parent</td>
			<td> <?php echo form_dropdown('parent_id', $parent, $navigation['parent_id'], 'class="navigation"'); ?> <span id="error_parent"></span></td>
		</tr>
		<tr>
			<td>Is Dropdown</td>
			<td> <?php echo form_checkbox('is_dropdown', 'dropdown', $navigation['dropdown'] === "dropdown" ? TRUE : FALSE, 'id="is_dropdown" style="margin:0 0 0 0"'); ?></td>
		</tr>
		<tr>
			<td>Icon</td>
			<td><?php echo form_input(array('name'=>'icon','class'=>'input-xlarge navigation'), $navigation['icon']); ?> <span id="error_title"></span></td>
		</tr>
		<tr>
			<td>Title</td>
			<td><?php echo form_input(array('name'=>'title','class'=>'input-xlarge navigation'), $navigation['title']); ?> <span id="error_title"></span></td>
		</tr>
		<tr>
			<td>Url</td>
			<td><?php echo form_input(array('name'=>'url','class'=>'input-xlarge navigation'), $navigation['url']); ?> <span id="error_url"></span></td>
		</tr>
	</table>
	<input type="hidden" name="app_menu" value="<?php echo $app_menu; ?>" />
	<?php echo form_close(); ?>
</div>
<div class="form-actions" style="margin-bottom:0px;">
  <button type="submit" class="btn btn-primary" id="update_button">Save Changes</button> <span id="form_response"></span>
</div>
<script type="text/javascript">
	
	$('#is_magazine').on('click', function() {
		if ($('#is_magazine').is(':checked')) {
			$("#magazine_list").show();
			$("#category_list").hide();
			$.colorbox.resize();
		} else {
			$("#magazine_list").hide();
			$("#category_list").show();
			$.colorbox.resize();
		}
	});
	
	$('#update_button').on('click', function(){
	
		$('#form_update').ajaxSubmit({
			url: $(this).attr('action'),
			type: 'post',
			dataType: 'json',
			beforeSend: function()
			{
				$('#form_response').html('<img src="'+base_url+'assets/images/loaders/loader3.gif" />');
				$('#form_create :input').attr('disabled', true);
			},
			success: function(response)
			{
				if (response.status != 'success')
				{
					$('#form_create :input').attr('disabled', false);	
					$.each(response.message, function(key, val) {
						$('span#error_'+key+'').html(val);
					});
					
					$('#form_response').html('');
					$.colorbox.resize();
				}
				else
				{
					$('#form_response').html(''+response.message+'');
					
					$('span#error_fullname').html('');
					$('span#error_email').html('');
					$('span#error_telephone').html('');
					$('span#error_username').html('');
					$('span#error_password').html('');
					$('span#error_roles').html('');
					
					$('#form_create :input').attr('disabled', false);
					$('#form_create').resetForm();
					$.colorbox.resize();
					
					setTimeout(function(){ location.reload(); }, 1000);
				}
			}
		});
	});
</script>