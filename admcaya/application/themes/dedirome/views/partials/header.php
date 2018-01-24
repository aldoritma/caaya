        <!-- START MOBILE CONTROLS -->
        <!-- LEFT SIDE -->
        <div class="pull-left full-height visible-sm visible-xs">
          <!-- START ACTION BAR -->
          <div class="sm-action-bar">
          <a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
          <span class="icon-set menu-hambuger"></span>
          </a>
          </div>
          <!-- END ACTION BAR -->
        </div>
        <!-- RIGHT SIDE -->
        <div class="pull-right full-height visible-sm visible-xs">
          <!-- START ACTION BAR -->
          <div class="sm-action-bar">
            <a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
              <span class="icon-set menu-hambuger-plus"></span>
            </a>
          </div>
          <!-- END ACTION BAR -->
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table">
          <div class="header-inner">
            <div class="brand inline">
              <img src="<?php echo base_url('assets/all/img/logo.png');?>" alt="logo" width="100" height="50">
            </div>
            
        </div>
        </div>
        <div class=" pull-right">
         
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold"><?php echo $admin['nama_lengkap']; ?></span>
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="<?php echo base_url('assets/all/img/profiles/avatar.jpg');?>" alt="" data-src="<?php echo base_url();?>assets/all/img/profiles/avatar.jpg" data-src-retina="<?php echo base_url('assets/all/img/profiles/avatar_small2x.jpg');?>" width="32" height="32">
            </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <li><a href="<?php echo base_url('user/account-setting');?>"><i class="pg-settings_small"></i> Settings</a>
                </li>
             
                <li class="bg-master-lighter">
                  <a href="<?php echo base_url('dashboard/signout');?>" class="clearfix">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- END User Info-->
        </div>
  


