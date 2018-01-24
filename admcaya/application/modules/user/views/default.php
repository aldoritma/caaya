    
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
                <div class="panel-title">List User
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                   <button id="show-modal" class="btn btn-primary btn-cons" onclick="window.location.href='add-user'"><i class="fa fa-plus"></i> Add User</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                  <thead>
                     <tr>
                      <th>#</th>
                      <th>Fullname</th>
                      <th>Level</th>
                      <th>Blokir</th>
                       <th>Act</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($user): ?>
				    <?php $i = 1; foreach ($user as $key => $user): ?>
                    <tr>
                      <td class="v-align-middle">
                        <p><?php echo $i; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo ucwords($user['nama_lengkap']); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo ucwords($user['level']); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $user['blokir']; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p>
                       <a href="<?php echo base_url('user/'.$user['id_user'].'/edit'); ?>" class="colorbox">
					   <span class="fa fa-edit"></span>
					   </a>
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

