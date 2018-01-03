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
				<li><a href="<?php echo base_url()?>labid/admin/product/service">Product</a></li>
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
			<span class="text-semibold">Well done!</span> <?php echo $this->session->flashdata('true');?>.
	    </div>
	    <?php } else if($this->session->flashdata('false')) {?>
		<div class="alert bg-danger alert-styled-left">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
			<span class="text-semibold">Oh Snap!</span> <?php echo $this->session->flashdata('false');?>, try submitting again.
	    </div>
	    <?php } ?>


		<div class="row">
			<div class="col-md-8">
				<!-- Support tickets -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">Support Tickets Today</h6>
						<div class="heading-elements">
							<button type="button" class="btn btn-link daterange-ranges heading-btn text-semibold">
								<i class="icon-calendar3 position-left"></i> <span></span> <b class="caret"></b>
							</button>
	                	</div>
					</div>

					<div class="table-responsive">
						<table class="table table-xlg text-nowrap">
							<tbody>
								<tr>
									<td class="col-md-4">
										<div class="media-left media-middle">
											<div id="tickets-status"></div>
										</div>

										<div class="media-left">
											<h5 class="text-semibold no-margin">14,327 <small class="text-success text-size-base"><i class="icon-arrow-up12"></i> (+2.9%)</small></h5>
											<span class="text-muted"><span class="status-mark border-success position-left"></span> Jun 16, 10:00 am</span>
										</div>
									</td>

									<td class="col-md-3">
										<div class="media-left media-middle">
											<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-alarm-add"></i></a>
										</div>

										<div class="media-left">
											<h5 class="text-semibold no-margin">
												1,132 <small class="display-block no-margin">total tickets</small>
											</h5>
										</div>
									</td>

									<td class="text-right col-md-2">
										<a href="#" class="btn bg-teal-400">+ New Ticket</a>
									</td>
								</tr>
							</tbody>
						</table>	
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 50px">Time</th>
									<th style="width: 300px">User</th>
									<th>Description</th>
									<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
								</tr>
							</thead>
							<tbody>
								<tr class="active border-double">
									<td colspan="3">Active tickets</td>
									<td class="text-right">
										<span class="badge badge-default">24</span>
									</td>
								</tr>

								<tr>
									<td class="text-center">
										<h6 class="no-margin"><small class="display-block text-size-small no-margin">10:30:00</small></h6>
									</td>
									<td>
										<div class="media-body">
											<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">[#1182] Maulana Khoir</a>
											<span class="text-muted text-size-small"><small class="display-block text-size-small no-margin">Jalan Cimanuk No. 33 Blok B1, RT/RW 02/03, Tegal Gundil, Bogor Kota</small></span>
										</div>
									</td>
									<td>
										<a href="#" class="text-default display-inline-block">
											<span class="text-semibold">dr. Sari Pati Cinta</span>
											<span class="display-block text-muted">Poli Jantung (09:00 - 14:00)</span>
										</a>
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
													<li><a href="#"><i class="icon-history"></i> Full history</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
													<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>

								<tr>
									<td class="text-center">
										<h6 class="no-margin"><small class="display-block text-size-small no-margin">08:30:00</small></h6>
									</td>
									<td>
										<div class="media-body">
											<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">[#1183] Randi Maizul Syaputra</a>
											<span class="text-muted text-size-small"><small class="display-block text-size-small no-margin">Jalan Cimanuk No. 33 Blok B1, RT/RW 02/03, Tegal Gundil, Bogor Kota</small></span>
										</div>
									</td>
									<td>
										<a href="#" class="text-default display-inline-block">
											<span class="text-semibold">dr. Pujangga Cinta</span>
											<span class="display-block text-muted">Poli Hati (09:00 - 14:00)</span>
										</a>
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
													<li><a href="#"><i class="icon-history"></i> Full history</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
													<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
								
								<tr class="active border-double">
									<td colspan="3">Resolved tickets</td>
									<td class="text-right">
										<span class="badge bg-success">42</span>
									</td>
								</tr>

								<tr>
									<td class="text-center">
										<i class="icon-checkmark3 text-success"></i>
									</td>
									<td>
										<div class="media-body">
											<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">[#1182] Maulana Khoir</a>
											<span class="text-muted text-size-small"><small class="display-block text-size-small no-margin">Jalan Cimanuk No. 33 Blok B1, RT/RW 02/03, Tegal Gundil, Bogor Kota</small></span>
										</div>
									</td>
									<td>
										<a href="#" class="text-default display-inline-block">
											<span class="text-semibold">dr. Sari Pati Cinta</span>
											<span class="display-block text-muted">Poli Jantung (09:00 - 14:00)</span>
										</a>
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
													<li><a href="#"><i class="icon-history"></i> Full history</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
													<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>

								<tr class="active border-double">
									<td colspan="3">Closed tickets</td>
									<td class="text-right">
										<span class="badge bg-danger">37</span>
									</td>
								</tr>

								<tr>
									<td class="text-center">
										<i class="icon-cross2 text-danger-400"></i>
									</td>
									<td>
										<div class="media-body">
											<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">[#1182] Maulana Khoir</a>
											<span class="text-muted text-size-small"><small class="display-block text-size-small no-margin">Jalan Cimanuk No. 33 Blok B1, RT/RW 02/03, Tegal Gundil, Bogor Kota</small></span>
										</div>
									</td>
									<td>
										<a href="#" class="text-default display-inline-block">
											<span class="text-semibold">dr. Sari Pati Cinta</span>
											<span class="display-block text-muted">Poli Jantung (09:00 - 14:00)</span>
										</a>
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
													<li><a href="#"><i class="icon-history"></i> Full history</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
													<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /support tickets -->
			</div>
			<div class="col-md-4">
				<!-- Daily sales -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">Daily Dokter Stats</h6>
						<div class="heading-elements">
							<span class="heading-text">Total Pasien: <span class="text-bold text-danger-600 position-right">35</span></span>
							<ul class="icons-list">
		                		<li class="dropdown text-muted">
		                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
										<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
										<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
										<li class="divider"></li>
										<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
									</ul>
		                		</li>
		                	</ul>
						</div>
					</div>

					<div class="panel-body">
						<div id="sales-heatmap"></div>
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Dokter</th>
									<th>Status</th>
									<th>Pasien</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="media-body">
											<div class="media-heading">
												<a href="#" class="letter-icon-title">dr. Sari Pati Cinta</a>
											</div>

											<div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Mata</div>
										</div>
									</td>

									<td><span class="label bg-success-400">Active</span></td>
									<td>
										<span class="badge badge-primary">12</span>
									</td>
								</tr>

								<tr>
									<td>
										<div class="media-body">
											<div class="media-heading">
												<a href="#" class="letter-icon-title">dr. Pujangga Cinta</a>
											</div>

											<div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Penyakit dalam</div>
										</div>
									</td>
									<td><span class="label bg-danger">Closed</span></td>
									<td>
										<span class="badge badge-primary">12</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /daily sales -->

			</div>
		</div>
				

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2017. <a href="#">Electronic Health Records</a>
		</div>
		<!-- /footer -->
	</div>

</div>

