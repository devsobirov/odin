@extends('layouts.project')

@section('content')
    <div class="main-content">
        <div class="container mt-4 mt-md-5 mb-6">
            <div class="row text-center text-md-start">

                <div class="col-md-12">
                    <div class="me-auto">
                        <h2>
                            Hello {{ auth()->guard('project')->user()->name }},
                        </h2>
                        <p class="text-gray-600">
                            This is what we've got for you today.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

