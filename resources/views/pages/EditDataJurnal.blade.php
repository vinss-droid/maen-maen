@extends('layout.template')
@section('title', 'Data Jurnal')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Jurnal <strong>{{ ucwords($jurnal->nama) }}</strong></h1>
    <a href="/data/jurnal" class="btn btn-primary mt-4">Kembali</a>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}
{{-- 
@if (session('success'))
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Suksek Menambahkan Data Jurnal !</strong>
            </div>
        </div>
    </div>
@endif --}}

<div class="row mt-3">

    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Jurnal</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form action="/data/jurnal/{{ $jurnal->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NIS Siswa</label>
                            <input type="number" class="form-control @error('nis') is-invalid @enderror" id="exampleFormControlInput1" name="nis" value="{{ $jurnal->nis }}">
                            <div class="text-danger text-small">
                                @error('nis')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama Siswa</label>
                            <input type="tex" class="form-control @error('nama') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="nama" value="{{ $jurnal->nama }}">
                            <div class="text-danger text-small">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 mt-4">
                            <label for="progres" class="form-label">status</label>
                                <select name="status" id="progres">
                                    <option value="{{ $jurnal->status }}" class="form-select" selected>{{ $jurnal->status }}</option>
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
@endsection