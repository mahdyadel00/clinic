@extends('admin.inc.master')
@section('title' , 'Edit Appointment')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Appointment</h3>
        </div>
        <div class="card-body">
            @include('admin.inc._message')
            <form action="{{ route('admin.appointments.update' , $appointment) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Row 1 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="doector_id">Doctor</label>
                        <select class="form-control select2" name="doctor_id">
                            <option disabled selected>Select Doctor</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->user->name }}</option>
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
                                <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->user->name }}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="appointment_date">Appointment Date</label>
                        <input type="date" class="form-control" name="appointment_date" value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}">
                        @error('appointment_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected>Select Status</option>
                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $appointment->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $appointment->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
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
                        <textarea class="form-control" name="description">{{ $appointment->description }}</textarea>
                        @error('description')
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
