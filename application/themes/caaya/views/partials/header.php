<header class="header">
			<div class="hamburger-menu">
				<div class="bar"></div>
			</div>
			<a href="<?php echo base_url();?>" class="logo">
				<img src="<?php echo base_url('assets/img/logo.png');?>" alt="">
			</a>
			<nav class="main-navigation aligner">
				<div class="">
					<ul class="list--none">
						<li>
							<a href="<?php echo base_url();?>" <?php if ($this->uri->segment(1) == "") echo "class='is-active'";?>>Home</a>
						</li>
						<li>
							<a href="<?php echo base_url('about');?>" <?php if ($this->uri->segment(1) == "about") echo "class='is-active'";?>>About</a>
						</li>
						<!-- <li>
							<a href="<?php echo base_url('activity');?>" <?php if ($this->uri->segment(1) == "activity") echo "class='is-active'";?>>Activity</a>
						</li> -->
						<li>
							<a href="<?php echo base_url('faq');?>" <?php if ($this->uri->segment(1) == "faq") echo "class='is-active'";?>>FAQ</a>
						</li>
						<li>
							<a href="<?php echo base_url('contact');?>" <?php if ($this->uri->segment(1) == "contact") echo "class='is-active'";?>>Contact Us</a>
						</li>
						<li class="nav-socmed">
							<a href="#">
								<img src="<?php echo base_url('assets/img/ic-nav-1.png');?>" alt="">
							</a>
							<a href="#">
								<img src="<?php echo base_url('assets/img/ic-nav-2.png');?>" alt="">
							</a>
							<a href="#">
								<img src="<?php echo base_url('assets/img/ic-nav-3.png');?>" alt="">
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
