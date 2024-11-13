@extends('admin.inc.master')
@section('title' , 'Add Appointment')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Appointment</h3>
        </div>
        <div class="card-body">
            @include('admin.inc._message')
            <form action="{{ route('admin.appointments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Row 1 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="doctor_id">Doctor</label>
                        <select class="form-control select2" name="doctor_id">
                            <option disabled selected>Select Doctor</option>
                            @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="patient_id">Patient</label>
                        <select class="form-control select2" name="patient_id">
                            <option disabled selected>Select Patient</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                            @endforeach
                            @error('patient_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </select>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="appointment_date">Appointment Date</label>
                        <input type="date" class="form-control" name="appointment_date" value="{{ old('appointment_date') }}">
                        @error('appointment_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected>Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                        @error('description')
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
