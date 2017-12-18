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
								<th style="text-align: center;">No. Order</th>
								<th style="text-align: center;">Customer</th>
								<th style="text-align: center;">Total PO</th>
								<th style="text-align: center;">Product List</th>
								<th style="text-align: center;">Detail</th>
							</tr>
						</thead>
						<tbody>
						<?php $no=1; foreach($complain->result_array() as $value){?>
							<tr>
								<td style="text-align: center;"><?php echo $value['id_order'];?></td>
								<td><?php echo $value['name'];?></td>
								<td style="text-align: right;"><?php echo number_format($value['total'],2,",",".");?></td>
								<td style="text-align: center;">
									<button class="btn btn-default btn-sm btn-primary" data-toggle="modal" data-target="#modalBarang<?php echo $no;?>">Order Product</button>
								</td>
								<td style="text-align: center;">
									<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallModal<?php echo $no;?>">Return Detail</a>
									<div class="modal fade" id="smallModal<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									        <h5 class="modal-title" id="exampleModalLabel">Address Shipping</h5>
									      </div>
									      <div class="modal-body">
									      	<div class="table-responsive">
										      	<table class="table">
										      		<tr>
										      			<td><b>No Order</b></td>
										      			<td style="text-align: left;"><?php echo $value['id_order'];?></td>
										      		</tr>
										      		<tr>
										      			<td><b>Keterangan</b></td>
										      			<td style="text-align: left;"><?php echo $value['keterangan'];?></td>
										      		</tr>
										      		<tr>
										      			<td><b>Gambar</b></td>
										      			<td>
										      				<?php if($value['gambar']!=NULL) { ?>
										      				<img class="img-responsive" width="200" height="100" src="<?=base_url();?>uploads/komplain/<?=$value['gambar']?>">
										      				<?php } else { ?>
										      				<img class="img-responsive" width="200" height="100" src="<?=base_url();?>uploads/no_foto_produk/NO-IMAGE.jpg">
										      				<?php }?>
										      			</td>
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
									<div id="modalBarang<?php echo $no;?>" class="modal fade" tabindex="-1" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title">Product List</h4>
												</div>
												<div class="modal-body">
													<table class="table table-striped table-bordered">
														<thead>
															<tr>
																<td style="text-align: center;" width="10px"><b>No</b></td>
																<td style="text-align: center;" width="430px"><b>Product</b></td>
																<td style="text-align: center;" width="170px"><b>Catalog</b></td>
																<td style="text-align: center;" width="50px"><b>Qty</b></td>
																<td style="text-align: center;" width="100px"><b>Price</b></td>
															</tr>
														</thead>
														<?php $barang_complain = $this->db->query("SELECT co.id as id_order, co.total_rupiah as total, cd.first_name as name, 
																cc.no_resi as resi, cc.kondisi as kondisi, cc.keterangan as keterangan, cc.gambar as gambar, 
																cod.product_name as produk, cod.qty as jum, cod.product_code as katalog,
																if(cod.currency = 'USD',cod.price*co.kurs_USD*cod.qty-(cod.price*co.kurs_USD*cod.discount/100),
																if(cod.currency = 'EUR',cod.price*co.kurs_EUR*cod.qty-(cod.price*co.kurs_EUR*cod.discount/100),
																if(cod.currency = 'SGD',cod.price*co.kurs_SGD*cod.qty-(cod.price*co.kurs_SGD*cod.discount/100),
																	price*cod.qty-(price*cod.qty*cod.discount/100)))) as harga
																FROM customer_order as co 
																JOIN customer_data as cd ON cd.id=co.customer_data_id
																JOIN customer_order_confirmation as cc ON cc.id_order=co.id
																JOIN customer_order_detail as cod ON cod.customer_order_id=co.id
																WHERE confirmation = '1' AND cc.status='0' AND co.id = '".$value['id_order']."'");
																$no_order = 1;
																		foreach ($barang_complain->result_array() as $values) {?>
														<tbody>
															<tr>
																<td width="10px"><?php echo $no_order;?></td>
																<td width="430px"><?php echo $values['produk'];?></td>
																<td width="170px"><?php echo $values['katalog'];?></td>
																<td width="50px"><?php echo $values['jum'];?></td>
																<td width="100px" style="text-align: right;"><span style="padding-right: 5px;">Rp</span><?php echo number_format($values['harga'],2,",",".");?></td>
															</tr>
														</tbody>
														<?php $no_order++;} ?>
													</table>
												</div> 
												<div class="modal-footer">
													<input type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true" value="Close">
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php $no++;}?>
						</tbody>
					</table>
					<br>
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
