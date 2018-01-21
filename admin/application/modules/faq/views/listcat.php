    
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">Category</a></li>
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
                <div class="panel-title">List Category
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <button class="btn btn-primary btn-cons" onclick="window.location.href='addcategory'"><i class="fa fa-plus"></i> Add Category</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Act</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($listcat): ?>
                  <?php $no= '1'; foreach ($listcat as $key => $data): ?>
                    <tr id="row_<?php echo $data['catid'];?>">
                      <td class="v-align-middle">
                        <p><?php echo $no++; ?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo ucwords($data['cat']);?></p>
                      </td>
                      <td class="v-align-middle">
                          <div class="btn-group">     
                          <a href="<?php echo base_url('product/editcat/'.$data['catid'].''); ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                          </div>
                          <div class="btn-group">
                          <a href="javascript:;" class="btn btn-success delete btn-sm" id="<?php echo $data['catid']; ?>"><i class="fa fa-trash-o"></i></a>
                          </div>
                      </td>
                     
                    </tr>
            <?php endforeach; //$sort_number++;   ?>
            <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            <!-- END PANEL -->
          </div>
          <!-- END CONTAINER FLUID -->

<script type="text/javascript">
  $(document).ready(function() {
    $('.delete').on('click', function(){
      if (confirm('Do you want to delete this Category?'))
      {
        var id = $(this).attr('id');
        $('#row_' + id).fadeTo( "slow", 0.33 );
        $.get( base_url + "product/delcat/" + id, function( data ) {
        
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
    
    $("table").DataTable({
      "columnDefs": [
        { "targets": 0, "width": "10%"},
        { "targets": 2, "width": "15%", "className": "text-center v-align-middle"},
      ]
    });
  });
</script>      
        
      