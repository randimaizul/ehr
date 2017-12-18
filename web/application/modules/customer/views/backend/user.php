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
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title"><?php echo $page;?></h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Email</th>
								<th>Status</th>
								<th>Level</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;?>
							<?php foreach($user as $value){?>
							<tr>
								<td><?php echo $value['name'];?></td>
								<td><?php echo $value['email'];?></td>
								<td><?php echo ucfirst($value['status']);?></td>
								<td><?php echo ucfirst($value['level']);?></td>
								<td>
									<div class="btn-group">
				                    	<button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
					                    	<i class="icon-cog7"></i> &nbsp;<span class="caret"></span>
				                    	</button>

				                    	<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#" data-target="#changeLevel<?= $no;?>" data-toggle="modal" ><i class="icon-info22"></i>Change Level</a></li>
											<li><a href="#" data-target="#changePassword<?= $no;?>" data-toggle="modal"><i class="icon-lock"></i>Change Password</a></li>
											<li><a href="#" id="deleteUser" idUser="<?= $value['id'];?>" data-url="<?php base_url();?>super/deleteUser/<?= $value['id'];?>"><i class="icon-trash"></i>Delete</a></li>
										</ul>
									</div>
									<div class="modal fade" id="changeLevel<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									        <h5 class="modal-title" id="exampleModalLabel">Change Level User</h5>
									      </div>
									      <div class="modal-body">
									      	<div class="table-responsive">
									      		<table class="table">
										      		<form class="form-horizontal" method="POST" action="<?php echo base_url();?>super/changeLevel">
										      			<input type="hidden" name="idUser" value="<?= $value['id'];?>">
										      			<tr>
										      			<td><label class="control-label">Level</label></td>
										      			<td><select class="form-control" name="level">
										      				<option value="0">--Select Level--</option>
										      				<option value="logistics" <?php if($value['level']=='logistics') echo "selected"?>>Logistics</option>
										      				<option value="labid" <?php if($value['level']=='labid') echo "selected"?>>Labid</option>
										      				<option value="purchasing" <?php if($value['level']=='purchasing') echo "selected"?>>Purchasing</option>
										      			</select></td>
										      			</tr>
										      			<tr>
										      				<td colspan="2">
										      					<div class="pull-right">
										      						<button type="submit" class="btn btn-primary">Save</button>
										      					</div>
										      				</td>
										      			</tr>
											      	</form>
										      	</table>
									      	</div>
									      </div>
									    </div>
									  </div>
									</div>
									<div class="modal fade" id="changePassword<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									        <h5 class="modal-title" id="exampleModalLabel">Change Password User</h5>
									      </div>
									      <div class="modal-body">
									      	<div class="table-responsive">
									      		<table class="table">
										      		<form class="form-horizontal" method="POST" action="<?php echo base_url();?>super/changePassword">
										      			<input type="hidden" name="idUser" value="<?= $value['id'];?>">
										      			<tr>
											      			<td><label class="control-label">New Password</label></td>
											      			<td><input type="password" name="newPassword" class="form-control" placeholder="Type New Password" required></td>
										      			</tr>
										      			<tr>
											      			<td><label class="control-label">Re-Type New Password</label></td>
											      			<td><input type="password" name="newPassword2" class="form-control" placeholder="Re-Type New Password" required></td>
										      			</tr>
										      			<tr>
										      				<td colspan="2">
										      					<div class="pull-right">
										      						<button type="submit" class="btn btn-primary">Save</button>
										      					</div>
										      				</td>
										      			</tr>
											      	</form>
										      	</table>
									      	</div>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr>
							<?php $no++;} ?>
						</tbody>
					</table>
					<br>
				</div>
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