<!--pageheader-->
<?php echo $template['partials']['page_header']; ?>
<!--endpageheader-->

<div class="maincontent">
	<div class="maincontentinner">
		<div class="row-fluid">
			<div id="dashboard-left" class="span12">
				
			<div class="widgetbox box-inverse">
				<h4 class="widgettitle">Website Identity</h4>
				<div class="widgetcontent wc1">
					<?php echo form_open(base_url('website/identity/update'), 'id="form_update" class="stdform"'); ?>
						<div class="par control-group">
							<label class="control-label">Website Name</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'website_name', 'id'=>'website_name', 'class'=>'input-xxlarge'), stripslashes(html_entity_decode($identity['nama_website']))); ?> <label class="error" for="website_name" generated="true"></label>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Url</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'url', 'id'=>'url', 'class'=>'input-xxlarge'), $identity['url']); ?>
								<label class="error" for="url" generated="true"></label>
							</div>
						</div>
						
						<div class="par control-group">
							<label class="control-label">Facebook Fan Page</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'facebook', 'id'=>'facebook', 'class'=>'input-xxlarge'), $identity['facebook']); ?>
								<label class="error" for="facebook" generated="true"></label>
							</div>
						</div>
						
						<div class="par control-group">
							<label class="control-label">Meta Description</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'meta_description', 'id'=>'meta_description', 'class'=>'input-xxlarge'), $identity['meta_deskripsi']); ?>
								<label class="error" for="meta_description" generated="true"></label>
							</div> 
						</div>
						
						<div class="par control-group">
							<label class="control-label">Meta Keyword</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'meta_keyword', 'id'=>'meta_keyword', 'class'=>'input-xxlarge'), $identity['meta_keyword']); ?>
								<label class="error" for="meta_keyword" generated="true"></label>
							</div> 
						</div>
						
						<div class="par control-group">
							<label class="control-label">Email</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'email', 'id'=>'email', 'class'=>'input-xxlarge'), $identity['email']); ?>
								<label class="error" for="email" generated="true"></label>
							</div> 
						</div>
						
						<div class="par control-group">
							<label class="control-label">Telephone</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'telephone', 'id'=>'telephone', 'class'=>'input-xxlarge'), $identity['no_telp']); ?>
								<label class="error" for="telephone" generated="true"></label>
							</div> 
						</div>
						
						<div class="par control-group">
							<label class="control-label">Bank Account</label>
							<div class="controls">
								<?php echo form_input(array('name'=>'bank_account', 'id'=>'bank_account', 'class'=>'input-xxlarge'), $identity['rekening']); ?>
								<label class="error" for="bank_account" generated="true"></label>
							</div> 
						</div>
						
						<div class="par control-group">
							<label class="control-label">Favicon</label>
							<div class="controls">
								<?php echo $identity['favicon'] ? img(array('src'=>base_url('../img/'.$identity['favicon']))) : "You don't upload any favicon."; ?>
							</div> 
						</div>
						
						<div class="par control-group">
							<label class="control-label"></label>
							<div class="controls">
								<?php echo form_upload(array('name'=>'userfile', 'id'=>'userfile', 'class'=>'input-large')); ?>
								<label class="error" for="userfile" generated="true"></label>
							</div> 
						</div>
												
						<p class="stdformbutton">
							<button class="btn btn-primary" type="submit">Save Changes</button> <span id="form_response"></span>
						</p>
						<input type="hidden" name="identity_id" id="identity_id" value="<?php echo $identity['id_identitas']; ?>" />
					<?php echo form_close(); ?>
				</div><!--widgetcontent-->
			</div><!--widget-->
            	
				<br />
			</div><!--span12-->
		</div><!--row-fluid-->
		
		<!--Footer-->
		<?php echo $template['partials']['footer']; ?>
		<!--End Footer-->
		
	</div><!--maincontentinner-->
</div><!--maincontent-->

<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="myModal">
    
</div><!--#myModal-->
<?php echo $template['metadata']; ?>