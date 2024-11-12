@extends('admin.inc.master')
@section('title' , 'Edit User')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title"> Edit User Form</h3>
        </div>
        <div class="card-body">

            @include('admin.inc._message')

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control form-control" type="text" name="name" value="{{ $user->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control form-control" type="text" name="email" value="{{ $user->email }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control form-control" type="phone" name="phone" value="{{ $user->phone }}">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
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
