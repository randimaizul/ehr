<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<?php if($page=="dashboard") { ?>
				<li class="active"><i class="icon-home2 position-left"></i> Home </li>
				<?php } else { ?>
				<li><a href="<?php echo base_url('pegawai')?>"><i class="icon-home2 position-left"></i> Home</a></li>
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
				<h5 class="panel-title">Data Pasien <?php echo $this->session->userdata('logged_in')['nama_rs']. ' (' .count((array)$pasien).' pasien)';?> </h5>
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
						<th>Nama Pasien</th>
						<th>Poli</th>
						<th>Dokter</th>
						<th class="text-center">Nomor Antrian</th>
						<th class="text-center">Status</th>
						<th>Tanggal Daftar</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if($pasien != '0') { foreach($pasien  as $key => $p) {?>
					<tr>
						<td><a href="<?php echo base_url('pegawai/pasien/show_history/'.$p['id_pasien'])?>">
								<span class="text-bold"><?php echo $p['nama_pasien']?></span><br>
								<small class="text-muted text-italic"><?php echo $p['alamat_pasien']?></small>
							</a>
						</td>
						<td><?php echo $p['nama_poli']?></td>
						<td><?php echo $p['nama_dokter']?></td>
						<td class="text-center"><span class="badge badge-primary"><?php echo $p['nomor_pendaftaran']?></span></td>
						<td class="text-center"><span class="badge badge-<?php if($p['status_daftar']=='0'){echo 'default';}else if($p['status_daftar']=='1'){echo 'success';}else if($p['status_daftar']=='2'){echo 'danger';}else if($p['status_daftar']=='3'){echo 'warning';}?>">
							<?php 
								if($p['status_daftar']=='0'){echo 'Booking';}
								else if($p['status_daftar']=='1'){echo 'Approve';}
								else if($p['status_daftar']=='2'){echo 'Closed';}
								else if($p['status_daftar']=='3'){echo 'Ignore';}
							?></span>
						</td>
						<td><?php echo $this->indoclass->tgl_indo($p['tanggal_pendaftaran'])?></td>
						<td class="text-center">
							<?php if($p['status_daftar']=='0'){ ?>
								<a href="<?php echo base_url('pegawai/pasien/approve/'.$p['id_pendaftaran'])?>" class="label bg-primary" style="margin-bottom: 5px;">Approve</a>
								<a href="<?php echo base_url('pegawai/pasien/ignore/'.$p['id_pendaftaran'])?>" class="label bg-danger">Ignore</a>
							<?php } else {?>
							<ul class="icons-list"> 
								<li class="text-danger-600">
									<a href="<?php echo base_url('pegawai/dokter/delete_dokter/'.$p['id_pendaftaran'])?>" > <i class="icon-trash"></i></a>
								</li> 
							</ul>
							<?php } ?>
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


