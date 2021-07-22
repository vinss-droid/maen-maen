@extends('layout.template')
@section('title', 'Data Jurnal')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Jurnal XII RPL 2</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

@if (session('success'))
    <div class="row mt-4" aria-hidden="true">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses Menambahkan Data Jurnal !</strong>
                {{-- <span aria-hidden="true">×</span> --}}
            </div>
        </div>
    </div>
@endif

@if (session('berhasil'))
    <div class="row mt-4" aria-hidden="true">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Update Data Jurnal !</strong>
                {{-- <span aria-hidden="true">×</span> --}}
            </div>
        </div>
    </div>
@endif

@if (session('delete'))
    <div class="row mt-4" aria-hidden="true">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Di Hapus !</strong>
                {{-- <span aria-hidden="true">×</span> --}}
            </div>
        </div>
    </div>
@endif

<div class="row mt-4">

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jurnal</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form action="/data/jurnal/insert" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NIS Siswa</label>
                            <input type="number" class="form-control @error('nis') is-invalid @enderror" id="exampleFormControlInput1" name="nis" value="{{ old('nis') }}">
                            <div class="text-danger text-small">
                                @error('nis')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama Siswa</label>
                            <input type="tex" class="form-control @error('nama') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="nama" value="{{ old('nama') }}">
                            <div class="text-danger text-small">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="progres" class="form-label">status</label>
                            <select name="status" id="progres" required>
                                <option value="{{ old('status') }}" class="form-select" selected>{{ old('status') }} - </option>
                                <option value="Progres" class="form-select">Progres</option>
                                <option value="Selesai" class="form-select">Selesai</option>
                                <option value="Tuntas" class="form-select">Tuntas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Jurnal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Create At</th>
                            <th>Update At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($jurnal as $d)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->nis }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->updated_at }}</td>
                                @if ($d->status == 'Progres')
                                    <td>
                                        <div class="badge badge-warning badge-pill mt-2 ml-3">
                                            {{ $d->status }}
                                        </div>
                                    </td>
                                @elseif($d->status == 'Selesai')
                                        <td>
                                            <div class="badge badge-info badge-pill mt-2 ml-3">
                                                {{ $d->status }}
                                            </div>
                                        </td>
                                @elseif($d->status == 'Tuntas')
                                        <td>
                                            <div class="badge badge-success badge-pill mt-2 ml-3">
                                                {{ $d->status }}
                                            </div>
                                        </td>
                                @endif
                                <td>
                                    <div class="input-group justify-content-center">
                                        <a href="/data/jurnal/{{ $d->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm ml-1" data-toggle="modal" data-target="#ModalDelete">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($jurnal as $d)

        <!-- Logout Modal-->
        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus Data ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan !!</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="/data/jurnal/delete/{{ $d->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection