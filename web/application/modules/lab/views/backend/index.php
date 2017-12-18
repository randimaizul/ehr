Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<?php if($page=="dashboard") { ?>
							<li class="active"><i class="icon-home2 position-left"></i> Home</li>
							<?php } else { ?>
							<li><a href="<?php echo base_url()?>logistics"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><?php echo $page;?></li>
							<?php } ?>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Table components -->
					
						<div class="col-md-6">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Customer Order Chart</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">
									<div class="chart-container text-center">
										<div class="display-inline-block" id="chartOrder"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Customer Quotation Chart</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">
									<div class="chart-container text-center">
										<div class="display-inline-block" id="chartQuo"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Top 5 Brand Order</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">
									<div class="chart-container text-center">
										<div class="display-inline-block" id="google-column"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Top 5 Brand Quotation</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">
									<div class="chart-container text-center">
										<div class="display-inline-block" id="topQuotation"></div>
									</div>
								</div>
							</div>
						</div>
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Logistic Labsatu</a>
					</div>
					<!-- /footer -->

				
				<!-- /content area -->

			</div>
			<!-- /main content