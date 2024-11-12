@extends('admin.inc.master')
@section('title' , 'Add Role')
@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            / <a href="{{ route('admin.roles.index') }}">Roles</a>
                            / Add Role
                        </h3>
                    </div>
                    @include('admin.inc._message')
                    <div class="card-body">
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control form-control" type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Permissions</label>
                                <div class="" style="width: 100%; display: flex; justify-content: space-between; flex-wrap: wrap;">
                                    @foreach ($permissions as $permission)
                                    <label style="width:220px;">
                                            <input id="{{ $permission->id }}" type="checkbox" name="groups[]"
                                                value="{{ $permission->id }}" data-parsley-multiple="groups" >
                                            <span class="cr-styled">
                                                <i class="cr-icon ic ofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            {{ $permission['name'] }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
@endsection
