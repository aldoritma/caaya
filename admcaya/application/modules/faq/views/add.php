<!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('product/listproduct'); ?>">FAQ</a></li>
              <li><a href="#" class="active">Add FAQ</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
              <button class="close" data-dismiss="alert"></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php endif; ?>
              <div class="panel panel-default">
              <?php echo form_open_multipart(base_url('faq/savefaq'), 'id="form-personal" class="form_create" role="form" autocomplete="off"'); ?>
                
               <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                      <div class="row column-seperation">

                      <div class="form-group">
                          <label>Category Product</label>
                          <div class="form-group">
                          <?php echo form_dropdown('catcontent', $listcategory,'', 'class="full-width" data-init-plugin="select2" required="required"'); ?>
                          </div>
                          <span class="validation-form" for="catcontent"></span>
                        </div>

                        <div class="form-group">
                          <label>Title</label>
                          <?php echo form_input(array('name'=>'title', 'id'=>'title','placeholder'=>'Enter Your Title', 'class'=>'form-control', 'required'=>'required')); ?>
                             
                          <span class="validation-form" for="title"></span>
                        </div>               
   
                        

                        <div class="form-group">
                          <label>Description</label>
                          <?php echo form_textarea(array('name'=>'description', 'class'=>'summernote', 'id'=>'description', 'placeholder'=>'Enter text ...')); ?>
                       <span class="validation-form" for="description"></span>
                       </div>
                       </div>

                    <div class="row">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('faq/listfaq');?>'">Cancel</button>
                    </div>

                       </div>
                       </div>
                       </div>
                       </div>
                       </div>
                   <?php echo form_close();?>
                       
                    </div>
                    </div>

          <!-- END CONTAINER FLUID -->

          <script type="text/javascript">
            var $ = jQuery;
            var error_message = "";

            $('.form_create').ajaxForm({
              url: $(this).attr('action'),
              type: 'post',
              dataType: 'json',
              beforeSerialize: function(){
              },
              beforeSend: function()
              {
                $('.form_create :input').attr('disabled', true);
              },
              success: function(response)
              {
                if (response.status != 'success')
                {
                  error_message = "";
                  $('.form_create :input').attr('disabled', false); 
                  $.each(response.message, function(key, val) {
                    $('span[for="'+key+'"]').html(val);
                    if(val != "" && val != null) error_message += val + "<br>";
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
                  $('textarea#textarea2').val(" ");
                  $('#form_response').html('');
                  $('#form_create :input').attr('disabled', false);
                }
              }
            });
          </script>