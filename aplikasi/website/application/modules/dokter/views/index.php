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


		<div class="row">
			
			<div class="col-md-12">
				<!-- Support tickets -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">Data Pendaftaran Hari ini</h6>
					</div>

					<div class="table-responsive">
						<table class="table table-xlg text-nowrap">
							<tbody>
								<tr>
									<td class="col-md-4">
										<div class="media-left media-middle">
											<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-alarm-add"></i></a>
										</div>

										<div class="media-left">
											<h5 class="text-semibold no-margin">
												<?php
													if($pasien_approve != '0'){
														$approve = count((array)$pasien_approve);
													} else { $approve = $pasien_approve; }
													if($pasien_closed != '0'){
														$closed = count((array)$pasien_closed);
													} else { $closed = $pasien_closed; }
													echo $approve+$closed;
												?> <small class="display-block no-margin">total tickets</small>
											</h5>
										</div>
									</td>

									<td class="col-md-3">
										
									</td>
								</tr>
							</tbody>
						</table>	
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 50px">Waktu</th>
									<th style="width: 500px">Nama Pasien</th>
									<th>Dokter</th>
									<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
								</tr>
							</thead>
							<tbody>																
								<tr class="active border-double">
									<td colspan="3">Approve tickets</td>
									<td class="text-right">
										<span class="badge bg-success"><?php if($pasien_approve != '0'){echo count((array)$pasien_approve);}else{echo $pasien_approve;}?></span>
									</td>
								</tr>

								<?php if($pasien_approve != '0') { foreach($pasien_approve  as $key => $p) {?> 
									<tr>
										<td class="text-center">
											<h6 class="no-margin"><small class="display-block text-size-small no-margin"><?php echo substr($p['tanggal_pendaftaran'], 10) ?></small></h6>
										</td>
										<td>
											<div class="media-body">
												<a href="<?php echo base_url('dokter/pasien/show_history/'.$p['id_pasien'])?>" class="display-inline-block text-semibold letter-icon-title">[#<?php echo $p['nomor_pendaftaran']?>] <?php echo $p['nama_pasien']?></a>
												<span class="text-muted text-size-small"><small class="display-block text-size-small no-margin"><?php echo $p['alamat_pasien']?></small></span>
											</div>
										</td>

										<td>
											<a href="#" class="text-default display-inline-block">
												<span class="text-semibold"><?php echo $p['nama_dokter']?></span>
												<span class="display-block text-muted"><?php echo $p['nama_poli']?></span>
											</a>
										</td>
										<td class="text-center">
											<!-- <a href="<?php echo base_url('pegawai/pasien/approve/')?>" class="label bg-primary">Approve</a> -->
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="<?php echo base_url('dokter/pasien/tambah_rekam/'.$p['id_pendaftaran'].'/'.$p['id_pasien'])?>"><i class="icon-diff-added"></i> Proses</a></li>
														<li><a href="#"><i class="icon-history"></i> Lihat Riwayat</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>
								<?php } } ?>

								<tr class="active border-double">
									<td colspan="3">Closed tickets </td>
									<td class="text-right">
										<span class="badge bg-danger"><?php if($pasien_closed != '0'){echo count((array)$pasien_closed);}else{echo $pasien_closed;}?></span>
									</td>
								</tr>

								<?php if($pasien_closed != '0') { foreach($pasien_closed  as $key => $p) {?> 
									<tr>
										<td class="text-center">
											<h6 class="no-margin"><small class="display-block text-size-small no-margin"><?php echo substr($p['tanggal_pendaftaran'], 10) ?></small></h6>
										</td>
										<td>
											<div class="media-body">
												<a href="<?php echo base_url('dokter/pasien/show_history/'.$p['id_pasien'])?>" class="display-inline-block text-semibold letter-icon-title">[#<?php echo $p['nomor_pendaftaran']?>] <?php echo $p['nama_pasien']?></a>
												<span class="text-muted text-size-small"><small class="display-block text-size-small no-margin"><?php echo $p['alamat_pasien']?></small></span>
											</div>
										</td>

										<td>
											<a href="#" class="text-default display-inline-block">
												<span class="text-semibold"><?php echo $p['nama_dokter']?></span>
												<span class="display-block text-muted"><?php echo $p['nama_poli']?></span>
											</a>
										</td>
										<td class="text-center">
											<!-- <a href="<?php echo base_url('pegawai/pasien/approve/')?>" class="label bg-primary">Approve</a> -->
											<!-- <ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
														<li><a href="#"><i class="icon-history"></i> Full history</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
														<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
													</ul>
												</li>
											</ul> -->
										</td>
									</tr>
								<?php } } ?>


							</tbody>
						</table>
					</div>
				</div>
				<!-- /support tickets -->
			</div>
		</div>
				

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Electronic Health Records</a>
		</div>
		<!-- /footer -->
	</div>

</div>
