@extends('layoutadmin.layoutadmin')
@section('content')
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <!-- Material statustic card start -->
                    <div class="col-xl-8 col-md-12">
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-user text-c-purple f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>10K</h5>
                                                <p class="text-muted m-b-0">Pelanggan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-users text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>100%</h5>
                                                <p class="text-muted m-b-0">Pegawai</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-6 p-b-20 p-t-20 b-r-default">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-file-alt text-c-red f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>2000+</h5>
                                                <p class="text-muted m-b-0">Produk</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-sitemap text-c-blue f-24"></i>


                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>120</h5>
                                                <p class="text-muted m-b-0">Store</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-md-12">
                        <div class="card mat-clr-stat-card text-white green ">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-3 text-center bg-c-green">
                                        <i class="fas fa-star mat-icon f-24"></i>
                                    </div>
                                    <div class="col-9 cst-cont">
                                        <h5>4000+</h5>
                                        <p class="m-b-0">Produk terlaris</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mat-clr-stat-card text-white blue">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-3 text-center bg-c-blue">
                                        <i class="fas fa-trophy mat-icon f-24"></i>
                                    </div>
                                    <div class="col-9 cst-cont">
                                        <h5>17</h5>
                                        <p class="m-b-0">Pelanggan terbaik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Material statustic card end -->
                    <!-- order-visitor start -->


                    <!-- order-visitor end -->

                    <!--  sale analytics start -->
                    <div class="col-xl-6 col-md-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Order hari ini</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-trash close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0 without-header">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>Shirley Hoe</h6>
                                                            <p class="text-muted m-b-0">Sales executive , NY</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <h6 class="f-w-700">$78.001<i class="fas fa-level-down-alt text-c-red m-l-10"></i></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>James Alexander</h6>
                                                            <p class="text-muted m-b-0">Sales executive , EL</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <h6 class="f-w-700">$89.051<i class="fas fa-level-up-alt text-c-green m-l-10"></i></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>Shirley Hoe</h6>
                                                            <p class="text-muted m-b-0">Sales executive , NY</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <h6 class="f-w-700">$89.051<i class="fas fa-level-up-alt text-c-green m-l-10"></i></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>Nick Xander</h6>
                                                            <p class="text-muted m-b-0">Sales executive , EL</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <h6 class="f-w-700">$89.051<i class="fas fa-level-up-alt text-c-green m-l-10"></i></h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <div class="row">
                            <!-- sale card start -->

                            <div class="col-md-6">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Orderan Hari Ini</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i>7652</h4>
                                        <p class="m-b-0">48% From Last 24 Hours</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Orderan Bulan Ini</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-up m-r-15 text-c-green"></i>6325</h4>
                                        <p class="m-b-0">36% From Last 6 Months</p>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Total Orderan</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fas fa-calendar m-r-15 text-c-green"></i>5963</h4>
                                        <p class="m-b-0">36% From Last 6 Months</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card bg-c-red total-card">
                                    <div class="card-block">
                                        <div class="text-left">
                                            <h4>489</h4>
                                            <p class="m-0">Pengeluaran</p>
                                        </div>
                                        <span class="label bg-c-red value-badges">15%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-c-green total-card">
                                    <div class="card-block">
                                        <div class="text-left">
                                            <h4>$5782</h4>
                                            <p class="m-0">Pendapatan</p>
                                        </div>
                                        <span class="label bg-c-green value-badges">20%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- sale card end -->
                        </div>
                    </div>

                    <!--  sale analytics end -->

                    <!-- Project statustic start -->
                    <div class="col-xl-12">
                        <div class="card proj-progress-card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <h6>Published Project</h6>
                                        <h5 class="m-b-30 f-w-700">532<span class="text-c-green m-l-10">+1.69%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-red" style="width:25%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <h6>Completed Task</h6>
                                        <h5 class="m-b-30 f-w-700">4,569<span class="text-c-red m-l-10">-0.5%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-blue" style="width:65%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <h6>Successfull Task</h6>
                                        <h5 class="m-b-30 f-w-700">89%<span class="text-c-green m-l-10">+0.99%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-green" style="width:85%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <h6>Ongoing Project</h6>
                                        <h5 class="m-b-30 f-w-700">365<span class="text-c-green m-l-10">+0.35%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-yellow" style="width:45%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Project statustic end -->
                </div>
            </div>
            <!-- Page-body end -->
        </div>
       
    </div>
</div>
@endsection
