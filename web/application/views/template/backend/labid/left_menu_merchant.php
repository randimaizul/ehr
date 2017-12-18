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
								<li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li <?php if($this->uri->segment(3)=="product"){echo "class='active'";}?>>
									<a href="#"><i class="icon-basket"></i> <span>Product</span></a>
									<ul>
										<li <?php if($this->uri->segment(3)=="product" AND $this->uri->segment(4)=="service"){echo "class='active'";}?>><a href="<?php echo base_url()?>labid/merchant/product/service">Service</a></li>
										<li <?php if($this->uri->segment(3)=="product" AND $this->uri->segment(4)=="package"){echo "class='active'";}?>><a href="<?php echo base_url()?>labid/product/package">Package</a></li>
									</ul>
								</li>
								<li <?php if($this->uri->segment(3)=="quotation"){echo "class='active'";}?> >
									<a href="#"><i class="icon-archive"></i> <span>Quotation</span></a>
									<ul>
										<li <?php if($this->uri->segment(3)=="quotation" AND $this->uri->segment(5)=="all"){echo "class='active'";}?>><a href="<?php echo base_url()?>labid/merchant/quotation/data/all">All</a></li>
										<li <?php if($this->uri->segment(3)=="quotation" AND $this->uri->segment(5)=="request"){echo "class='active'";}?>><a href="<?php echo base_url()?>labid/merchant/quotation/data/request">Request</a></li>
										<li <?php if($this->uri->segment(3)=="quotation" AND $this->uri->segment(5)=="order"){echo "class='active'";}?>><a href="<?php echo base_url()?>labid/merchant/quotation/data/order">Order</a></li>
										<li <?php if($this->uri->segment(3)=="quotation" AND $this->uri->segment(5)=="retest"){echo "class='active'";}?>><a href="<?php echo base_url()?>labid/merchant/quotation/data/retest">Retest Service</a></li>
									</ul>
								</li>
								
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->