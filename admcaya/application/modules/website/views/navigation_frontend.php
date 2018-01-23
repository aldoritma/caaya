<!--pageheader-->
<?php echo $template['partials']['page_header']; ?>
<!--endpageheader-->

<div class="maincontent">
	<div class="maincontentinner">
		<div class="row-fluid">
			<div id="dashboard-left" class="span12">
				<span class="pull-right">
					<a class="btn btn-primary colorbox" href="<?php echo base_url('website/navigation/front-end/add'); ?>">
						<i class="iconfa-plus icon-white"></i> Add Navigation
					</a>
				</span>
				
            	<table class="table table-bordered table-striped responsive">
                    <thead>
                        <tr>
                        	<th class="centeralign">#</th>
							<th>Name</th>
                            <th>Parent</th>
                            <th>Url</th>
                            <th>Active</th>
                            <th class="centeralign"><i class="icon-white icon-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
						<?php if ($navigation): ?>
							<?php $i = 1; foreach ($navigation as $key => $navigation): ?>
								<tr>
									<td class="centeralign"><?php echo $sort_number; ?></td>
									<td><?php echo $navigation['title']; ?></td>
									<td><?php echo isset($navigation['parent']['parent_id']) != 0 ? $navigation['parent']['title'] : "Main Navigation" ; ?></td>
									<td><?php echo $navigation['url']; ?></td>
									<td><?php echo $navigation['is_active'] == 1 ? "Yes" : "No"; ?></td>
									<td class="centeralign"><a href="<?php echo base_url('website/navigation/'.$navigation['app'].'/'.$navigation['id'].'/edit'); ?>" class="colorbox"><span class="icon-pencil"></span></a></td>
								</tr>
							<?php $sort_number++; endforeach; ?>
						<?php endif; ?>
                    </tbody>
                </table>
				<div class="pagination">
					<?php echo $paging; ?>
				</div>
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