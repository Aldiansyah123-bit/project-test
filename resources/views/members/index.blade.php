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
                        <h2 class="content-header-title float-left mb-0">Modul Members</h2>
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
                                            Create Member
                                        </button>
                                    @endcan
                                    @can('role-import')
                                        <button type="button" class="btn btn-outline-warning mr-1 mb-1" data-toggle="modal" data-target="#ImportAdd">
                                            Import Member
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
                                                    <th>Group</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Profile</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $member)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $member->group->name }}</td>
                                                    <td>{{ $member->name }}</td>
                                                    <td>{{ $member->address }}</td>
                                                    <td>{{ $member->phone }}</td>
                                                    <td>{{ $member->email }}</td>
                                                    <td>{{ $member->profile }}</td>
                                                    <td>
                                                        @can('role-edit')
                                                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success mr-1 mb-1" data-toggle="modal" data-target="#Update{{ $member->id }}"><i class="feather icon-edit"></i></button>
                                                        @endcan
                                                        @can('role-delete')
                                                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-danger mr-1 mb-1" data-toggle="modal" data-target="#Delete{{ $member->id }}"><i class="feather icon-trash"></i></button>
                                                        @endcan
                                                    </td>
                                                    @include('members.modal')
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
                <h5 class="modal-title" id="exampleModalLongTitle">Input Modul Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Modul Group <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="select2 form-control" name="group_id" >
                                    @foreach ($group as $j)
                                        <option value="{{ $j->id }}">
                                            {{ $j->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Nama <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Nama" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Alamat <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="address" placeholder="Alamat" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>HP <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="number" name="phone" placeholder="HP" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Email <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Profile <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <textarea type="text" cols="5" name="profile" placeholder="Profile" class="form-control"></textarea>
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

<div class="modal fade text-left" id="ImportAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Import Modul Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import.member') }}" method="POST" enctype="multipart/form-data">
                {{-- {{ csrf_field() }} --}}
                @csrf
                <div class="modal-body">
                    <label>File <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="file" name="file" placeholder="File" class="form-control" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
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
