
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">FAQ</a></li>
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
                  List Faq
                </div>
                <div class="pull-right">
                      <button class="btn btn-primary btn-cons" onclick="window.location.href='<?php echo base_url('faq/addfaq');?>'"><i class="fa fa-plus"></i> Add Faq</button>
                    </div>
                <div class="clearfix"></div>
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
                          <th>Description</th>
                          <th>Category</th>
                          <th width="15%" class="text-center">Act</th>
                        </tr>
                      </thead>

                      <tbody>
                   <?php if ($listdata): ?>
                  <?php foreach ($listdata as $key => $data): ?>
                    <tr id="row_<?php echo $data['idfaq'];?>">
                      <td class="v-align-middle">
                        <p><?php echo $number; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['title'])); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['description'])); ?></p>
                      </td>
                       <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['titlefaq'])); ?></p>
                      </td>
                      <td class="v-align-middle">
                      
                        <div class="btn-group">     
                          <a href="<?php echo base_url('faq/edit/'.$data['idfaq'].''); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit Faq"><i class="fa fa-pencil"></i></a>
                          </div>
                          <div class="btn-group">
                          <a href="javascript:;" class="btn btn-success delete" id="<?php echo $data['idfaq']; ?>" data-toggle="tooltip" data-original-title="Delete Faq"><i class="fa fa-trash-o"></i></a>
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

<script>

 $(document).ready(function() {
    $('.delete').on('click', function(){
      if (confirm('Do you want to delete this Data?'))
      {
        var id = $(this).attr('id');
        $('#row_' + id).fadeTo( "slow", 0.33 );
        $.get( base_url + "faq/delete/" + id, function( data ) {
        
          if (data.status == "success")
          {
            $('#row_' + id).fadeOut();
          }
          else
          {
            $('#row_' + id).fadeTo( "slow", 1 );
          }
        }, 'json');
      }
      else
      {
        $('#row_' + id).fadeTo( "slow", 1 );
        return false;
      }
    });
    
  });
 
</script>
        
      