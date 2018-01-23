    
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">Slide About</a></li>
                </ul>
                </div>
               </div>
              </div>
            
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">List Slide About
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                  <button class="btn btn-primary btn-cons" onclick="window.location.href='../../about'">Back</button>&nbsp;
                    <button class="btn btn-primary btn-cons" onclick="window.location.href='../addslide/<?php echo $dataslide['id'];?>'"><i class="fa fa-plus"></i> Add Slide About</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                 <table class="table table-hover" id="basicTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th width="15%">Act</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($slidedata): ?>
                  <?php  foreach ($slidedata as $key => $data): ?>
                    <tr id="row_<?php echo $data['id'];?>">
                      <td class="v-align-middle">
                        <p><?php echo $number; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo ucwords($data['description']);?></p>
                      </td>
                      <td class="v-align-middle">
                          <div class="btn-group">     
                          <a href="<?php echo base_url('about/editslide/'.$data['id'].''); ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                          </div>
                          <div class="btn-group">
                          <a href="javascript:;" class="btn btn-success delete btn-sm" id="<?php echo $data['id']; ?>"><i class="fa fa-trash-o"></i></a>
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
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->

<script type="text/javascript">
  $(document).ready(function() {
    $('.delete').on('click', function(){
      if (confirm('Do you want to delete this Data?'))
      {
        var id = $(this).attr('id');
        $('#row_' + id).fadeTo( "slow", 0.33 );
        $.get( base_url + "about/delslide/" + id, function( data ) {
        
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
        
      