                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><b>Dashboard</b></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Print Report</a> -->
                    </div>

                    
                    <div class="row">

<!-- Earnings (Monthly) Card Example -->
<?php if ($_SESSION['status'] == 'ADMIN') { ?>
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center ">
                    <h1 class="display-3">Selamat Datang</h1>
                    <h1 class="display-4">Administrator</h1>
                </div>
            </div>
        </div>
    </div>
<?php  } elseif ($_SESSION['status'] == 'GURU')  { ?>
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="display-3">Selamat Datang</h1>
                    <h1 class="display-4">Guru</h1>
                </div>
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-xl btn-primary">Buat Kelas</a>
                </div>
            </div>
        </div>
    </div>
<?php  } elseif ($_SESSION['status'] == 'SISWA')  { ?>
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="display-3">Selamat Datang</h1>
                    <h1 class="display-4">Siswa</h1>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

                    