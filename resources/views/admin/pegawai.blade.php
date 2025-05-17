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
                            <a href="/pegawai" class="btn btn-info">All</a>
                            @foreach ($data['store'] as $item)
                                <a href="{{ route('pegawai', ['id' => $item->id]) }}"
                                    class="btn btn-info">{{ $item->store }}</a>
                            @endforeach


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
                                                action="{{ route('pegawai.create') }}">
                                                @csrf
                                                <div class="form-group form-primary">
                                                    <input type="text" name="nama" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Nama</label>

                                                </div>

                                                <div class="form-group form-primary mt-3">
                                                    <select class="form-control" name="jenis_kelamin" required>
                                                        <option></option>
                                                        <option>Laki-Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Jenis Kelamin</label>

                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="number" name="nowa" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">No Whatsapp</label>

                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="number" name="nik" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Nik</label>

                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="text" name="email" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Email</label>

                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="date" name="tgl_masuk" class="form-control fill"
                                                        placeholder="Tanggal masuk" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Tanggal Masuk</label>

                                                </div>

                                                <div class="form-group form-primary">
                                                    <select name="id_store" id="" class="form-control fill"
                                                        required>
                                                        <option value="">-- Pilih Store -- </option>
                                                        @foreach ($data['store'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->store }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Store</label>
                                                </div>


                                                <div class="form-group form-primary">
                                                    <textarea class="form-control" name="alamat" required></textarea>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Alamat</label>
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
                                        <th>Nama</th>
                                        <th>Nik</th>
                                        <th>No Wa</th>
                                        <th>Store</th>
                                        <th>Foto</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data['pegawai'] as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->nowa }}</td>
                                            <td>{{ $item->store->store }}</td>
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
                                                                    action="{{ route('pegawai.update', $item->id) }}">
                                                                    @csrf
                                                                    @method('PUT');

                                                                    <div class="form-group form-default form-static-label">
                                                                        <input type="text" name="nama"
                                                                            class="form-control fill"
                                                                            value="{{ $item->nama }}" required>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Nama</label>
                                                                    </div>

                                                                    <div class="form-group form-primary mt-3">
                                                                        <select class="form-control fill"
                                                                            name="jenis_kelamin" required>
                                                                            <option>{{ $item->jenis_kelamin }}</option>
                                                                            <option>Laki-Laki</option>
                                                                            <option>Perempuan</option>
                                                                        </select>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Jenis Kelamin</label>

                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <input type="number" name="nowa"
                                                                            class="form-control fill" required
                                                                            value="{{ $item->nowa }}">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">No Whatsapp</label>

                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <input type="number" name="nik"
                                                                            class="form-control fill" required
                                                                            value="{{ $item->nik }}">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Nik</label>

                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <input type="text" name="email"
                                                                            class="form-control fill" required
                                                                            value="{{ $item->email }}">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Email</label>

                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <input type="datetime" name="tgl_masuk"
                                                                            class="form-control fill" required
                                                                            value="{{ $item->tgl_masuk }}">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Tanggal Masuk</label>
                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <select name="id_store" id=""
                                                                            class="form-control fill" required>
                                                                            <option value="{{ $item->store->id }}">
                                                                                {{ $item->store->store }}
                                                                            </option>
                                                                            @foreach ($data['store'] as $item)
                                                                                <option value="{{ $item->id }}">
                                                                                    {{ $item->store }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Store</label>
                                                                    </div>

                                                                    <div class="form-group form-primary">
                                                                        <textarea class="form-control fill" name="alamat" required>{{ $item->alamat }}</textarea>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Alamat</label>
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
                                                                    action="{{ route('pegawai.delete', $item->id) }}">
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
