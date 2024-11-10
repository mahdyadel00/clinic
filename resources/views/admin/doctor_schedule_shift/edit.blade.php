@extends('admin.inc.master')
@section('title', 'Edit Doctor Schedule Shift')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edit Doctor Schedule Shift</h3>
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

      <form action="{{ route('admin.doctor-schedule-shifts.update' , $doctorScheduleShift) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="doctor_id">Doctor</label>
                <select class="form-control form-control select2" name="doctor_id">
                    <option disabled selected>Select Doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ $doctor->id == $doctorScheduleShift->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('doctor_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="shift_day">Shift Day</label>
                <select class="form-control" name="shift_day">
                    <option disabled selected>Select Shift Day</option>
                    <option value="Saturday" {{ $doctorScheduleShift->shift_day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ $doctorScheduleShift->shift_day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                    <option value="Monday" {{ $doctorScheduleShift->shift_day == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $doctorScheduleShift->shift_day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $doctorScheduleShift->shift_day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ $doctorScheduleShift->shift_day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $doctorScheduleShift->shift_day == 'Friday' ? 'selected' : '' }}>Friday</option>
                </select>
                @error('shift_day')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" class="form-control" name="start_time" value="{{ $doctorScheduleShift->start_time }}">
                @error('start_time')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" class="form-control" name="end_time" value="{{ $doctorScheduleShift->end_time }}">
                @error('end_time')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
          <br>
          <input class="btn btn-primary" type="submit">
      </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>

</div>
@endsection
