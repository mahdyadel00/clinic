@extends('admin.inc.master')
@section('title' , 'Add Patient')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"> Add Patient Form</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.patients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="first_name">First Name</label>
                <input class="form-control form-control" type="text" name="first_name" value="{{ old('first_name') }}">
                @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <br>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input class="form-control form-control" type="text" name="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control form-control" type="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control form-control" type="text" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input class="form-control form-control" type="date" name="dob" value="{{ old('dob') }}">
                    @error('dob')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control form-control select2" name="gender">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                    @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control form-control" name="address">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit">
            </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>

</div>
@endsection
