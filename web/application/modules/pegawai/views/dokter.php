<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<?php if($page=="dashboard") { ?>
				<li class="active"><i class="icon-home2 position-left"></i> Home </li>
				<?php } else { ?>
				<li><a href="<?php echo base_url()?>labid/admin"><i class="icon-home2 position-left"></i> Home</a></li>
				<li><a href="<?php echo base_url()?>labid/admin/product/service">Master</a></li>
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


		<!-- Basic datatable -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Dokter Master <?php echo $this->session->userdata('logged_in')['nama_rs']?></h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>		                	
			</div>
			<div class="pull-right" style="margin-right: 20px; margin-bottom: 10px;"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_dokter">+ Tambah Dokter</button></div>
			<table class="table datatable-basic">
				<thead>
					<tr>
						<th>Nama Dokter</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Nama Poli</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if($d != '0') { foreach($d  as $key => $d) {?>
					<tr>
						<td><?php echo $d['nama_dokter']?></td>
						<td><?php echo $d['alamat']?></td>
						<td><?php echo $d['no_telp']?></td>
						<td><?php echo $d['nama_poli']?></td>
						<td class="text-center">
							<ul class="icons-list"> 
								<li class="text-primary-600">
									<a href="javascript:void(0)" class="editRS" data-id="<?php echo $d['id_dokter']?>"> <i class="icon-pencil7"></i></a>
								</li> 
								<li class="text-danger-600">
									<a href="<?php echo base_url('pegawai/dokter/delete_dokter/'.$d['id_dokter'].'/'.$d['id_user'])?>" > <i class="icon-trash"></i></a>
								</li> 
							</ul>
						</td>
					</tr>
					<?php  } } ?>
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



<div id="add_dokter" class="modal fade" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h6 class="modal-title">Tambah Dokter</h6>
			</div>

			<div class="modal-body">
				<form method="post" action="<?php echo base_url('pegawai/dokter/insert_dokter')?>">
					<div class="panel panel-flat">
						<div class="panel-body">
							<fieldset>
								<legend class="text-semibold">Informasi Login</legend>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="username" class="form-control" placeholder="dokter@gmail.com" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control" placeholder="Your strong password" required>
										</div>
									</div>
								</div>
							</fieldset>

							<fieldset>
								<legend class="text-semibold">Personal information</legend>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nama</label>
											<input type="text" name="nama_dokter" class="form-control" placeholder="Dokter Cantik Jelita" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Telepon</label>
											<input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" required>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Poli</label>
									<select name="id_poli" id="id_poli" class="form-control" required>
										<option value="0" disabled selected>-- Pilih Poli --</option>
										<?php foreach($rsp as $key => $poli) { ?>
					                       <option value="<?php echo $poli['id_rs_poli']?>"><?php echo $poli['nama_poli']?></option>
					                    <?php } ?>        
					                </select>
								</div>

								<div class="form-group">
									<label>Alamat</label>
                                    <textarea rows="3" cols="5" name="alamat" placeholder="Alamat dokter" class="form-control" required></textarea>
	                			</div>
							</fieldset>

							<div class="text-right">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>