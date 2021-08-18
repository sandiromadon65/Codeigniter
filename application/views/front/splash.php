<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Informasi Pondok Pesantren Al Halim Garut</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    	@import url('https://fonts.googleapis.com/css?family=Nunito');
		body{ 
		    background: #f0f0f0;
		    font-family: "Nunito", sans-serif;
		}

		.navbar {
		    box-shadow: 0 5px 40px rgba(0, 0, 0, 0.09) !important;
		}


		#image-section {
		    width: 100%;
		    min-height: 400px;
		    background-size: cover;
		    background-image: url('<?= base_url('assets/front/slider.jpeg')?>');
		    padding: 16px;
		}

		#intro-services {
			margin: -130px 30px 40px 30px;
		    background: white;
		    border-radius: 20px;
		    padding: 32px;
		    min-height: 230px;
		}

		.services-item{
	        text-align: center;   
	    }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-dark bg-success">
        <a class="navbar-brand" href="<?= base_url();?>">
            <img style="width: 100px; display: inline;margin-right: 20px;" src="<?= base_url('assets/front/images/AL.jpeg')?>" alt="">SISTEM INFORMASI PONDOK PESANTREN AL HALIM GARUT
        </a>
    </nav>
    <!-- End Navigation -->

    <!-- Section Image -->
    <section id="image-section">
    </section>
    <!-- End Section Image -->

    <!-- Section Intro Services -->
    <section id="intro-services">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-3 col-sm-6 mt-3">
            		<a class="text-decoration-none" href="<?= base_url()?>">
	                    <div class="card card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/64/000000/home.png">
	                            <h4 class="mt-2">Home</h4>
	                        </div>
	                    </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mt-3">
                	<a class="text-decoration-none" href="<?= base_url('profil')?>">
	                    <div class="card card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/64/000000/mosque.png">
	                            <h4 class="mt-2">Profil</h4>
	                        </div>
	                    </div>
	                </a>
                </div>
                <div class="col-md-3 col-sm-6 mt-3">
                	<a class="text-decoration-none" href="<?= base_url('gedung')?>">
	                    <div class="card card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/48/000000/city.png">
	                            <h4 class="mt-2">Gedung</h4>
	                        </div>
	                    </div>
	                </a>
                </div>
                <div class="col-md-3 col-sm-6 mt-3">
                	<a class="text-decoration-none" href="<?= base_url('kegiatan')?>">
	                    <div class="card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/48/000000/checklist.png">
	                            <h4 class="mt-2">Kegiatan</h4>
	                        </div>
	                    </div>
	                </a>
                </div>
                <div class="col-md-3 col-sm-6 mt-3">
                	<a class="text-decoration-none" href="<?= base_url('cara_pendaftaran')?>">
	                    <div class="card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/48/000000/add-contact-to-company.png">
	                            <h4 class="mt-2">Pendaftaran</h4>
	                        </div>
	                    </div>
	                </a>
                </div>
                <div class="col-md-3 col-sm-6 mt-3">
                	<a class="text-decoration-none" href="<?= base_url('santri')?>">
	                    <div class="card card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/48/000000/conference.png">
	                            <h4 class="mt-2">Santri</h4>
	                        </div>
	                    </div>
	                </a>
                </div>
                <div class="col-md-3 col-sm-6 mt-3">
                	<a class="text-decoration-none" href="<?= base_url('pengurus')?>">
	                    <div class="card card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/48/000000/conference-call.png">
	                            <h4 class="mt-2">Pengurus</h4>
	                        </div>
	                    </div>
	                </a>
                </div>
                <div class="col-md-3 col-sm-6 mt-3">
                	<a class="text-decoration-none" href="<?= base_url('galleri')?>">
	                    <div class="card shadow bg-white rounded">
	                        <div class="card-body services-item">
	                            <img src="https://img.icons8.com/color/48/000000/image-gallery.png">
	                            <h4 class="mt-2">Galleri</h4>
	                        </div>
	                    </div>
	                </a>
                </div>
                
            </div>
        </div>
    </section>
	<!-- End Section Intro Services -->
	
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>