@extends('layoutadmin.layoutadmin')
@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <!-- Basic table card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Data {{ $data['title'] }}</h5>
                    <div class="card-header-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus text-white"></i> Tambah {{ $data['title'] }}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form {{ $data['title'] }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-material" method="post" action="{{ route('penjualan.create') }}">
                                            @csrf
                                            <div class="form-group form-primary">
                                                <input type="text" name="kode" class="form-control" required>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Kode Transaksi</label>
                                                <small>Masukan kode transaksi yang sudah ada seblumnya agar tidak terjadi error</small>
                                            </div>

                                            <div class="form-group form-primary">
                                                <select name="id_produk" id="" class="form-control fill" required>
                                                    <option value="">-- Pilih produk --</option>
                                                    @foreach ($data['produk'] as $pr )
                                                        <option value="{{ $pr->id }}">{{ $pr->nama_produk }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Produk</label>
                                            </div>

                                            

                                            <div class="form-group form-primary">
                                                <input type="number" name="harga" class="form-control" required id="harga">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Harga</label>
                                            </div>

                                            <div class="form-group form-primary">
                                                <input type="number" name="qty" class="form-control" required id="qty">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Qty</label>
                                            </div>


                                            <div class="form-group form-primary">
                                                <input type="number" name="total_harga" id="totalharga" class="form-control fill" readonly value="0" required>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Total Harga</label>
                                            </div>

                                            <div class="form-group form-primary">
                                                <input type="number" name="diskon" class="form-control" required id="diskon">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Diskon</label>
                                                <small>Masukan angka diskon tanpa tanda %</small>
                                            </div>
                                            <div class="form-group form-primary">
                                                <input type="number" name="harga_bayar" class="form-control fill" value="0" required id="hargabayar">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Harga bayar</label>
                                            </div>

                                            <div class="form-group form-primary">
                                                <input type="date" name="tgl" value="{{ date('Y-m-d') }}" class="form-control fill" required>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tanggal Transaksi</label>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Diskon</th>
                                    <th>Harga Bayar</th>
                                    <th>Tanggal</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($data['penjualan'] as $item )
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->kode_transaksi }}</td>
                                    <td>{{ $item->produk->nama_produk }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->harga, 0, ',', '.')  }}</td>
                                    <td>{{ number_format($item->total, 0, ',', '.') }}</td>

                                    <td>{{ $item->diskon }}%</td>
                                    <td>{{ number_format($item->harga_bayar, 0, ',', '.') }}</td>

                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleEdit{{ $item->id }}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleHapus{{ $item->id }}">
                                            Hapus
                                        </button>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="exampleEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $data['title'] }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-material" method="post" action="{{ route('penjualan.update', $item->id) }}">
                                                            @csrf
                                                            @method('PUT');

                                                            <div class="form-group form-primary">
                                                                <input type="text" name="kode" class="form-control fill" required value="{{ $item->kode_transaksi }}">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Kode Transaksi</label>
                                                                <small>Masukan kode transaksi yang sudah ada seblumnya agar tidak terjadi error</small>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <select name="id_produk" id="" class="form-control fill" required>
                                                                    <option value="{{ $item->id_produk }}"></option>
                                                                    @foreach ($data['produk'] as $pr )
                                                                    <option value="{{ $pr->id }}">{{ $pr->nama_produk }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Produk</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="number" name="harga" class="form-control fill hargaedit" required id="hargaedit" value="{{ $item->harga }}" data-id={{ $item->id }}>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Harga</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="number" name="qty" class="form-control fill qtyedit" required id="qtyedit" value="{{ $item->qty }}" data-id={{ $item->id }}>

                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Qty</label>
                                                            </div>


                                                            <div class="form-group form-primary">
                                                                <input type="number" name="total_harga" id="totalhargaedit" class="form-control fill totalhargaedit" readonly value="{{ $item->total }}" required data-id={{ $item->id }}>

                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Total Harga</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="number" name="diskon" class="form-control fill diskonedit" required id="diskonedit" value="{{ $item->diskon }}" data-id={{ $item->id }}>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Diskon</label>
                                                                <small>Masukan angka diskon tanpa tanda %</small>
                                                            </div>
                                                            <div class="form-group form-primary">
                                                                <input type="number" name="harga_bayar" class="form-control fill hargabayaredit" value="{{ $item->harga_bayar }}" required id="hargabayaredit" data-id={{ $item->id }}>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Harga bayar</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="date" name="tgl" value="{{ $item->tanggal }}" class="form-control fill" required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Tanggal Transaksi</label>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- end edit --}}

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="exampleHapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-material" method="post" action="{{ route('penjualan.delete', $item->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <h5 class="text-center text-danger fw-bold"> ☹ Opps</h5>

                                                            <h6 class="text-center">Apakah anda ingin hapus data ini ?</h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary w-100 btn-sm" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger w-100 btn-sm">Hapus</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- end hapus --}}




                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
        <!-- Page-body end -->
    </div>
</div>


@endsection
