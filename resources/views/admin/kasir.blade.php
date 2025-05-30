@extends('layoutadmin.layoutadmin')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Halaman {{ $data['title'] }}</h5>
                    <div class="card-header-right">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="row mt-4 mx-2">
                            <div class="col-sm-6">
                                <div class="card mat-clr-stat-card text-white green ">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-3 text-center bg-c-green">
                                                <i class="fas fa-star mat-icon f-24"></i>
                                            </div>
                                            <div class="col-9 cst-cont">
                                                <h5>{{ $data['jml_produk'] }}</h5>
                                                <p class="m-b-0">Jumlah produk</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="card mat-clr-stat-card text-white red">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-3 text-center bg-c-red">
                                                <i class="fas fa-user mat-icon f-24"></i>
                                            </div>
                                            <div class="col-9 cst-cont">
                                                <h5>453</h5>
                                                <p class="m-b-0">Transaksi hari ini</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Produk</h5>
                        </div>
                         
                        <div class="card-body">
                           

                            <div class="row" >
                                <div id="showproduk"  class="col-sm-4">
                                    <div class="card shadow-sm" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                        
                                        <img src="{{asset('assets/admin/images/imagereview.jpeg')}}" class="card-img-top" alt="" style="height: 180px; object-fit: cover;">

                                        <div class="card-body">
                                            <p class="card-title text-truncate text-center">No Produk<br />
                                                <span for="" class="fw-bold badge badge-secondary"><b>No Kode</b></span>
                                            </p>
                                            <h6 class="text-secondary text-center">Rp {{ number_format(00000, 0, ',', '.') }}</h6>

                                        </div>

                                        <button class="btn btn-sm btn-secondary w-100" style="border-radius: 10px">
                                            <i class="bi bi-cart-plus"></i> <i class="fas fa-plus"></i> Tambah
                                        </button>
                                    </div>

                                </div>
                             
                                @foreach ($data['produk'] as $product)
                                <div class="col-sm-4">
                                    <div class="card shadow-sm" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                        <div style="position: absolute;">
                                           <span class="badge badge-success">Disc : {{ $product->diskon }}%</span>
                                        </div>
                                        <img src="{{asset('storage/'.$product->foto)}}" class="card-img-top" alt="{{ $product->nama_produk }}" style="height: 180px; object-fit: cover;">
                                        <div class="card-body">
                                            <p class="card-title text-truncate text-center">{{ $product->nama_produk }} <br />
                                                <span for="" class="fw-bold badge badge-danger"><b>{{ $product->kode_produk }}</b></span>
                                            </p>
                                            <h6 class="text-primary text-center">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</h6>
                                          
                                        </div>
                                        
                                            <button class="btn btn-sm btn-primary w-100 tambah-pesanan" data-kode="{{ $product->kode_produk }}" style="border-radius: 10px">
                                                <i class="bi bi-cart-plus"></i> <i class="fas fa-plus"></i> Tambah pesanan
                                            </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
                                <div class="text-muted f-14">
                                    Menampilkan {{ $data['produk']->firstItem() }} – {{ $data['produk']->lastItem() }} dari {{ $data['produk']->total() }} data
                                </div>
                                <div>
                                    {{ $data['produk']->links('pagination::bootstrap-5') }}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <input type="text" name="kode" id="kode" class="form-control d-none" value="{{ $data['kode_tr'] }}" required readonly>
                           <h5>KODE TRANSAKSI : #{{ $data['kode_tr'] }}</h5>
                            <hr />
                            <div class="form-group form-primary">
                                <label class="float-label">Kode Produk</label>
                                <input type="text" name="kategori" id="kodeproduk" class="form-control" required>
                                <span class="form-bar"></span>
                            </div>

                        </div>
                    </div>
                    <div class="card" >
                        <div class="card-footer">
                            <h5>List order</h5>
                        </div>
                        <div class="card-body" style="height: 200px; overflow-y: auto;">
                            <div id="listorder">
                                <center>
                                    <img src="{{ asset('assets/admin/images/loupe.png') }}" class="img-fluid" alt="serach" width="70">
                                </center>
                                <div id="pesan" style="font-weight: bold">
                                    <p class="text-center text-primary mt-2">List order belum tersedia</p>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-footer">
                          <div id="totalharga"></div>
                          <div class="row">
                            <div class="mb-3 col">
                                <label for="exampleInputEmail1" class="form-label">Total Bayar</label>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="number" class="form-control" id="formtotal" style="font-weight: bold">
                                </div>

                                <input type="text" class="form-control d-none" id="formtotal2" aria-describedby="emailHelp">

                            </div>

                            <div class="mb-3 col">
                                <label for="exampleInputEmail1" class="form-label">Diskon</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="diskon">
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>

                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col">
                                <label for="exampleInputEmail1" class="form-label">Uang</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="number" class="form-control" id="uang"  style="font-weight: bold">
                                </div>
                            </div>

                            <div class="mb-3 col">
                                <label for="exampleInputEmail1" class="form-label">Kembalian</label>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="text" class="form-control" id="kembalian" readonly style="font-weight: bold" >
                                </div>

                            </div>
                          </div>
                          <button class="btn btn-primary w-100"><i class="fas fa-print"></i>CETAK STRUK</button>

                          

                        </div>
                    </div>
              

                </div>
            </div>
            
        </div>
        <!-- Page-body end -->
    </div>
</div>
@endsection

