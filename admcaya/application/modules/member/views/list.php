
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">Member</a></li>
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
                <div class="panel-title">
                  List Member
                </div>
                
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    
                  </div>
                    <div class="col-md-4">
                      <div class="table-toolbar" style="display: none">
                        
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover dataTable" id="tbl_listnews">
                      <table class="table table-hover" id="basicTable">
                  <thead>
                    <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Provider</th>
                    <th>Email</th>                   
                    </tr>
                  </thead>
                  <tbody>

                  <?php if($data): ?>
                    <?php foreach ($data as $key => $data): ?>
                    <tr id="row_<?php echo $data['id'];?>">
                     <td class="v-align-middle">
                        <p><?php echo $number; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $data['screename'];?></p>
                          </td>
                          <td class="v-align-middle">
                            <p>
                          <?php echo $data['provider'];?></p>
                              </td>
                      <td class="v-align-middle">
                      <p><?php echo $data['email'];?></p>
                      </td>          
                    </tr>
                  <?php $number++; endforeach; endif; ?>

                  </tbody>
                </table>

                <div class="boxPagingtwo">
                <?php echo $paging; ?>
                </div>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->

