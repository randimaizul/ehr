<!-- Main content -->
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
		</div>
	</div>
	<!-- /page header -->

	<!-- Content area -->
	<div class="content">
		<div class="content-group-lg">
		<?php if($this->session->flashdata('benar')){?>
			<div class="alert alert-success alert-styled-left">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><?php echo $this->session->flashdata('benar');?>
			</div>
		<?php } else if($this->session->flashdata('salah')){?>
			<div class="alert alert-danger alert-styled-left">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><?php echo $this->session->flashdata('salah');?>
			</div>
		<?php }?>
		</div>
		<!-- Bordered panel body table -->
			<div class="panel-body">
				<div class="row">
					<form class="form-horizontal" action="<?=  base_url();?>super/saveUser" method="POST">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title" id="kategory"><?= $page;?></h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="reload"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
			            </div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
									<div class="form-group">
										<label class="col-lg-3 control-label">Name<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="name" placeholder="Enter User's Name" required="required">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Email<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="email" placeholder="email@labsatu.com" required="required">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Phone Number<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="phone" placeholder="08123456789" required="required">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Password<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<input type="Password" class="form-control" name="password" placeholder="Type Password" required="required">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Re-Type Password<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<input type="Password" class="form-control" name="password2" placeholder="Re-Type Password" required="required">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Level<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<select class="select" name="level" class="form-control" required="required">
												<option value="0">--Select User's Level--</option>
												<option value="logistics">Logistics</option>
												<option value="labid">Labid</option>
												<option value="purchasing">Purchasing</option>
											</select>
											</div>
									</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		<!-- /bordered panel body table -->
		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Superadmin Labsatu</a>
		</div>
		<!-- /footer -->
	</div>
</div>