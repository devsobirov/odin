@extends('layouts.project')

@section('content')
    <div class="main-content">
        <div class="container mt-4 pt-2 mb-6">
            <!-- header -->
            <div class="d-md-flex align-items-center justify-content-between">
                <h3 class="mb-3 mb-md-0">
                    Terminals
                </h3>
                <a href="{{ route('project.terminals.form') }}" class="btn btn-purple hover-lift-light shadow-light-sm">
                  <span class="svg-icon svg-icon-sm text-white me-1">
                    <x-svg.plus></x-svg.plus> Add terminal
                  </span>
                </a>
            </div>

            <!-- filters -->
            <ul class="nav nav-tabs nav-overflow mt-3 mt-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="companies.html#!">
                        Total:
                        <span class="badge bg-purple rounded-pill ms-1">{{$paginated->total()}}</span>
                    </a>
                </li>
            </ul>

            <!-- report -->
            <div id="companies" class="card mt-4">

                <div class="table-responsive" style="min-height: 200px">
                    <table class="table table-sm card-table table-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Login</th>
                            <th>Last Auth Time</th>
                            <th>Created at</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @forelse($paginated as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td> {{$item->login}} </td>
                                <td class="fs-sm text-muted">{{$item->visitedAt()}}</td>
                                <td class="fs-sm text-muted">{{ $item->created_at->format("M/d/Y") }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="svg-icon text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-f</title><circle cx="256" cy="256" r="32" style="fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px"></circle><circle cx="416" cy="256" r="32" style="fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px"></circle><circle cx="96" cy="256" r="32" style="fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px"></circle></svg>
                                      </span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('project.terminals.form', ['id' => $item->id]) }}">Edit</a>
                                            <a class="dropdown-item text-danger" href="#">Remove</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">You have not any terminals</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-center p-0">
                    {{ $paginated->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
