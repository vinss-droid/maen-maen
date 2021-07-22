@extends('layout.asset')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="invalid-feedback text-small">
                                    @error('nis')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="password" required autocomplete="current-password">
                                <div class="invalid-feedback text-small">
                                    @error('nama')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 mt-5">
                                <button class="btn btn-primary form-control">
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