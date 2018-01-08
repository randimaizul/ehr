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
			<div class="col-md-8">
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
													if($pasien_booking != '0'){
														$booking = count((array)$pasien_booking);
													} else {$booking  = $pasien_booking;}
													if($pasien_approve != '0'){
														$approve = count((array)$pasien_approve);
													} else { $approve = $pasien_approve; }
													if($pasien_closed != '0'){
														$closed = count((array)$pasien_closed);
													} else { $closed = $pasien_closed; }
													echo $booking+$approve+$closed;
												?> <small class="display-block no-margin">total tickets</small>
											</h5>
										</div>
									</td>

									<td class="col-md-3">
										
									</td>

									<td class="text-right col-md-2">
										<button class="btn bg-teal-400" data-toggle="modal" data-target="#search_pasien">+ New Ticket</button>
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
									<th style="width: 300px">Nama Pasien</th>
									<th>Dokter</th>
									<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
								</tr>
							</thead>
							<tbody>
								<tr class="active border-double">
									<td colspan="3">Booking tickets</td>
									<td class="text-right">
										<span class="badge badge-default"><?php if($pasien_booking != '0'){echo count((array)$pasien_booking);}else{echo $pasien_booking;}?></span>
									</td>
								</tr>
								
								<?php if($pasien_booking != '0') { foreach($pasien_booking  as $key => $p) {?> 
									<tr>
										<td class="text-center">
											<h6 class="no-margin"><small class="display-block text-size-small no-margin"><?php echo substr($p['tanggal_pendaftaran'], 10) ?></small></h6>
										</td>

										<td>
											<div class="media-body">
												<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">[#<?php echo $p['nomor_pendaftaran']?>] <?php echo $p['nama_pasien']?></a>
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
											<a href="<?php echo base_url('pegawai/pasien/approve/'.$p['id_pendaftaran'])?>" class="label bg-primary">Approve</a>
										</td>
									</tr>
								<?php } } ?>
								
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
												<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">[#<?php echo $p['nomor_pendaftaran']?>] <?php echo $p['nama_pasien']?></a>
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
												<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">[#<?php echo $p['nomor_pendaftaran']?>] <?php echo $p['nama_pasien']?></a>
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
			<div class="col-md-4">
				<!-- Daily sales -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">Status Dokter Hari ini</h6>
						<!-- <div class="heading-elements">
							<span class="heading-text">Total Pasien: <span class="text-bold text-danger-600 position-right"><?php// echo $approve+$closed;?></span></span>
							
						</div> -->
					</div>

					<div class="panel-body" style="padding:0px;">
						<div id="sales-heatmap"></div>
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Dokter</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>

								<?php if($dokter != '0'){ foreach($dokter  as $key => $d) { ?>
									<tr>
										<td>
											<div class="media-body">
												<div class="media-heading">
													<span class="letter-icon-title"><?php echo $d['nama_dokter']?></span>
												</div>

												<div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> <?php echo $d['nama_poli']?></div>
											</div>
										</td>


										<td><span class="badge  <?php if($d['status'] == '1') {echo "bg-success-400";} else {echo "badge-danger";} ?> "><?php if($d['status'] == '1') {echo "Active";} else {echo "CLosed";} ?></span></td>
									</tr>
								<?php } } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /daily sales -->

			</div>
		</div>
				

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Electronic Health Records</a>
		</div>
		<!-- /footer -->
	</div>

</div>

<div id="search_pasien" class="modal fade" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h6 class="modal-title">Cari Pasien</h6>
			</div>

			<div class="modal-body">				
				<div class="panel panel-flat">
					<div class="panel-body">
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<form id="form_search_pasien">
										<div class="input-group">										
											<input type="text" id="nama_pasien" name="nama_pasien" class="form-control" placeholder="Nama Pasien">
											<span class="input-group-btn">
												<button type="submit" class="btn bg-teal" type="button">Cari Pasien</button>
											</span>
										</div>
									</form>
								</div>
							</div>
							<br>
							<div class="row" id="hasil_search">								
							</div>
							<div class="row" id="panel_poli" style="display: none">
								<form id="form_tambah_pasien" method="post" action="<?php echo base_url('pegawai/pasien/insert_pasien_dashboard')?>">
									<input id="id_pasien" type="hidden" name="id_pasien" value="0">
									<legend class="text-semibold">Informasi Pasien</legend>
									<div id="informasi_pasien" style="margin-bottom: 10px;">
									</div>
									<legend class="text-semibold">Informasi Poli dan Dokter</legend>
									<div class="col-md-12">
										<div class="form-group">
											<label>Poli</label>
											<select name="id_poli" id="id_poli" class="form-control" required onchange="list_dokter()">
												<option value="0" disabled selected>-- Pilih Poli --</option>
												<?php foreach($rsp as $key => $poli) { ?>
							                       <option value="<?php echo $poli['id_poli']?>"><?php echo $poli['nama_poli']?></option>
							                    <?php } ?>        
							                </select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Dokter</label>
											<div id="list_dokter">
												<select name="id_dokter" id="id_dokter" class="form-control" required>		
													<option value="0" disabled selected>-- Pilih poli terlebih dahulu --</option> 
								                </select>
							                </div>
										</div>
										<input type="hidden" id="id_rs_poli" name="id_rs_poli" value="0">
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<div class="text-right">
												<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</fieldset>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>