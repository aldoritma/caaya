<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>.::Admin Dashboard ::.</title>
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
    <link href="<?php echo base_url();?>assets/all/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?php echo base_url();?>assets/all/plugins/jquery-datatable/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/all/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/all/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/pages/css/mystyle.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?php echo base_url();?>assets/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.slugify.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/all/plugins/codemirror/lib/codemirror.css'); ?>" />
    <script src="<?php echo base_url('assets/all/plugins/codemirror/lib/codemirror.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/addon/edit/closetag.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/addon/fold/xml-fold.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/mode/xml/xml.js'); ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/all/plugins/codemirror/theme/material.css'); ?>" />
    <script src="<?php echo base_url('assets/all/plugins/codemirror/mode/javascript/javascript.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/mode/css/css.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/mode/htmlmixed/htmlmixed.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/addon/selection/active-line.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/addon/display/placeholder.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/all/plugins/codemirror/addon/scroll/simplescrollbars.js'); ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/all/plugins/codemirror/addon/scroll/simplescrollbars.css'); ?>" />

    
    <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script> -->

    <!--[if lte IE 9]>
        <link href="<?php echo base_url();?>assets/pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <style type="text/css">
      .CodeMirror {border-top: 1px solid #888; border-bottom: 1px solid #888;}
    </style>
    <script type="text/javascript">
        $(document).ready(function() {

            var catfilter = $(".table-toolbar").html();
            $.fn.dataTableExt.oPagination.iFullNumbersShowPages = 10;
            $.extend( true, $.fn.dataTable.defaults, {
                "processing": true,
                "deferRender": true,
                "dom": "<'row'<'col-md-3 pull-left'l><'col-md-2 col-md-offset-4 baru'><'col-md-3'f>><'row'<'table-responsive't>><'row'<p i>>",
                "sPaginationType": "bootstrap",
                "destroy": true,
                "scrollCollapse": true,
                "stateSave": true,
                "language": {
                    "lengthMenu": "Showing per page : _MENU_ data",
                    "info": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                },
                "length": 10,
                "initComplete": function(){
                    $(".dataTables_filter").find(":input").addClass('form-control');
                    $(".dataTables_length").find("select").addClass('form-control');
                    $(".baru").html(catfilter);
                }
            } );

        });
    </script>
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
    <script type="text/javascript"> var base_url = '<?php echo base_url(); ?>'; </script>
	<!--<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script> -->
	<script src="<?php echo base_url();?>assets/js/jquery.form-3.45.0.js"></script>
    
    <style>
        .datepicker-switch
        {
            text-align: center
        }
    </style>
  </head>
 <body class="fixed-header   ">
<!-- START PAGE-CONTAINER -->

<?php echo $template['partials']['navigation'];?>
<div class="page-container">
<!-- START HEADER -->
<div class="header ">
<?php echo $template['partials']['header'];?>
</div>
<!-- END HEADER -->

<div class="page-content-wrapper">
<?php echo $template['body']; ?>  
<div class="container-fluid container-fixed-lg footer">
<?php echo $template['partials']['footer']; ?>
</div>
</div>

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

    <script src="<?php echo base_url();?>assets/all/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/jquery-autonumeric/autoNumeric.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/all/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>assets/all/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

    <!-- END VENDOR JS -->

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?php echo base_url();?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?php echo base_url();?>assets/all/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    <script src="<?php echo base_url();?>assets/all/js/form_layouts.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/js/form_elements.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/all/js/datatables.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/tinymce.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/autolink/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/autoresize/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/autosave/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/code/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/codesample/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/contextmenu/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/help/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/hr/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/lists/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/image/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/imagetools/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/legacyoutput/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/link/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/paste/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/preview/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/searchreplace/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/media/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/save/plugin.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/all/plugins/tinymce/js/tinymce/plugins/table/plugin.min.js');?>"></script>
    
    <div class="modal fade" id="modal-insertyoutube">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Insert Youtube Video</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="youtube_url">YouTube URL</label>
                        <input type="text" name="youtube_url" value="" placeholder="" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="youtube_url">Height</label>
                                <input type="text" name="videoHeight" placeholder="360" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="youtube_url">Width</label>
                                <input type="text" name="videoWidth" placeholder="100%" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="insert_video">Insert</button>
                </div>
            </div>
        </div>
    </div>


    <style>
        .table-responsive
        {
            min-height: 250px;
        }
    </style>
    <script>
        var editor;

        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea.summernote',
                mode: 'textareas',
                branding: true,
                relative_urls: false,
                remove_script_hosts: false,
                document_base_url: '<?php echo site_url('../'); ?>',
                custom_undo_redo_levels: 10,
                plugins: 'autolink autoresize autosave code codesample contextmenu hr help image imagetools link lists paste preview searchreplace media table',
                autoresize_bottom_margin: 50,
                autoresize_max_height: 500,
                autoresize_min_height: 350,
                autosave_retention: "20m",
                toolbar: 'newdocument | formatselect fontselect fontsizeselect removeformat | bold italic underline strikethrough | subscript superscript | alignleft aligncenter alignright alignjustify | outdent indent visualaid | blockquote | hr | bullist numlist | table tablecellprops tablemergedcellslink unlink | image media | preview code help |',
                
                menu: {
                    file: {title: 'File', items: 'newdocument'},
                    edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
                    insert: {title: 'Insert', items: 'link image | template hr'},
                    view: {title: 'View', items: 'visualaid'},
                    format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
                    table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
                    tools: {title: 'Tools', items: 'spellchecker code'}
                },
                entity_encoding : "named",
                contextmenu: "cut copy paste pastetext | link image inserttable | cell row column deletetable",
                image_caption: true,
                image_description: false,
                imagetools_cors_hosts: ['localhost','13.229.78.30','asiangames2018.id'],
                images_upload_url: "<?=site_url('editor_image_handler/upload_news_image_content'); ?>",
                video_template_callback: function(data) {
                   return '<video width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls="controls">\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
                 },
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });
            
        });
    </script>
    
  </body>
</html>