<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>.::ADMINISTRATOR::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo base_url();?>assets/all/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/all/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/all/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/all/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>assets/all/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>assets/all/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?php echo base_url();?>assets/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
        <link href="<?php echo base_url();?>assets/pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
    <script type="text/javascript"> var base_url = '<?php echo base_url(); ?>'; </script>
	<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.form-3.45.0.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			var $ = jQuery;
			$('#form-login').ajaxForm({
				url: $(this).attr('action'),
				type: 'post',
				dataType: 'json',
				beforeSubmit: function()
				{
					$('#form-login :input').attr('disabled', true);
				},
				success: function(response)
				{
					if(response.status != 'success')
					{
                        $('#response').show();
						$('#form-login :input').attr('disabled', false);
						$('.alert-danger').show().html('<div class="alert alert-'+response.status+'">'+response.message+'</div>');
					}
					else
					{
						$('.alert-danger').show().html('<div class="alert alert-'+response.status+'">'+response.message+'</div>');
						setTimeout(function() {
							// Redirect to base_url after 1 seconds
							window.location.href = base_url + 'dashboard';
						}, 1000);
					}
				}
			});

			$('#_username').focus();

		});
		</script>
  </head>
  <body class="fixed-header   ">
    <!-- START PAGE-CONTAINER -->
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="<?php echo base_url();?>assets/all/img/bg/bg-front.jpg" data-src="<?php echo base_url('assets/all/img/bg/bg-front.jpg');?>" data-src-retina="<?php echo base_url('assets/all/img/bg/bg-front.jpg');?>" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h2 class="semi-bold text-white">
					Pages administrator</h2>
          <p class="small">©2018 caaya
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->

    <?php echo $template['body']; ?>  

    
    <!-- END PAGE CONTAINER -->
    <!-- BEGIN VENDOR JS -->
    <script src="<?php echo base_url();?>assets/all/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/classie/classie.js"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?php echo base_url();?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?php echo base_url();?>assets/all/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script>
    $(function()
    {
      $('#form-login').validate()
    })
    </script>
  </body>
</html>