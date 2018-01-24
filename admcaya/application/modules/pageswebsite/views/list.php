
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">About</a></li>
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
                  List About
                </div>
                <div class="pull-right">
                      <button class="btn btn-primary btn-cons" onclick="window.location.href='<?php echo base_url('about/addabout');?>'"><i class="fa fa-plus"></i> Add About</button>
                    </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover" id="basicTable">
                      <thead>
                        <tr>
                          
                          <th>No</th>
                          <th>Images</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th width="30%" class="text-center">Act</th>
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
                        <p>
                        <?php if($data['img'] == "") { echo "No images";}else{ ?>
                        <img src="<?php echo base_url('../assets/about/417x417_'.$data['img']);?>">
                        <?php } ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['title'])); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo stripslashes(html_entity_decode($data['description'])); ?></p>
                      </td>
                      <td class="v-align-middle">
                        <div class="btn-group">     
                          <a href="<?php echo base_url('about/addslide/'.$data['id'].''); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="Add Data"><i class="fa fa-plus"></i> Slide</a>
                          </div>
                        <div class="btn-group">     
                          <a href="<?php echo base_url('about/slidedata/'.$data['id'].''); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="View Slide"><i class="fa fa-eye"></i> View</a>
                          </div>
                        <div class="btn-group">     
                          <a href="<?php echo base_url('about/edit/'.$data['id'].''); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit Data"><i class="fa fa-pencil"></i></a>
                          </div>
                          <div class="btn-group">
                          <a href="javascript:;" class="btn btn-success delete" id="<?php echo $data['id']; ?>" data-toggle="tooltip" data-original-title="Delete Data"><i class="fa fa-trash-o"></i></a>
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
        $.get( base_url + "about/delete/" + id, function( data ) {
        
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
        
      