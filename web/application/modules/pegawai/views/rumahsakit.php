<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<?php if($page=="dashboard") { ?>
				<li class="active"><i class="icon-home2 position-left"></i> Home</li>
				<?php } else { ?>
				<li><a href="<?php echo base_url()?>labid/admin"><i class="icon-home2 position-left"></i> Home</a></li>
				<li><a href="<?php echo base_url()?>labid/admin/product/service">Product</a></li>
				<li class="active"><?php echo ucfirst($page);?></li>
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
		<?php if($this->session->flashdata('true')) { ?>
		<div class="alert bg-success alert-styled-left">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
			<span class="text-semibold">Well done!</span> <?php echo $this->session->flashdata('true');?>.
	    </div>
	    <?php } else if($this->session->flashdata('false')) {?>
		<div class="alert bg-danger alert-styled-left">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
			<span class="text-semibold">Oh Snap!</span> <?php echo $this->session->flashdata('false');?>, try submitting again.
	    </div>
	    <?php } ?>


		<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Rumah sakit master</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>Nama Rumah Sakit</th>
									<th>Alamat</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($rs->result() as $r) {?>
								<tr>
									<td><?php echo $r->nama_rs?></td>
									<td><?php echo $r->alamat?></td>
									<td><span class="label label-success"><?php echo $r->akreditasi?></span></td>
									<td class="text-center">
										<ul class="icons-list"> 
											<li class="text-primary-600">
												<a href="javascript:void(0)" class="editRS" data-id="<?php echo $r->id_rs?>"> <i class="icon-pencil7"></i></a>
											</li> 
											<li class="text-danger-600">
												<a href="javascript:void(0)" class="deleteRS" data-id="<?php echo $r->id_rs?>"> <i class="icon-trash"></i></a>
											</li> 
										</ul>
									</td>
								</tr>
								<?php  } ?>
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
				

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Electronic Health Records</a>
		</div>
		<!-- /footer -->
	</div>

</div>

