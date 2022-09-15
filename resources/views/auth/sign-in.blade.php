@extends('layouts.guest')

@section('content')
    <section class="container text-center py-5 py-md-6 py-xl-8">
        <h3><a href="{{ route('home') }}" class="text-capitalize text-secondary text-decoration-none">O D I N</a></h3>

        <h4 class="font-weight-normal text-dark mt-5">
            Log in to your account
        </h4>

        <div class="row justify-content-center mt-4 pt-3">
            <div class="col-md-6 col-lg-4">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="login" placeholder="Login" value="{{ old('login') }}" class="@error('login') is-invalid @enderror form-control form-control-lg bg-pastel-darkblue">
                        @error('login') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror form-control form-control-lg bg-pastel-darkblue">
                        @error('password') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                    <input type="submit" class="btn btn-primary btn-lg shadow-light text-uppercase-bold-sm hover-lift mt-4" value="Sign in">

                    <div class="text-secondary font-size-sm mt-5">
                        <a href="#">Login with Pin</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
