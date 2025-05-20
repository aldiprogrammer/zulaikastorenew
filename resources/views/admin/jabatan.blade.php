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
                                                action="{{ route('jabatan.create') }}">
                                                @csrf
                                                <div class="form-group form-primary">
                                                    <input type="text" name="jabatan" class="form-control" required>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Jabatan</label>
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
                                        <th>Jabatan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data['jabatan'] as $item)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->jabatan }}</td>
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
                                                <div class="modal fade" id="exampleEdit{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    {{ $data['title'] }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-material" method="post"
                                                                    action="{{ route('jabatan.update', $item->id) }}">
                                                                    @csrf
                                                                    @method('PUT');

                                                                    <div class="form-group form-default form-static-label">
                                                                        <input type="text" name="jabatan"
                                                                            class="form-control fill"
                                                                            value="{{ $item->jabatan }}" required>
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Jabatan</label>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Edit</button>
                                                            </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- end edit --}}

                                                <!-- Modal edit -->
                                                <div class="modal fade" id="exampleHapus{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    action="{{ route('jabatan.delete', $item->id) }}">
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
