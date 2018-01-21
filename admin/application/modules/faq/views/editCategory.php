<!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li><a href="#">Category</a></li>
              <li><a href="#" class="active">Edit Category</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->
            <?php if ($this->session->flashdata('success_update')): ?>
            <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong><?php echo $this->session->flashdata('success_update'); ?></strong>
            </div>
            <?php endif; ?>
              
              <?php echo form_open(base_url('product/editSavecat/'.$dataslide['catid'].''), 'id="form-personal" class="form_update" role="form" autocomplete="off"'); ?>
              <!-- START PANEL -->
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="tab-content">
                      <div class="tab-pane active" id="indonenesian">
                        <div class="row column-seperation">
                          <div class="form-group">
                            <label>Title</label>
                            <?php echo form_input(array('name'=>'catname', 'id'=>'catname','placeholder'=>'Enter Your Title', 'class'=>'form-control', 'required'=>'required'), $dataslide['cat']); ?>
                            <span class="validation-form" for="catname"></span>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <button class="btn btn-primary" type="submit">Create a Category</button>
                      <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('product/listcategory');?>'">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PANEL -->
              <?php echo form_close();?>
              </div>
            </div>
         
          <!-- END CONTAINER FLUID -->

<script type="text/javascript">
  var $ = jQuery;
  $('.form_update').ajaxForm({
    url: $(this).attr('action'),
    type: 'post',
    dataType: 'json',
    beforeSend: function()
    {
      $('.form_update :input').attr('disabled', true);
    },
    success: function(response)
    {
      if (response.status != 'success')
      {
        $('.form_update :input').attr('disabled', false); 
        $.each(response.message, function(key, val) {
        $('span[for="'+key+'"]').html(val);
        });
        
        $('#form_update').html('');
      }
      else
      {
        setTimeout(function() {
          $("html, body").animate({ scrollTop:265 }, "slow");
          location.reload();
        }, 1000);
        $('#form_create :input').attr('disabled', false);
      }
    }
  });
</script>