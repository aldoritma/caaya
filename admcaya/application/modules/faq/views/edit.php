<!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('product/listproduct'); ?>">FAQ</a></li>
              <li><a href="#" class="active">Edit Faq</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->

            <?php if ($this->session->flashdata('update_success')): ?>
            <div class="alert alert-success" role="alert">
              <button class="close" data-dismiss="alert"></button>
              <?php echo $this->session->flashdata('update_success'); ?>
            </div>
            <?php endif; ?>
              <div class="panel panel-default">
               <?php echo form_open(site_url('faq/editdata/'.$dataslide['id'].''), 'id="form-personal" class="form_update" role="form" autocomplete="off"'); ?>
                
               <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                      <div class="row column-seperation">

                        <div class="form-group">
                          <label>Category</label>
                          <div class="form-group">
                           <?php echo form_dropdown('catcontent', $listcategory, $dataslide['catid'], 'data-init-plugin="select2" class="full-width" required="required"'); ?>
                          </div>
                          <span class="validation-form" for="catcontent"></span>
                        </div>


                        <div class="form-group">
                          <label>Title</label>
                          <?php echo form_input(array('name'=>'title', 'id'=>'title','placeholder'=>'Enter Your Title', 'class'=>'form-control', 'required'=>'required'),$dataslide['title']); ?>
                             
                          <span class="validation-form" for="title"></span>
                        </div>    
                 

                        <div class="form-group">
                          <label>Description</label>
                          <?php echo form_textarea(array('name'=>'description', 'class'=>'summernote', 'id'=>'description', 'placeholder'=>'Enter text ...'),stripslashes(htmlspecialchars_decode(html_entity_decode($dataslide['description'])))); ?>
                       <span class="validation-form" for="description"></span>
                       </div>
                       </div>

                    <div class="row">
                    <button class="btn btn-primary" type="submit">Save a Product</button>
                    <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('faq/listfaq');?>'">Cancel</button>
                    </div>

                       </div>
                       </div>
                       </div>
                       </div>
                       </div>
                    </div>
                    </div>

          <!-- END CONTAINER FLUID -->

          <script type="text/javascript">
            var $ = jQuery;
            var error_message = "";

            $('.form_update').ajaxForm({
              url: $(this).attr('action'),
              type: 'post',
              dataType: 'json',
              beforeSerialize: function(){
              },
              beforeSend: function()
              {
                $('.form_update :input').attr('disabled', true);
              },
              success: function(response)
              {
                if (response.status != 'success')
                {
                  error_message = "";
                  $('.form_update :input').attr('disabled', false); 
                  $.each(response.message, function(key, val) {
                    $('span[for="'+key+'"]').html(val);
                    if(val != "" && val != null) error_message += val + "<br>";
                  });
                }
                else
                {
                  setTimeout(function() {
                    $("html, body").animate({ scrollTop:265 }, "slow");
                    location.reload();
                  }, 1000);
                  $('.form_update')[0].reset();
                  $('textarea#textarea2').val(" ");
                  $('#form_update :input').attr('disabled', false);
                }
              }
            });
          </script>