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
									<span class="media-heading text-semibold"><?php echo $this->session->userdata('logged_in')['nama_pegawai'];?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-envelop4 text-size-small"></i> &nbsp;<?php echo $this->session->userdata('logged_in')['username'];?>
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
								<li><a href="<?= base_url('logistics');?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li <?php if($this->uri->segment(2)=="product"){echo "class='active'";}?>>
									<a href="#"><i class="icon-basket"></i> <span>Pasien</span></a>
									<ul>
										<li <?php if($this->uri->segment(2)=="product" AND $this->uri->segment(3)=="inputProduct"){echo "class='active'";}?>>
										<a href="<?php echo base_url();?>logistics/product/inputProduct">Booking</a></li> 
										<li <?php if($this->uri->segment(2)=="product" AND $this->uri->segment(4)=="all"){echo "class='active'";}?>> 
										<a href="<?php echo base_url();?>logistics/product/product/all">All Pasien</a></li>
										
									</ul>
								</li>
								<li><a href="changelog.html"><i class="icon-list-unordered"></i> <span>Log History </span></a></li>								
								<!-- /main -->
								<li class="navigation-header"><span>Master</span> <i class="icon-menu" title="Master"></i></li>
								<li <?php if($this->uri->segment(2)=='rumahsakit'){echo 'class="active"';}?>><a href="<?= base_url('pegawai/rumahsakit');?>"><i class="icon-home4"></i> <span>Rumah sakit</span></a></li>
								<li <?php if($this->uri->segment(2)=='poli'){echo 'class="active"';}?>><a href="<?= base_url('pegawai/poli');?>"><i class="icon-home4"></i> <span>Poli</span></a></li>
								<li <?php if($this->uri->segment(2)=='dokter'){echo 'class="active"';}?>><a href="<?= base_url('pegawai/dokter');?>"><i class="icon-home4"></i> <span>Dokter</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->