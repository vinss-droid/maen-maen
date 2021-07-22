@extends('layout.asset')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary text-center">Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus">
                                        <div class="text-danger text-small">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlTextarea1" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <div class="text-danger text-small">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput1" name="password" required autocomplete="new-password">
                                        <div class="text-danger text-small">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="password_confirmation" required autocomplete="new-password">
                                        <div class="text-danger text-small">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
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