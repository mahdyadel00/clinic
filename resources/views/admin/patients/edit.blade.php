@extends('admin.inc.master')
@section('title' , 'Edit Patient')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Patient Form</h3>
        </div>
        <div class="card-body">
            @include('admin.inc._message')
            <form action="{{ route('admin.patients.update' , $patient) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Row 1 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="user_id">User Name</label>
                        <select class="form-control select2" name="user_id">
                            <option disabled selected>Select User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $patient->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" name="phone" value="{{ $patient->phone }}">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth</label>
                        <input class="form-control" type="date" name="dob" value="{{ \Carbon\Carbon::parse($patient->dob)->format('Y-m-d') }}">
                        @error('dob')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control select2" name="gender">
                            <option disabled selected>Select Gender</option>
                            <option value="1" {{ $patient->gender == 1 ? 'selected' : '' }}>Male</option>
                            <option value="0" {{ $patient->gender == 0 ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address">{!! $patient->address !!}</textarea>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="medical_history">Medical History</label>
                        <textarea class="form-control" name="medical_history">{!! $patient->medical_history !!}</textarea>
                        @error('medical_history')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button Row -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <input class="btn btn-primary" type="submit" value="Edit">
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>


</div>
@endsection
