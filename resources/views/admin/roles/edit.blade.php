@extends('admin.inc.master')
@section('title' , 'Edit Role')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            / <a href="{{ route('admin.users.index') }}">Users</a>
            / Edit User
        </h3>
        </div>
        <div class="card-body">
            @include('admin.inc._message')
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control form-control" type="text" name="name" value="{{ $role->name }}">
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
                                    value="{{ $permission->id }}" data-parsley-multiple="groups"
                                    {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <span class="cr-styled">
                                    <i class="cr-icon ic ofont icofont-ui-check txt-primary"></i>
                                </span>
                                {{ $permission['name'] }}
                            </label>
                        @endforeach
                    </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit">
                </div>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>

</div>
@endsection
