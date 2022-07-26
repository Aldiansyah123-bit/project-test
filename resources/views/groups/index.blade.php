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
                        <h2 class="content-header-title float-left mb-0">Modul Group</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    @can('role-create')
                                        <button type="button" class="btn btn-outline-primary mr-1 mb-1" data-toggle="modal" data-target="#CreateAdd">
                                            Create Group
                                        </button>
                                    @endcan
                                    @if (\Session::has('success'))
                                        <div class="alert alert-success">
                                            <p>{{ \Session::get('success') }}</p>
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>City</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $group)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $group->name }}</td>
                                                    <td>{{ $group->city }}</td>
                                                    <td>
                                                        @can('role-edit')
                                                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success mr-1 mb-1" data-toggle="modal" data-target="#Update{{ $group->id }}"><i class="feather icon-edit"></i></button>
                                                        @endcan
                                                        @can('role-delete')
                                                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-danger mr-1 mb-1" data-toggle="modal" data-target="#Delete{{ $group->id }}"><i class="feather icon-trash"></i></button>
                                                        @endcan
                                                    </td>
                                                    @include('groups.modal')
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
        </div>
    </div>
</div>
<!-- END: Content-->
<div class="modal fade" id="CreateAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Input Modul Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nama <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Kota <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="city" placeholder="Kota" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
