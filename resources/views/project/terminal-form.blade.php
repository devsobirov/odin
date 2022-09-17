@extends('layouts.project')

@section('content')
    <div class="main-content">
        <div class="container mt-4 pt-2 mb-6">
            <!-- header -->
            <div class="d-md-flex align-items-center justify-content-between">
                <h3 class="mb-3 mb-md-0">
                    {{ $terminal->exists ? 'Edit '.$terminal->title : 'Create terminal' }}
                </h3>
                <a href="{{ route('project.terminals.index') }}" class="btn btn-purple hover-lift-light shadow-light-sm">
                  <span class="svg-icon svg-icon-sm text-white me-1">
                    All terminals
                  </span>
                </a>
            </div>

            <div class="card border border-gray-100 mt-4">
                <div class="card-body">
                    <form class="row" method="POST" action="{{ route('project.terminals.save', ['id' => $terminal->id]) }}">
                        @csrf
                        <div class="col-lg-6 col-sm-12 mb-3 px-2">
                            <label class="form-label" for="title">Title for terminal</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" required
                                   name="title" value="{{$terminal->title ? $terminal->title : old('title')}}" placeholder="Terminal №1">
                            @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3 px-2">
                            <label class="form-label" for="login">Login</label>
                            <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" required
                                   name="login" value="{{$terminal->login ? $terminal->login : old('login')}}" minlength="6"
                                   placeholder="Allowed: letters, numbers,-,_,  without space: example_123">
                            @error('login')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3 px-2">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                   @if(!$terminal->exists) required @endif name="password" placeholder="At least: 1 uppercase, 1 lowercase, 1 number; Minlength: 6">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3 px-2">
                            <label class="form-label" for="password_confirmation">Repeat password for confirmation</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
                                   @if(!$terminal->exists) required @endif name="password_confirmation" placeholder="repeat password">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-3 px-2">
                            <label class="form-label" for="title">Pincode</label>
                            <input type="number" class="form-control @error('pincode') is-invalid @enderror" id="pincode" minlength="6" maxlength="6"
                                   name="pincode" value="{{$terminal->pincode ? $terminal->pincode : old('pincode')}}" placeholder="6 digits">
                            @error('pincode')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-purple hover-lift-light shadow-light-sm">
                                {{ $terminal->exists ? 'Save Changes' : 'Create' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
