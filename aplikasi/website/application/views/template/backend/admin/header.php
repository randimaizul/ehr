<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EHR-Electronic Health Records</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>data/assets/lib/jquery/jquery-1.11.2.min.js"></script> -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/selects/selectboxit.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/editable/editable.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/extensions/contextmenu.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/visualization/sparkline.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/pages/table_elements.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/pages/layout_fixed_custom.js"></script>
	<!-- /theme JS files -->
	<!-- text editor  -->
	<!-- <script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/editors/wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/editors/wysihtml5/toolbar.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/editors/wysihtml5/parsers.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/pages/editor_wysihtml5.js"></script> -->
	<!-- /text editor -->
	<!-- Chart -->
	<!-- <script type="text/javascript" src="http://www.google.com/jsapi"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/charts/echarts/pies_donuts.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/visualization/echarts/echarts.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/visualization/echarts/theme/limitless.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/visualization/echarts/chart/funnel.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/visualization/echarts/chart/pie.js"></script> -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/charts/google/pies/pie_3d.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/charts/google/pies/pie_diff_radius.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/charts/google/pies/pie_diff_border.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/charts/google/pies/pie_diff_opacity.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/charts/google/pies/pie_diff_invert.js"></script>
	<!-- /Chart -->
</head>