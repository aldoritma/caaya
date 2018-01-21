
          <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="#">Product</a></li>
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
                  List Product
                </div>
                <div class="pull-right">
                      <button class="btn btn-primary btn-cons" onclick="window.location.href='<?php echo base_url('product/addproduct');?>'"><i class="fa fa-plus"></i> Add Product</button>
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
                    <tr id="row_<?php echo $data['id'];?>">
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
                          <a href="<?php echo base_url('newsevent/edit/'.$data['id'].''); ?>" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit Content"><i class="fa fa-pencil"></i></a>
                          </div>
                          <div class="btn-group">
                          <a href="javascript:;" class="btn btn-success delete" id="<?php echo $data['id']; ?>" data-toggle="tooltip" data-original-title="Delete Content"><i class="fa fa-trash-o"></i></a>
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
  var filter = {};

  $(document).ready(function() {
    $('body').on('click','.delete', function(){
      if (confirm('Do you want to delete this Product?'))
      {
        var id = $(this).attr('id');
        $.get( base_url + "product/delete/" + id, function( data ) {
        
          if (data.status == "success")
          {
            alert("Success delete");
            table.ajax.reload();
          }
          else
          {
            alert("Failed delete");
            table.ajax.reload();
          }
        }, 'json');
      }
    });

    $('body').on('click','.published', function(){
      if (confirm('Dont Publish this Product ?'))
      {
        var id = $(this).data('id');
        var stat = $(this).data('publish');

        $.ajax({
          url: '<?php echo site_url('product/change_status/');?>/'+id,
          type: 'post',
          dataType: 'json',
          data: {publish: stat},
        })
        .done(function(response) {
          if(response.status == 'success'){
            alert("Success");
            table.ajax.reload();
          } else {
            alert("Error");
            table.ajax.reload();
          }
        })
        .fail(function(thrownError) {
          console.log(thrownError.textResponse);
        });
        
      }
    });

</script>
        
      