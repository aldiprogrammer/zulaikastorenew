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
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fas fa-plus text-white"></i> Tambah {{ $data['title'] }}
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form {{ $data['title'] }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-material" method="post"
                                                action="{{ route('produk.create') }}">
                                                @csrf

                                                <div class="form-group form-primary">
                                                    <input type="text" value="{{ $data['kode'] }}" name="kode_produk"
                                                        class="form-control fill" readonly required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Kode Produk</label>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="text" name="nama_produk" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Nama Produk</label>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="text" name="ukuran" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Ukuran</label>
                                                </div>


                                                <div class="form-group form-primary">
                                                    <select name="id_kategori" class="form-control fill" id="">
                                                        <option value="">-- Pilih Kategori --</option>
                                                        @foreach ($data['kategori'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Kategori</label>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="number" name="harga_beli" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Harga Beli</label>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="number" name="harga_jual" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Harga Jual</label>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="number" name="diskon" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Diskon</label>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="number" name="stok" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Stok</label>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="date" name="tgl_masuk" class="form-control fill"
                                                        required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Tgl Masuk</label>
                                                </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
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
                                        <th>Produk</th>
                                        <th>Kategori</th>
                                        <th>Ukuran</th>
                                        <th>Stok</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Diskon</th>
                                        <th>Tgl Masuk</th>
                                        <th>Foto</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data['produk'] as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->id_kategori }}</td>
                                            <td>{{ $item->ukuran }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>{{ $item->harga_beli }}</td>
                                            <td>{{ $item->harga_jual }}</td>
                                            <td>{{ $item->diskon }}</td>
                                            <td>{{ $item->tgl_masuk }}</td>
                                            <td>{{ $item->foto }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#exampleEdit{{ $item->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#exampleHapus{{ $item->id }}">
                                                    Hapus
                                                </button>

                                                <!-- Modal edit -->
                                                <div class="modal fade" id="exampleEdit{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    {{ $data['title'] }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-material" method="post"
                                                                    action="{{ route('pengguna.update', $item->id) }}">
                                                                    @csrf
                                                                    @method('PUT');

                                                                    <div class="form-group form-primary">
                                                                        <input type="text" name="username"
                                                                            class="form-control fill"
                                                                            value="{{ $item->username }}" required>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Username</label>
                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <select name="level" class="form-control fill"
                                                                            id="">
                                                                            <option>{{ $item->level }}
                                                                            </option>
                                                                            <option value="kasir">Kasir</option>
                                                                            <option value="admin">Admin</option>
                                                                            <option value="super admin">Super Admin
                                                                            </option>
                                                                        </select>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Level</label>
                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <input type="password" name="password"
                                                                            class="form-control fill">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Password Baru</label>
                                                                        <small>Kosongkan password jika tidak ingin merubah
                                                                            password lama</small>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Edit</button>
                                                            </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- end edit --}}

                                                <!-- Modal edit -->
                                                <div class="modal fade" id="exampleHapus{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-material" method="post"
                                                                    action="{{ route('produk.delete', $item->id) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <h5 class="text-center text-danger fw-bold"> ☹ Opps
                                                                    </h5>

                                                                    <h6 class="text-center">Apakah anda ingin hapus data
                                                                        ini ?</h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-secondary w-100 btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger w-100 btn-sm">Hapus</button>
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
