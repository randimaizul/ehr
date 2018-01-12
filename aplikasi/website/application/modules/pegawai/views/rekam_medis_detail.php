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
				<li><a href="<?php echo base_url()?>labid/admin/product/service">Pasien</a></li>
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
						<div class="col-lg-8">
							<div class="tabbable">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="activity">

										<!-- Timeline -->
										<div class="timeline timeline-left content-group">
											<div class="timeline-container">

												<?php if($pasien_history != '0') { foreach($pasien_history AS $key => $h) { ?>
												<!-- Blog post -->
												<div class="timeline-row">
													<div class="timeline-icon">
														<img src="<?php echo base_url()?>data/assets-limitless/images/placeholder.jpg" alt="">
													</div>

													<div class="panel panel-flat timeline-content">
														<div class="panel-heading">
															<h6 class="panel-title"><b><?php echo $h['nama_dokter']?></b></h6>
															<small class="text-muted text-italic"><?php echo $h['nama_poli']?><br> Nomor antrian : [#<?php echo $h['nomor_pendaftaran']?>]</small>

															<div class="heading-elements">
																<span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> <?php echo $this->indoclass->tgl_indo($h['tanggal_pendaftaran'])?></span>
										                	</div>
														</div>

														<div class="panel-body">	
															<h6 class="content-group">
																Kodisi pasien:
															</h6>
															<blockquote>
																<b>Keluhan utama :</b>
																<p><?php echo $h['keluhan_utama']?></p>
															</blockquote>
															<blockquote>
																<b>Riwayat alergi :</b>
																<p><?php echo $h['riwayat_alergi']?></p>
															</blockquote>
															<blockquote>
																<b>Tanda vital :</b>
																<p><?php echo $h['tanda_vital']?></p>
															</blockquote>
														</div>


														<div class="panel-body">
															<h6 class="content-group">
																Penanganan:
															</h6>
															<blockquote>
																<?php $i=1; if($penanganan != '0') { foreach($penanganan as $key => $p ) { ?>
												                	<span href="#" class="text-default display-inline-block">
																		[#<?php echo $i++;?>] <?php echo $p['jenis_penanganan']?>
																		<span class="display-block text-muted">Keterangan : <?php echo $p['keterangan']?></span>
																	</span>
																	<br><br>
												                <?php } } ?>
															</blockquote>
														</div>

														<div class="panel-body">
															<h6 class="content-group">
																Obat:
															</h6>
															<blockquote>
																<?php $x=1; if($daftar_obat!= '0') { foreach($daftar_obat as $key => $do ) { ?>									
												                	<span href="#" class="text-default display-inline-block">
																		[#<?php echo $x++;?>] <?php echo $do['nama_obat']?>
																		<span class="display-block text-muted">Jumlah : <?php echo $do['jumlah']?></span>
																	</span>								
																	<br><br>
												                <?php } } ?>
															</blockquote>
														</div>
													</div>
												</div>
												<!-- /blog post -->		
												<?php } } else { ?>
												<div class="timeline-row">
													<div class="timeline-icon">
														<img src="<?php echo base_url()?>data/assets-limitless/images/placeholder.jpg" alt="">
													</div>

													<div class="panel panel-flat timeline-content">
														<div class="panel-body">
															<blockquote>
																Belum ada riwayat
															</blockquote>
														</div>
													</div>
												</div>
												<?php } ?>
											</div>
									    </div>
									    <!-- /timeline -->
									</div>									
								</div>
							</div>
						</div>

						<div class="col-lg-4">

							<!-- Navigation -->
					    	<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Data Personal Pasien<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<table class="table table-borderless table-xs content-group-sm">
									<tbody>	
										<?php foreach ($pasien as $key => $p)?>
										<tr>
											<td style="width: 165px;"><i class="icon-user position-left"></i> Nama :</td>
											<td class="text-left"><?php echo $p['nama_pasien']?></td>
										</tr>
										<tr>
											<td><i class="icon-calendar52 position-left"></i> Tanggal lahir:</td>
											<td class="text-left"><?php echo $p['tanggal_lahir']?></td>
										</tr>
										<tr>
											<td><i class="icon-accessibility position-left"></i> Agama:</td>
											<td class="text-left"><?php echo $p['agama']?></td>
										</tr>
										<tr>
											<td><i class="icon-droplet position-left"></i> Golongan darah:</td>
											<td class="text-left"><?php echo $p['golongan_darah']?></td>
										</tr>
										<tr>
											<td><i class="icon-users2 position-left"></i> Nama Orangtua:</td>
											<td class="text-left"><?php echo $p['nama_orangtua']?></td>
										</tr>
										<tr>
											<td><i class="icon-certificate position-left"></i> Nama Asuransi:</td>
											<td class="text-left"><?php echo $p['jenis_asuransi']?></td>
										</tr>
										<tr>
											<td><i class="icon-barcode2 position-left"></i> No. Asuransi :</td>
											<td class="text-left"><?php echo $p['no_asuransi']?></td>
										</tr>
										<tr>
											<td><i class="icon-home8 position-left"></i> Alamat:</td>
											<td class="text-left"><?php echo $p['alamat']?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- /navigation -->

						</div>
					</div>
				

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Electronic Health Records</a>
		</div>
		<!-- /footer -->
	</div>

</div>
