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
				<li><a href="<?php echo base_url()?>logistics/logistics/product/product">Product</a></li>
				<li class="active"><?= $page;?></li>
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
		<div class="row">
			<form class="form-horizontal" action="<?=  base_url();?>logistics/product/addProduct" method="POST">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title" id="kategory"><?= $page;?></h5>
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
									<div class="form-group">
										<label class="col-lg-3 control-label">Company<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="select" name="merchant_data_id" class="form-control" required="required">
												<option value="0">--Choose Company Product--</option>
												<?php foreach($company as $value){?>
												<option value="<?= $value['id'];?>"><?= $value['company'];?></option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Product Name<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required="required">
											</div>
									</div>
									<div class="form-group">
									<label class="col-lg-3 control-label">Brand<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="select" name="merchant_brand" class="form-control" required="required">
												<option value="0">--Choose Product's Brand--</option>
												<?php foreach($brand as $value){?>
												<option value="<?= $value['id'];?>"><?= $value['brand'];?></option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
									<label class="col-lg-3 control-label">Category<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="select" id="kategori" name="category" class="form-control" required="required">
												<option value="0">--Choose Category--</option>
												<?php foreach($category as $value){?>
												<option value="<?= $value['id'];?>"><?= $value['category'];?></option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
									<label class="col-lg-3 control-label">Sub-Category<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="select" id="subKategori" name="subCategory" class="form-control" required="required">
												<option value="0">--Choose Category First--</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Description<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<textarea cols="17" rows="7" class="wysihtml5 wysihtml5-min form-control" placeholder="Write Product Description" class="form-control" required="required" name="description"></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-lg-3 control-label">Catalog<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="catalog" placeholder="Enter Product Catalog" required="required">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Size</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="size" placeholder="Product Size">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Price<span class="text-danger">*</span></label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="price" placeholder="Product Price" required="required">
											</div>
									</div>
									<div class="form-group">
									<label class="col-lg-3 control-label">Currency<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="select"  name="currency" class="form-control" required="required">
												<option value="USD" selected>USD</option>
												<option value="EUR">EUR</option>
												<option value="SGD">SGD</option>
												<option value="IDR">IDR</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Stock</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="stock" placeholder="Product Stock" required="required" value="0">
											</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Discount</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="discount" placeholder="Product Discount" value="0">
											</div>
									</div>
									<div class="form-group">
									<label class="col-lg-3 control-label">Packaging<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select class="select"  name="packaging" class="form-control" required="required">
												<option value="1" selected="">WOOD</option>
												<option value="2">DRY ICE</option>
												<option value="3">GEL PACK</option>
												<option value="4">NORMAL</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Logistics Labsatu</a>
		</div>
		<!-- /footer -->
	</div>

</div>
