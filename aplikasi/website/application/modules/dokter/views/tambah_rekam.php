<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<?php if($page=="dashboard") { ?>
				<li class="active"><i class="icon-home2 position-left"></i> Home</li>
				<?php } else { ?>
				<li><a href="<?php echo base_url()?>labid/admin"><i class="icon-home2 position-left"></i> Pasien</a></li>
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
			<span class="text-semibold">Berhasil!</span> <?php echo $this->session->flashdata('true');?>.
	    </div>
	    <?php } else if($this->session->flashdata('false')) {?>
		<div class="alert bg-danger alert-styled-left">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
			<span class="text-semibold">Gagal!</span> <?php echo $this->session->flashdata('false');?> </div>
	    <?php } ?>

	   
	    	<div class="col-md-12" style="margin-bottom: 10px;">
	    		<div class="pull-right">
	    			<a href="<?php echo base_url('dokter/pasien/closed/'.$this->uri->segment(4));?>" class="btn bg-teal-400">Pemeriksaan Selesai</a>
	    		</div>
	    	</div>
	    
		<div class="col-md-6">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Rekam Medis<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<fieldset>
				                <legend class="text-semibold"><i class="icon-user position-left"></i> Informasi Personal</legend>
				                <div class="media-body">
				                	<?php foreach($pasien as $key => $p) { ?>
						            <span class="display-inline-block text-default text-bold letter-icon-title"><?php echo $p['nama_pasien']?></span>
						            <span class="text-muted text-size-small"><small class="display-block text-size-small no-margin">Alamat : <?php echo $p['alamat']?> <br> Asuransi : <?php echo $p['jenis_asuransi']?> <br> No. Asuransi : <?php echo $p['no_asuransi']?></small></span>
						            <?php  } ?>
						        </div>
				            </fieldset>
				            <br><br>
				            <?php foreach($rekam as $key => $r){
				            	$id_rekam_medis = $r['id_rekam_medis'];
				            	$keluhan_utama = $r['keluhan_utama'];
				            	$riwayat_alergi = $r['riwayat_alergi'];
				            	$tanda_vital = $r['tanda_vital'];
				            }?>
							<form method="post" action="<?php echo base_url("dokter/pasien/update_rekam")?>">
								<input type="hidden" name="id_rekam_medis" value="<?php echo $id_rekam_medis?>">
								<fieldset>
									<legend class="text-semibold"><i class="icon-reading position-left"></i> Kondisi Pasien</legend>
									<div class="form-group">
										<label>Keluhan Utama</label>
										<textarea rows="3" cols="5" name="keluhan_utama" class="form-control" placeholder="Enter your message here"><?php echo $keluhan_utama?></textarea>
									</div>

									<div class="form-group">
										<label>Riwayat Alergi</label>
										<textarea rows="3" cols="5" name="riwayat_alergi" class="form-control" placeholder="Enter your message here"><?php echo $riwayat_alergi?></textarea>
									</div>
									
									<div class="form-group">
										<label>Tanda Vital</label>
										<textarea rows="3" cols="5" name="tanda_vital" class="form-control" placeholder="Enter your message here"><?php echo $tanda_vital?></textarea>
									</div>
								</fieldset>
								<div class="text-right">
									<button type="submit" class="btn btn-primary">Simpan kondisi pasien <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-flat">
				<div class="panel-heading">
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
							<form method="post" action="<?php echo base_url("dokter/pasien/insert_penanganan")?>">
								<input type="hidden" name="id_rekam_medis" value="<?php echo $id_rekam_medis?>">
								<fieldset>
				                	<legend class="text-semibold"><i class="icon-make-group position-left"></i> Penanganan</legend>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Jenis Penanganan</label>
												<input type="text" rows="3" cols="5" name="jenis_penanganan" class="form-control" placeholder="Enter your message here"></textarea>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Keterangan</label>
												<textarea rows="3" cols="5" name="keterangan" class="form-control" placeholder="Enter your message here"></textarea>
											</div>
										</div>
									</div>
								</fieldset>
								<div class="text-right">
									<button type="submit" class="btn btn-primary">Tambahkan penanganan <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>

							<fieldset>
				                <legend class="text-semibold"><i class="icon-list3 position-left"></i>List Penanganan</legend>
				                <?php $i=1; if($penanganan != '0') { foreach($penanganan as $key => $p ) { ?>
				                	<span href="#" class="text-default display-inline-block">
										[#<?php echo $i++;?>] <?php echo $p['jenis_penanganan']?>
										<span class="display-block text-muted">Keterangan : <?php echo $p['keterangan']?></span>
									</span>
									<br><br>
				                <?php } } ?>
				            </fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="panel panel-flat">
				<div class="panel-heading">
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
							<form method="post" action="<?php echo base_url("dokter/pasien/insert_daftar_obat")?>">
								<input type="hidden" name="id_rekam_medis" value="<?php echo $id_rekam_medis?>">
								<fieldset>
									<legend class="text-semibold"><i class="icon-aid-kit position-left"></i> Data Obat Pasien</legend>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label animate">Obat</label>
											<select class="form-control" name="id_obat">
												<option value="" selected="selected" disabled>-- Pilih Obat --</option>
												<?php foreach($obat as $key => $o) { ?>
												<option value="<?php echo $o['id_obat']?>"><?php echo $o['nama_obat']?></option>
												<?php } ?>												
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Jumlah</label>
											<input type="text" name="jumlah" class="form-control" placeholder="2 botol" required>
										</div>
									</div>
								</fieldset>
								<div class="text-right">
									<button type="submit" class="btn btn-primary">Tambahkan<i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
							<fieldset>
								<legend class="text-semibold"><i class="icon-list3 position-left"></i> List Obat Pasien</legend>
								<?php $x=1; if($daftar_obat!= '0') { foreach($daftar_obat as $key => $do ) { ?>									
				                	<span href="#" class="text-default display-inline-block">
										[#<?php echo $x++;?>] <?php echo $do['nama_obat']?>
										<span class="display-block text-muted">Jumlah : <?php echo $do['jumlah']?></span>
									</span>								
									<br><br>
				                <?php } } ?>
							</fieldset>
						</div>
					</div>
				</div>
			</div>	
		</div>

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Electronic Health Records</a>
		</div>
		<!-- /footer -->
	</div>

</div>


