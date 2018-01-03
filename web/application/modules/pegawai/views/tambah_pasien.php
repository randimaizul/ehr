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

		<form method="post" action="<?php echo base_url("pegawai/pasien/insert_pasien")?>">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Tambah Pasien<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
						<div class="col-md-6">
							<fieldset>
								<legend class="text-semibold"><i class="icon-reading position-left"></i> Personal details</legend>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nama Pasien</label>
											<input type="text" name="nama_pasien" class="form-control" placeholder="Sukirman Setya Negara">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nama Orangtua</label>
											<input type="text" name="nama_orangtua" class="form-control" placeholder="Nama Orangtua">
										</div>
									</div>									
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Golongan Darah</label>
											<select name="golongan_darah" id="golongan_darah" class="form-control" required>
												<option value="0" disabled selected>-- Pilih golongan darah --</option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="AB">AB</option>
												<option value="O">O</option>
							                </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Tangal Lahir</label>
											<input type="date" name="tanggal_lahir" class="form-control" placeholder="Your strong password">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Agama</label>
											<select name="agama" id="agama" class="form-control" required>
												<option value="0" disabled selected>-- Pilih Agama --</option>
												<option value="Islam">Islam</option>
												<option value="Protestan">Protestan</option>
												<option value="Khatolik">Khatolik</option>
												<option value="Hindu">Hindu</option>
												<option value="Budha">Budha</option>
												<option value="Konghucu">Konghucu</option>
							                </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Telepon</label>
											<input type="text" name="no_telepon" class="form-control" placeholder="021-568941">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nama Asuransi</label>
											<select name="id_asuransi" id="id_asuransi" class="form-control" required>
												<option value="0" disabled selected>-- Pilih Jenis Asuransi --</option>
												<?php foreach($asuransi as $key => $asu) { ?>
							                       <option value="<?php echo $asu['id_asuransi']?>"><?php echo $asu['jenis_asuransi']?></option>
							                    <?php } ?>  
							                    <option value="0">Tidak menggunakan asuransi</option>      
							                </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nomor Asuransi</label>
											<input type="text" name="no_asuransi" class="form-control" placeholder="4852121135550" required>
										</div>
									</div>
								</div>
										
								<div class="form-group">
									<label>Alamat</label>
									<textarea rows="5" cols="5" name="alamat" class="form-control" placeholder="Enter your message here"></textarea>
								</div>
							</fieldset>
						</div>

						<div class="col-md-6">
							<fieldset>
			                	<legend class="text-semibold"><i class="icon-key position-left"></i> Informasi Login</legend>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="username" required placeholder="pasien@gmail.com" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" placeholder="Your strong password" class="form-control">
										</div>
									</div>
								</div>
							</fieldset>

							<fieldset>
			                	<legend class="text-semibold"><i class="icon-office position-left"></i> Informasi Berobat</legend>
								<div class="row">
									<div class="col-md-6">
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

									<div class="col-md-6">
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
								</div>
							</fieldset>

						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			</div>
		</form>
				

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Electronic Health Records</a>
		</div>
		<!-- /footer -->
	</div>

</div>

<!-- Vertical form modal -->
<div id="add_poli" class="modal fade">
	<div class="modal-dialog modal-xs" id="body_add_poli">
		<div class="modal-content">
			<div class="modal-header  bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Tambah Poli</h5>
			</div>
			<hr>
			<form id="form_sample" method="POST" action="<?php echo base_url('pegawai/rs_poli/insert_rs_poli')?>">
				<input type="hidden" name="id_rs" value="<?php echo $this->session->userdata('logged_in')['id_rs']?>">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label>Poli</label>
								<select name="id_poli" id="id_poli" class="form-control" required>
									<option value="0" disabled selected>--Pilih Poli--</option>
									<?php foreach($poli as $key => $poli) { ?>
				                       <option value="<?php echo $poli['id_poli']?>"><?php echo $poli['nama_poli']?></option>
				                    <?php } ?>        
				                </select>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit"  class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /vertical form modal -->

