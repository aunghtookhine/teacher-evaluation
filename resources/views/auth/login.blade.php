@extends('layouts.app')

@section('content')
    <div class="container rounded w-75" style="height: 500px; background-color: #ffffff">
        <div class="row h-100">
            <div class="col-6 my-auto">
                <img src="{{ asset('img/login.jpg') }}">
            </div>
            <div class="col-6 p-3 d-flex justify-content-center align-item-center">
                <form method="POST" action="{{ route('login') }}"
                    class="d-flex justify-content-center align-item-center flex-column">
                    @csrf

                    <img src="{{ asset('img/logo.png') }}" alt="" class="mx-auto mb-4" width="100px">

                    <h2 class="mb-3">Sign in to your account</h2>

                    <div class="row mb-3">
                        <div class="col-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn btn-color w-100">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
