@extends('admin.inc.master')
@section('title' , 'Add Doctor')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Doctor</h3>
        </div>
        <div class="card-body">
            @include('admin.inc._message')
            <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Row 1 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="user_id">User Name</label>
                        <select class="form-control select2" name="user_id">
                            <option disabled selected>Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="speciality">Speciality</label>
                        <input class="form-control" type="text" name="speciality" value="{{ old('speciality') }}">
                        @error('speciality')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="experience_years">Experience Years</label>
                        <input class="form-control" type="text" name="experience_years" value="{{ old('experience_years') }}">
                        @error('experience_years')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" name="bio">{{ old('bio') }}</textarea>
                        @error('bio')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button Row -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>


</div>
@endsection
