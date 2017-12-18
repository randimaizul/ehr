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
				<li><a href="<?php echo base_url()?>logistics/order/<?= strtolower($page);?>">Order <?php echo $page;?></a></li>
				<li class="active">Order Detail</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<!-- /page header -->

	<!-- Content area -->
	<div class="content">
		<!-- Bordered panel body table -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Order Detail</h5>
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
					<table class="table table-bordered table-lg">
						<tbody>
							<tr class="active">
								<th colspan="5">Customer Data</th>
							</tr>
							<?php foreach($data as $result){?>
							<tr>
								<td class="col-md-2 col-sm-3">Customer Name</td>
								<td colspan="4"><?= ucfirst($result['first_name']);?></td>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">Phone Number</td>
								<td colspan="4"><?= $result['phone'];?></td>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">Email</td>
								<td colspan="4"><?= $result['email'];?></td>
							</tr>
							<tr class="border-double active">
								<th colspan="5">Customer Order Data</th>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">No Order</td>
								<td colspan="4"><?= $result['id'];?></td>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">Order Date</td>
								<td colspan="4"><?= $this->indoclass->tgl_indo($result['created']);?></td>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">Total PO</td>
								<td colspan="4">Rp <?= number_format($result['total_rupiah'],2,",",".");?></td>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">Total Shipping Payment</td>
								<td colspan="4">
									<?php if($result['total_shipping_payment']!=0){
												echo number_format($result['total_shipping_payment'],2,",",".");
											}else {
												echo "-";
											}
									?>
								</td>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">Status Order</td>
								<td colspan="4"><?= ucfirst($result['status_order']);?></td>
							</tr>
							<tr>
								<td class="col-md-2 col-sm-3">Send Date</td>
								<td colspan="4">
									<?php if($result['send_date']!=NULL){
										echo $this->indoclass->tgl_indo($result['send_date']);
									}else {
										echo "-";
									}
									?>
								</td>
							</tr>
							<?php } ?>
							<tr class="border-double active">
								<th colspan="5">Order Product List</th>
							</tr>
							<tr>
								<table class="table table-bordered table-lg">
									<tr>
										<td align="center" width="25"><b>No</b></td>
										<td><b>Product Name</b></td>
										<td><b>Product Code</b></td>
										<td><b>Price</b></td>
										<td align="center" width="50"><b>Qty</b></td>
									</tr>
									<?php $product=$this->db->query("SELECT * FROM customer_order_detail WHERE customer_order_id='".$result['id']."'");
										$no=1;
										foreach ($product->result_array( )as $value) {
									?>
									<tr>
										<td align="center"><?= $no;?></td>
										<td><?= $value['product_name'];?></td>
										<td><?= $value['product_code'];?></td>
										<td>
											<?php if($value['currency']=='USD'){
													$price = $value['price']*$result['kurs_USD'];
												}else if($value['currency']=='SGD'){
													$price = $value['price']*$result['kurs_SGD'];
												}else if($value['currency']=='EUR'){
													$price = $value['price']*$result['kurs_EUR'];
												}else {
													$price = $value['price'];
												}
												echo "Rp ".number_format($price,2,",",".");
											?>
										</td>
										<td align="center"><?= $value['qty'];?></td>
									</tr>
									<?php $no++;}?>
								</table>
							</tr>
						</tbody>
					</table>
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
