@extends('layout.template')
@section('title', 'Data Nilai')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Nilai Yang Belum Tuntas</h1>

@if (session('create'))
    <div class="row mt-4" aria-hidden="true">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Di Tambahkan !</strong>
                {{-- <span aria-hidden="true">×</span> --}}
            </div>
        </div>
    </div>
@endif

@if (session('update'))
    <div class="row mt-4" aria-hidden="true">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Di Update !</strong>
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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Nilai</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form action="/data/nilai/insert" method="POST">
                      @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NIS Siswa</label>
                            <input type="number" class="form-control @error('nis')is-invalid @enderror" id="exampleFormControlInput1" name="nis" value="{{ old('nis') }}">
                            @error('nis')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control @error('nama')is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                      <div class="mb-3">
                          <label for="" class="form-label">Mata Pelajaran Yang Belum Tuntas :</label>
                            <div class="row mt-3 mb-4" style="user-select: none">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="Agama" id="Agama">
                                        <label class="form-check-label" for="Agama">
                                        Agama
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="PKN" id="PKN">
                                        <label class="form-check-label" for="PKN">
                                        PKN
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="BASDAT" id="BASDAT">
                                        <label class="form-check-label" for="BASDAT">
                                        BASDAT
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="MTK" id="MTK">
                                        <label class="form-check-label" for="MTK">
                                        MTK
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="Inggris" id="Inggris">
                                        <label class="form-check-label" for="Inggris">
                                        Inggris
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="PKWU" id="PKWU">
                                        <label class="form-check-label" for="PKWU">
                                        PKWU
                                        </label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="PJOK" id="PJOK">
                                        <label class="form-check-label" for="PJOK">
                                        PJOK
                                        </label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="PPL" id="PPL">
                                        <label class="form-check-label" for="PPL">
                                        PPL
                                        </label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="PEMWEB" id="PEMWEB">
                                        <label class="form-check-label" for="PEMWEB">
                                        PEMWEB
                                        </label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="KWU" id="KWU">
                                        <label class="form-check-label" for="KWU">
                                        KWU
                                        </label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="PBO" id="PBO">
                                        <label class="form-check-label" for="PBO">
                                        PBO
                                        </label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="B.indo" id="B.indo">
                                        <label class="form-check-label" for="B.indo">
                                        B.indo
                                        </label>
                                    </div>
                                </div>
                           
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Semester</label>
                        <select name="semester" id="" class="form-select" required>
                            {{-- <option class="form-select" selected>0</option>
                            <option value="1" class="form-select">1</option>
                            <option value="2" class="form-select">2</option> --}}
                            <option value="" class="form-select" selected>-</option>
                            <option value="3" class="form-select">3</option>
                            <option value="4" class="form-select">4</option>
                            {{-- <option value="5" class="form-select">5</option>
                            <option value="6" class="form-select">6</option> --}}
                        </select>
                        @error('semester')
                            {{ $message }}
                        @enderror
                      </div>
                      <div class="mb-3">
                          <label for="progres" class="form-label">status</label>
                          <select name="status" id="progres" required>
                             <option value="" class="form-select" selected>pilih</option>
                             <option value="Progres" class="form-select">Progress</option>
                             <option value="Selesai" class="form-select">Selesai</option>
                             <option value="Tuntas" class="form-select">Tuntas</option>
                          </select>
                      </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Nilai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Mapel Belum Tuntas</th>
                            <th>Semester</th>
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

                        @foreach ($nilai as $d )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->nis }}</td>
                                <td>{{ $d->nama }}</td>
                                <td class="badge-pill badge-primary badge mt-4 ml-2">{{ $d->mapel }}</td>
                                <td>{{ $d->semester }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->updated_at }}</td>
                                @if ($d->status == 'Progres')
                                    <td>
                                        <div class="badge badge-warning badge-pill mt-4 ml-1">
                                            {{ $d->status }}
                                        </div>
                                    </td>
                                @elseif($d->status == 'Selesai')
                                        <td>
                                            <div class="badge badge-info badge-pill mt-4 ml-1">
                                                {{ $d->status }}
                                            </div>
                                        </td>
                                @elseif($d->status == 'Tuntas')
                                        <td>
                                            <div class="badge badge-success badge-pill mt-4 ml-1">
                                                {{ $d->status }}
                                            </div>
                                        </td>
                                @endif
                                <td>
                                    <div class="input-group justify-content-center">
                                        <a href="/data/nilai/{{ $d->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button data-toggle="modal" data-target="#ModalDelete" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @foreach ($nilai as $d)
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
                <form action="/data/nilai/delete/{{ $d->id }}" method="POST">
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