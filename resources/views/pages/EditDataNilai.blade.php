@extends('layout.template')
@section('title', 'Edit Data Nilai')
@section('content')

<h1 class="h3 mb-2 text-gray-800">Edit Data Nilai Yang Belum Tuntas</h1>

<a href="/data/nilai" class="btn btn-primary mt-4">Kembali</a>

<div class="row mt-4">

    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Nilai</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form action="/data/nilai/{{ $nilai->id }}" method="POST">
                      @csrf
                      @method('PUT')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NIS Siswa</label>
                            <input type="number" class="form-control @error('nis')is-invalid @enderror" id="exampleFormControlInput1" name="nis" value="{{ $nilai->nis }}">
                            @error('nis')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control @error('nama')is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="nama" value="{{ $nilai->nama }}">
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
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" name="mapel[]" type="checkbox" value="PJOK" id="PJOK">
                                        <label class="form-check-label" for="PJOK">
                                        PJOK
                                        </label>
                                    </div>
                                    <div class="form-check ml-3">
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
                        <select name="semester" id="" class="form-select">
                            {{-- <option class="form-select" selected>0</option>
                            <option value="1" class="form-select">1</option>
                            <option value="2" class="form-select">2</option> --}}
                            <option value="{{ $nilai->semester }}" class="form-select" selected>{{ $nilai->semester }}</option>
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
                                    <option value="Progres" class="form-select">Progres</option>
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
@endsection