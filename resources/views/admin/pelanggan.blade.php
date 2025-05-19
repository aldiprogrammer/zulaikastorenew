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
                        <a href="" class="btn btn-danger"><i class="fas fa-file text-white"></i> Export PDF</a>
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
                                        <form class="form-material" method="post" action="{{ route('pelanggan.create') }}">
                                            @csrf
                                            
                                            <div class="form-group form-primary">
                                                <input type="text" name="kode" class="form-control fill" readonly required value="{{ $data['kode'] }}">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Kode</label>
                                            </div>

                                            <div class="form-group form-primary">
                                                <input type="text" name="nama" class="form-control" required>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Nama</label>
                                            </div>

                                            <div class="form-group form-primary">
                                                <input type="number" name="nik" class="form-control" required>
                                                <span class="form-bar"></span>
                                                <label class="float-label">NIK</label>
                                                @error('nik')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group form-primary">
                                                <select name="jk" class="form-control fill" id="" required>
                                                    <option> -- Pilih jenis kelamin --</option>
                                                    <option>Laki-Laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Jenis Kelamin</label>
                                            </div>

                                            <div class="form-group form-primary">
                                               <textarea name="alamat" id="" class="form-control" required>
                                               </textarea>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Alamat Pelanggan</label>
                                            </div>

                                            <div class="form-group form-primary">
                                                <input type="number" name="no_telp" class="form-control" required>
                                                <span class="form-bar"></span>
                                                <label class="float-label">No Telp</label>
                                                @error('no_Telp')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>

                                            <div class="form-group form-primary">
                                                <input type="date" name="tgl_daftar" class="form-control fill" required>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tanggal Daftar</label>
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
                @if ($errors->any())
                <div class="container mt-4">
                    <div class="alert alert-danger" role="alert">
                        <div class="text-danger fw-bold">Mohon maaf tambah pelanggan gagal, masukan data dengan benar</div>
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Nik</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Tlp</th>
                                    <th>Alamat</th>
                                    <th>Tgl Daftar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($data['pelanggan'] as $item )
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->kode_pelanggan }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{$item->tgl_daftar }}</td>

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
                                                        <form class="form-material" method="post" action="{{ route('pelanggan.update', $item->id) }}">
                                                            @csrf
                                                            @method('PUT');

                                                            <div class="form-group form-primary">
                                                                <input type="text" name="kode" class="form-control fill" value="{{ $item->kode_pelanggan }}" readonly required value="{{ $data['kode'] }}">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Kode</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="text" name="nama" class="form-control fill" value="{{ $item->nama }}" required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Nama</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="number" name="nik" class="form-control fill" value="{{ $item->nik }}" required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">NIK</label>
                                                                @error('nik')
                                                                <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <select name="jk" class="form-control fill" id="" required>
                                                                    <option>{{ $item->jenis_kelamin }}</option>
                                                                    <option>Laki-Laki</option>
                                                                    <option>Perempuan</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Jenis Kelamin</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <textarea name="alamat" id="" class="form-control fill" required>{{ $item->alamat }}</textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Alamat Pelanggan</label>
                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="number" name="no_telp" value="{{ $item->no_telp }}" class="form-control fill" required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">No Telp</label>
                                                                @error('no_Telp')
                                                                <small class="text-danger">{{ $message }}</small>
                                                                @enderror

                                                            </div>

                                                            <div class="form-group form-primary">
                                                                <input type="date" name="tgl_daftar" value="{{ $item->tgl_daftar }}" class="form-control fill" required>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Tanggal Daftar</label>
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
                                                        <form class="form-material" method="post" action="{{ route('pelanggan.delete', $item->id) }}">
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

