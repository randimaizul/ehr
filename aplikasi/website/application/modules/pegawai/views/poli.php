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
				<h5 class="panel-title">Poli Master <?php echo $this->session->userdata('logged_in')['nama_rs'];?></h5>		
				<div class="heading-elements">					
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>
			<div class="pull-right" style="margin-right: 20px; margin-bottom: 10px;"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_poli">+ Tambah Poli</button></div>
			<table class="table datatable-basic">
				<thead>
					<tr>
						<th>Nama Poli</th>
						<th>Keterangan</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($rsp as $key => $p) {?>
					<tr>
						<td><?php echo $p['nama_poli']?></td>
						<td><?php echo $p['keterangan']?></td>
						<td class="text-center">
							<ul class="icons-list"> 
								<li class="text-danger-600">
									<a href="<?php echo base_url('pegawai/rs_poli/delete_rs_poli/'.$p['id_rs_poli']);?>" class="deleteRS" data-id="<?php echo $p['id_rs_poli']?>"> <i class="icon-trash"></i></a>
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

