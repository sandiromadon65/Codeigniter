
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $title ?> | Sistem Informasi Pondok Pesantren Al Halim Garut</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/front/fonts/icons.css')?>" rel="stylesheet" type="text/css">

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
    <link href="<?= base_url('assets/front/')?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

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
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?= base_url();?>">
                    <img style="width: 70px; display: inline;margin-right: 20px;margin-top: -5px" src="<?= base_url('assets/front/images/AL.jpeg')?>" alt="">SISTEM INFORMASI PONDOK PESANTREN AL HALIM GARUT
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
                            <span>Cara Pendaftaran</span>
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
                    &copy; 2021 <a href="javascript:void(0);">Pontren Al Halim Garut</a>.
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
    <script src="<?= base_url('assets/front/')?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/front/')?>js/admin.js"></script>
    <script src="<?= base_url('assets/front/')?>js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?= base_url('assets/front/')?>js/demo.js"></script>
    <script>
        $(document).ready(function(){
            $('table').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>