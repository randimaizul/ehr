<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-default">

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<?php if($page=="dashboard") { ?>
				<li class="active"><i class="icon-home2 position-left"></i> Home</li>
				<?php } else { ?>
				<li><a href="<?php echo base_url()?>logistics/product/product/all"><i class="icon-home2 position-left"></i> Home</a></li>
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
								<th width="25">No</th>
								<th>Product</th>
								<th>Catalog</th>
								<th>Image</th>
								<th>Price</th>
								<th width="30">Stock</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($product->result() as $p) { ?>
							<tr>
								<td><?= $no;?></td>
								<td><?php echo $p->product;?></td>
								<td><?php echo $p->code;?></td>
								<td>
								<?php if($p->image61a == NULL){?>
									<img width="100" height="100" src="<?php echo base_url();?>uploads/no_foto_produk/NO-IMAGE.jpg">
								<?php } else {?>
									<img width="100" height="100" src="<?php echo base_url();?>uploads/foto_produk/<?php echo $p->image61a;?>">
								<?php }?>
								</td>
								<td>
									<?php 
										if($p->currency == 'USD'){ $harga = $p->price*$kurs_USD;}
										else if($p->currency == 'SGD'){$harga = $p->price*$kurs_SGD;}
										else if($p->currency == 'EUR'){$harga = $p->price*$kurs_EUR;}
										else {$harga = $p->price;}
									?>
									<strong><?php echo $this->indoclass->rp($harga);?></strong>
								</td>
								<td><?= $p->stock; ?></td>
								<td>
									<div class="btn-group">
				                    	<button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
					                    	<i class="icon-cog7"></i> &nbsp;<span class="caret"></span>
				                    	</button>

				                    	<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#" data-target="#modalAddress<?php echo $no;?>" data-toggle="modal" ><i class="icon-notebook"></i>Product Description</a></li>
											<li><a href="#" data-target="#modalStock<?php echo $no;?>" data-toggle="modal"><i class="icon-basket"></i>Edit Stock</a></li>
										</ul>
									</div>
									<div class="modal fade" id="modalAddress<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									        <h5 class="modal-title" id="exampleModalLabel">Product Description</h5>
									      </div>
									      <div class="modal-body">
									      	<div class="table-responsive">
										      	<table class="table">
										      		<tr>
										      			<td><b>Description</b></td>
										      			<td><?= $p->description;?></td>
										      		</tr>
										      	</table>
									      	</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									      </div>
									    </div>
									  </div>
									</div>
									<div class="modal fade" id="modalStock<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									        <h5 class="modal-title" id="exampleModalLabel">Update Stock</h5>
									      </div>
									      <div class="modal-body">
									      	<div class="table-responsive">
										      	<table class="table">
										      		<form class="form-horizontal" method="POST" action="<?php echo base_url();?>logistics/product/updateStock/<?php echo $this->uri->segment(4);?>">
										      			<div class="form-group">
										      				<input type="hidden" name="idProduct" value="<?= $p->id;?>">
											      			<tr>
											      				<td><label class="control-label">Stock</label></td>
											      				<td><input type="text" name="stock" placeholder="Update Stock" class="form-control" value="<?= $p->stock;?>"></td>
											      			</tr>
										      			</div>
										      			<tr>
										      				<td colspan="2">
										      					<div class="pull-right">
										      						<button type="submit" class="btn btn-primary">Update</button>
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
					<div class="box-footer clearfix">
						<?php echo $paginator; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /bordered panel body table -->

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Logistics Labsatu</a>
		</div>
		<!-- /footer -->
	</div>

</div>
