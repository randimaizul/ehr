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
								<th>No. Order</th>
								<th>Customer</th>
								<th>Total PO</th>
								<th>Status</th>
								<th>Order Date</th>
								<th>Day</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;foreach($order->result() as $o) { ?>
							<tr>
								<td>
									<a href="<?= base_url();?>logistics/orderDetail/<?= $o->status_order;?>/<?= $o->id;?>"><button class="btn btn-success btn-xs" type="button">
										<i class="icon-eye8"></i> &nbsp <?php echo $o->id?>
									</button></a>								
								</td>
								<td><?php echo $o->first_name?></td>
								<td><strong><?php echo $this->indoclass->rp($o->total_rupiah);?></strong></td>
								<td>
									<?php 
										if ($o->status_order=="pesan") { echo '<img width="200" height="50" src="'.base_url().'uploads/icon/pengiriman/1.png" class="img-responsive">';}
										else if ($o->status_order=="proses") { echo '<img width="200" height="50" src="'.base_url().'uploads/icon/pengiriman/2.png" class="img-responsive">';}
										else if ($o->status_order=="pengiriman") { echo '<img width="200" height="50" src="'.base_url().'uploads/icon/pengiriman/3.png" class="img-responsive">';}
										else if ($o->status_order=="penerimaan") { echo '<img width="200" height="50" src="'.base_url().'uploads/icon/pengiriman/4.png" class="img-responsive">';}
										else if ($o->status_order=="cancel") { echo '<img width="200" height="50" src="'.base_url().'data/assets/gambar/cancel.png" class="img-responsive">';}
									?>
								</td>
								<td><?php echo $this->indoclass->tgl_indo($o->created)."<br>".substr($o->created, 11);?></td>
								<td>
									<?php 
										$diff = $this->indoclass->sisahari($o->created);
										if($diff<0) echo "<span class='text-danger'>".$diff."</span>";
										else echo $diff;
									?>		
								</td>
								<td>
									<div class="btn-group">
				                    	<button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
					                    	<i class="icon-cog7"></i> &nbsp;<span class="caret"></span>
				                    	</button>

				                    	<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#" data-target="#modalAddress<?php echo $no;?>" data-toggle="modal" ><i class="icon-home7"></i> Show Address</a></li>
											<?php if($o->status_order=='proses'){?>
											<li><a href="#" data-target="#myModal<?php echo $no;?>" data-toggle="modal"><i class="icon-truck"></i> Send Order</a></li>
											<?php } ?>
											<!-- <li><a href="#"><i class="icon-mail5"></i> One more action</a></li> -->
										</ul>
									</div>
									<div class="modal fade" id="modalAddress<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
										      			<td class="col-md-2 col-sm-4"><b>No. Order</b></td>
										      			<td class="col-sm-8"><?= $o->id;?></td>
										      		</tr>
										      		<tr>
										      			<td class="col-md-2 col-sm-4"><b>Nama Penerima</b></td>
										      			<td class="col-sm-8"><?= $o->first_name;?></td>
										      		</tr>
										      		<tr>
										      			<td class="col-md-2 col-sm-4"><b>No. Telp</b></td>
										      			<td class="col-sm-8"><?= $o->phone;?></td>
										      		</tr>
										      		<tr>
										      			<td class="col-md-2 col-sm-4"><b>Alamat</b></td>
										      			<td class="col-sm-8"><?= $o->address;?></td>
										      		</tr>
										      		<tr>
										      			<td class="col-md-2 col-sm-4"><b>Provinsi</b></td>
										      			<td class="col-sm-8"><?= $o->province;?></td>
										      		</tr>
										      		<tr>
										      			<td class="col-md-2 col-sm-4"><b>Kota/Kabupaten</b></td>
										      			<td class="col-sm-8"><?= $o->city;?></td>
										      		</tr>
										      		<tr>
										      			<td class="col-md-2 col-sm-4"><b>Kecamatan</b></td>
										      			<td class="col-sm-8"><?= $o->district;?></td>
										      		</tr>
										      		<tr>
										      			<td class="col-md-2 col-sm-4"><b>Kode Pos</b></td>
										      			<td class="col-sm-8"><?= $o->post_code;?></td>
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
									<div class="modal fade" id="myModal<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									        <h5 class="modal-title" id="exampleModalLabel">Send Order</h5>
									      </div>
									      <div class="modal-body">
									      	<table>
										        <form action="<?php echo base_url();?>logistics/logistics/sendOrder/<?php print_r($this->uri->segment(3));?>" method="POST">
										        	<div class="form-group">
										        		<tr>
										        			<td><label class="form-label">No. Order</label></td>
										        			<td><input style="margin: 0px 0px 10px 10px; width: 400px;" type="form-control" type="text" name="no" value="<?= $o->id?>" disabled>
										        			<input type="hidden" name="no_order" value="<?= $o->id?>"></td>
										        		</tr>
										        	</div>
										        	<div class="form-group">
										        		<tr>
											        		<td><label class="form-label">Send Date</label></td>
											        		<td><input style="margin: 0px 0px 10px 10px; width: 400px;" type="form-control" type="text" name="send_date" value="<?= date('d-m-Y',now());?>" placeholder="01-01-2001"></td>
										        		</tr>
										        	</div>
										        	<div class="form-group">
										        		<tr>
											        		<td><label class="form-label">No Resi</label></td>
											        		<td><input style="margin: 0px 0px 10px 10px; width: 400px;" type="form-control" type="text" name="no_resi" value="" placeholder="1234567890"></td>
										        		</tr>
										        	</div>
										        	<div class="form-group">
										        		<tr>
											        		<td><label class="form-label">Total Shipping Payment</label></td>
											        		<td><input style="margin: 0px 0px 10px 10px; width: 400px;" type="form-control" type="text" name="shipping_payment" value="" placeholder="e.g. 100000"></td>
										        		</tr>
										        	</div>
									      </div>
									      <div class="modal-footer">
									        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
									        <tr>
									        	<td></td>
									        	<td><button type="submit" class="btn btn-primary pull-right">Send</button></td>
									        </tr>
									        </form>
									        </table>
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
