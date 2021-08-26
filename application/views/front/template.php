<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?= $title ?> | Sistem Informasi Pondok Pesantren Al - Ittihad</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
		type="text/css">
	<link href="<?= base_url('assets/front/fonts/icons.css')?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Databtables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/all.css">


	<!--- JAVASCRIPT -->
	<!-- Jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/id.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
	</script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<!-- Datatables -->
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.31.0/dist/sweetalert2.all.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
	<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
	<!-- Toastr -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>

	<script>
		toastr.options.timeOut = 13000; // How long the toast will display without user interaction
		toastr.options.extendedTimeOut = 2000; // How long the toast will display after a user hovers over it
		toastr.options.progressBar = true;
		toastr.options.closeButton = true;

	</script>

	<!-- Bootstrap Core Css -->
	<link href="<?= base_url('assets/front/')?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="<?= base_url('assets/front/')?>plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="<?= base_url('assets/front/')?>plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- Morris Chart Css-->
	<link href="<?= base_url('assets/front/')?>plugins/morrisjs/morris.css" rel="stylesheet" />
	<!-- Light Gallery Plugin Css -->
	<link href="<?= base_url('assets/front/')?>plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
	<!-- JQuery DataTable Css -->
	<link href="<?= base_url('assets/front/')?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
		rel="stylesheet">

	<!-- Jquery Core Js -->
	<script src="<?= base_url('assets/front/')?>plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core Js -->
	<script src="<?= base_url('assets/front/')?>plugins/bootstrap/js/bootstrap.js"></script>

	<!-- Custom Css -->
	<link href="<?= base_url('assets/front/')?>css/style.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="<?= base_url('assets/front/')?>css/themes/all-themes.css" rel="stylesheet" />

	<style>
		.foto-gallery {
			object-fit: cover !important;
			object-position: center !important;
			min-height: 200px !important;
		}

	</style>
</head>

<body class="theme-green">

	<!-- Overlay For Sidebars -->
	<div class="overlay"></div>
	<!-- #END# Overlay For Sidebars -->

	<!-- Top Bar -->
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#navbar-collapse" aria-expanded="false"></a>
				<a href="javascript:void(0);" class="bars"></a>
				<a class="navbar-brand" href="<?= base_url();?>">
					<img style="width: 50px; display: inline;margin-right: 20px;margin-top: -5px"
						src="<?= base_url('assets/front/images/AL.png')?>" alt="">SISTEM INFORMASI PONDOK PESANTREN AL
					- ITTIHAD
				</a>
			</div>
		</div>
	</nav>
	<!-- #Top Bar -->
	<section>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar">
			<!-- User Info -->
			<div class="user-info">
			</div>
			<!-- #User Info -->
			<!-- Menu -->
			<div class="menu">
				<ul class="list">
					<li>
						<a href="<?= base_url()?>">
							<i class="material-icons">home</i>
							<span>Kembali Ke Menu Utama</span>
						</a>
					</li>
					<li class="<?= active('profil')?>">
						<a href="<?= base_url('profil')?>">
							<i class="material-icons">account_balance</i>
							<span>Profil</span>
						</a>
					</li>
					<li class="<?= active('gedung')?>">
						<a href="<?= base_url('gedung')?>">
							<i class="material-icons">domain</i>
							<span>Gedung</span>
						</a>
					</li>
					<li class="<?= active('kegiatan')?>">
						<a href="<?= base_url('kegiatan')?>">
							<i class="material-icons">notifications_active</i>
							<span>Kegiatan</span>
						</a>
					</li>
					<li class="<?= active('cara_pendaftaran')?>">
						<a href="<?= base_url('cara_pendaftaran')?>">
							<i class="material-icons">apps</i>
							<span>Form Pendaftaran</span>
						</a>
					</li>
					<li class="<?= active('santri')?>">
						<a href="<?= base_url('santri')?>">
							<i class="material-icons">person</i>
							<span>Santri</span>
						</a>
					</li>
					<li class="<?= active('pengurus')?>">
						<a href="<?= base_url('pengurus')?>">
							<i class="material-icons">people</i>
							<span>Pengurus</span>
						</a>
					</li>
					<li class="<?= active('kamar')?>">
						<a href="<?= base_url('kamar')?>">
							<i class="material-icons">collections</i>
							<span>Kamar</span>
						</a>
					</li>
					<li class="<?= active('galleri')?>">
						<a href="<?= base_url('galleri')?>">
							<i class="material-icons">collections</i>
							<span>Galleri</span>
						</a>
					</li>

				</ul>
			</div>
			<!-- #Menu -->
			<!-- Footer -->
			<div class="legal">
				<div class="copyright">
					&copy; 2021 <a href="javascript:void(0);">Pontren Al - Ittihad</a>.
				</div>
			</div>
			<!-- #Footer -->
		</aside>
		<!-- #END# Left Sidebar -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<!-- Main Content -->
			<?= $content ?>
		</div>
	</section>



	<!-- Select Plugin Js -->
	<script src="<?= base_url('assets/front/')?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

	<!-- Slimscroll Plugin Js -->
	<script src="<?= base_url('assets/front/')?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Waves Effect Plugin Js -->
	<script src="<?= base_url('assets/front/')?>plugins/node-waves/waves.js"></script>

	<!-- Jquery CountTo Plugin Js -->
	<script src="<?= base_url('assets/front/')?>plugins/jquery-countto/jquery.countTo.js"></script>

	<!-- Morris Plugin Js -->
	<script src="<?= base_url('assets/front/')?>plugins/raphael/raphael.min.js"></script>
	<script src="<?= base_url('assets/front/')?>plugins/morrisjs/morris.js"></script>

	<!-- Light Gallery Plugin Js -->
	<script src="<?= base_url('assets/front/')?>plugins/light-gallery/js/lightgallery-all.js"></script>
	<!-- Custom Js -->
	<script src="<?= base_url('assets/front/')?>js/pages/medias/image-gallery.js"></script>
	<!-- Jquery DataTable Plugin Js -->
	<script src="<?= base_url('assets/front/')?>plugins/jquery-datatable/jquery.dataTables.js"></script>
	<script src="<?= base_url('assets/front/')?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js">
	</script>

	<!-- Custom Js -->
	<script src="<?= base_url('assets/front/')?>js/admin.js"></script>
	<script src="<?= base_url('assets/front/')?>js/pages/index.js"></script>

	<!-- Demo Js -->
	<script src="<?= base_url('assets/front/')?>js/demo.js"></script>
	<script>
		$(document).ready(function () {
			$('table').DataTable({
				responsive: true
			});
		});

	</script>
	<script>
		$(document).ready(function () {
			$('.waktu_picker').datetimepicker({
				sideBySide: true,
				format: 'YYYY-MM-DD',
				icons: {
					previous: 'fa fa-arrow-left',
					next: 'fa fa-arrow-right',
					up: "fa fa-arrow-up",
					down: "fa fa-arrow-down"
				},
				useCurrent: true,
			});

			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-blue',
				radioClass: 'iradio_flat-blue'
			})

		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img-upload').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(document).on('change', '.btn-file :file', function () {
			var input = $(this),
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function (event, label) {

			var input = $(this).parents('.input-group').find(':text'),
				log = label;

			if (input.length) {
				input.val(log);
			} else {
				if (log) alert(log);
			}

		});

		$("#imgInp").change(function () {
			readURL(this);
		});

	</script>
</body>

</html>
