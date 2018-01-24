
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">Home Pages</a></li>
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
                  List Home Pages
                </div>
                
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    
                  </div>
                    <div class="col-md-4">
                      <div class="table-toolbar" style="display: none">
                        <select name="input-search-table" id="dropdown-search-table" class="form-control">
                          <option value="">Categories</option>
                          <?php foreach($listcat as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover" id="basicTable">
                      <thead>
                        <tr>
                          
                          <th>No</th>
                          <th>Title</th>
                          <th>Sub Title</th>
                          <th>Sub Title 2</th>
                          <th>Description</th>
                          <th width="15%" class="text-center">Act</th>
                        </tr>
                      </thead>

                      <tbody>
                   <?php if ($listdata): ?>
                  <?php foreach ($listdata as $key => $data): ?>
                    <tr id="row_<?php echo $data['id'];?>">
                      <td class="v-align-middle">
                        <p><?php echo $number; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['title'])); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['subtitle'])); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['subtitle2'])); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['description'])); ?></p>
                      </td>
                      
                      <td class="v-align-middle">
                      
                        <div class="btn-group">     
                          <a href="<?php echo base_url('home/edit/'.$data['id'].''); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit Faq"><i class="fa fa-pencil"></i></a>
                          </div>
                      </td>
                     
                    </tr>
            <?php $number++; endforeach;    ?>
            <?php endif; ?>
                  </tbody>
                </table>
                <div class="boxPagingtwo">
                <?php echo $paging; ?>
                </div>


                  </div>
                </div>
              </div>
            </div>
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->
