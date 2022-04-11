<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $title ?>
	</title>
	<!-- meta -->

	<?php require_once('_meta.php'); ?>

	<!-- css -->
	<?php require_once('_css.php'); ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	<style>
		th {
			padding-top: 0.3rem !important;
			padding-bottom: 0.3rem !important;
			padding-left: 0.5rem !important;
			padding-right: 0.5rem !important;
			white-space: nowrap;
			text-align: center;
			border: 0.1em solid rgba(0, 0, 0, 0.1);
		}

		td {
			padding-left: 0.2rem !important;
			padding-right: 0.2rem !important;
			white-space: nowrap;
			border: 0.1em solid rgba(0, 0, 0, 0.1);
		}

		div.dataTables_wrapper {
			margin: 0 auto;
		}

		div.container {
			width: 80%;
		}

		table thead {
			background-color: #BCCCEC;
		}

		.table-form>thead>tr,
		.table-form>tbody>tr,
		.table-form>tbody>tr>td {
			padding: 4px;
			vertical-align: middle;
			border: none;
		}

		.table-form-bordered>thead>tr,
		.table-form-bordered>tbody>tr,
		.table-form-bordered>tbody>tr>td {
			padding: 4px;
			vertical-align: middle;
			border: solid #DDDDDD 1px;
		}

		.table-form .lbl {
			text-align: right;
			padding-right: 15px;
			font-weight: bold;
		}
	</style>

</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- header -->
		<?php require_once('_header.php'); ?>
		<!-- sidebar -->
		<?php require_once('_sidebar.php'); ?>
		<!-- content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<div class="flash-data" data-sukses_add_soal="<?php echo $this->session->flashdata('sukses_add_soal'); ?>"></div>

			<section class="content">
				<?php echo $contents; ?>
			</section>
		</div>
		<!-- footer -->
		<?php require_once('_footer.php'); ?>

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- js -->
	<?php require_once('_js.php'); ?>

	<script src="<?= base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>

	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

</body>

</html>