<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url()?>data/assets-limitless/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $name;?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-envelop4 text-size-small"></i> &nbsp;<?php echo $email;?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="<?= base_url('super');?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li <?php if($this->uri->segment(2)=="user" OR $this->uri->segment(2)=="addUser"){echo "class='active'";}?>>
									<a href="#"><i class="icon-user"></i> <span>User</span></a>
									<ul>
										<li <?php if($this->uri->segment(2)=="user"){echo "class='active'";}?>> 
										<a href="<?php echo base_url();?>super/user/">All User</a></li>
										<li <?php if($this->uri->segment(2)=="addUser"){echo "class='active'";}?>>
										<a href="<?php echo base_url();?>super/addUser/">Add User</a></li>
									</ul>
								</li>
								<li><a href="#"><i class="icon-list-unordered"></i> <span>Log History </span></a></li>
								
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->