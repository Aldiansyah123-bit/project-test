@extends('layouts.app')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Permissions</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                </div>
            </div>
                <div class="container">
                    <div class="justify-content-center">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">Permission
                                @can('role-create')
                                    <span class="float-right">
                                        <a class="btn btn-primary" href="{{ route('permissions.index') }}">Back</a>
                                    </span>
                                @endcan
                            </div>
                            <div class="card-body">
                                <div class="lead">
                                    <strong>Name:</strong>
                                    {{ $permission->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
