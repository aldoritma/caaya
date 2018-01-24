<!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li><a href="#">Slide</a></li>
              <li><a href="#" class="active">Add slide</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
            <?php endif; ?>
              <?php echo form_open_multipart(base_url('about/saveslide/'.$dataslide['id']), 'id="form-personal" class="form_create" role="form" autocomplete="off"'); ?>
              <!-- START PANEL -->
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="tab-content">
                      <div class="tab-pane active" id="indonenesian">
                        <div class="row column-seperation">
                          <div class="form-group">
                            <label>Title</label>
                            <?php echo form_input(array('name'=>'description', 'id'=>'description','placeholder'=>'Enter Your Title', 'class'=>'form-control', 'required'=>'required')); ?>
                            <span class="validation-form" for="description"></span>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <button class="btn btn-primary" type="submit">saving</button>
                      <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('about');?>'">Cancel</button>
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
  $('.form_create').ajaxForm({
    url: $(this).attr('action'),
    type: 'post',
    dataType: 'json',
    beforeSend: function()
    {
      $('.form_create :input').attr('disabled', true);
    },
    success: function(response)
    {
      if (response.status != 'success')
      {
        $('.form_create :input').attr('disabled', false); 
        $.each(response.message, function(key, val) {
          $('span[for="'+key+'"]').html(val);
        });
        
        $('#form_response').html('');
      }
      else
      {
        setTimeout(function() {
          $("html, body").animate({ scrollTop:265 }, "slow");
          location.reload();
        }, 1000);

        $('.form_create')[0].reset();
        $('#form_response').html('');
        $('#form_create :input').attr('disabled', false);
      }
    }
  });
</script>