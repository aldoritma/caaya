

    
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <?php echo @$breadcrumb;?>
              </div>
            </div>
          </div>
            
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">List Navigation Menu
                </div>

                <div class="pull-right">
                  <div class="col-xs-12">
                    <button class="btn btn-primary btn-cons" onclick="window.location.href='<?php echo base_url('website/navigation/back-end/add'); ?>'"><i class="fa fa-plus"></i> Add Navigation</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover" id="basicTable">
                  <thead>
                     <tr>

                    		<th>#</th>
							<th>Name</th>
                            <th>Parent</th>
                            <th>Url</th>
                            <th>Active</th>
                            <th>Act</th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php if ($navigation): ?>
				<?php $i = 1; foreach ($navigation as $key => $navigation): ?>
						<tr>
									<td class="v-align-middle"><?php echo $i; ?></td>
									<td class="v-align-middle"><?php echo $navigation['title']; ?></td>
									<td class="v-align-middle"><?php echo isset($navigation['parent']['parent_id']) != 0 ? $navigation['parent']['title'] : "Main Navigation" ; ?></td>
									<td class="v-align-middle"><?php echo $navigation['url']; ?></td>
									<td class="v-align-middle"><?php echo $navigation['is_active'] == 1 ? "Yes" : "No"; ?></td>
									<td class="v-align-middle">
									 <div class="btn-group">
                          <a href="<?php echo base_url('website/navigation/'.$navigation['app'].'/'.$navigation['id'].'/edit'); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          </div>
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


<?php echo $template['metadata']; ?>      
