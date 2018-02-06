<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Caaya | Reinventing indonesian tea</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/app.css');?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway+Dots" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.2.3.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.form-3.45.0.js');?>"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113645176-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-113645176-1');
    </script>

    </head>
    <body <?php if($this->uri->segment(1) == 'about') { echo "id='about'"; }elseif($this->uri->segment(1) == '')  { echo "class='hidden-until-ready'";
    } ?>>
    <noscript>Your browser does not support JavaScript!</noscript>
	<?php echo $template['partials']['header']; ?>
	<?php echo $template['body']; ?>
	<?php echo $template['partials']['footer']; ?>
    <div class="overlay"></div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/functions.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/app.bundle.js?c69f3206c79099551640');?>"></script>

	</body>
	</html>
