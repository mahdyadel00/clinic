@extends('admin.inc.master')
@section('title', 'Edit Waiting Reservation')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edit Waiting Reservation</h3>
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

      <form action="{{ route('admin.waiting_reservations.update' , $waiting_reservation) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="patient_id">Patient Name</label>
                <select class="form-control" name="patient_id">
                    <option disabled selected>Select Patient Name</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $waiting_reservation->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->first_name . ' ' . $patient->last_name }}</option>
                    @endforeach
                </select>
                @error('patient_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="doctor_id">Doctor Name</label>
                <select class="form-control" name="doctor_id">
                    <option disabled selected>Select Doctor Name</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ $waiting_reservation->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('doctor_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="room_id">Room Name</label>
                <select class="form-control" name="room_id">
                    <option disabled selected>Select Room Name</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ $waiting_reservation->room_id == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                    @endforeach
                </select>
                @error('room_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="reservation_time">Reservation Time</label>
                <input type="datetime-local" name="reservation_time" class="form-control" value="{{ \Carbon\Carbon::parse($waiting_reservation->reservation_time)->format('Y-m-d\TH:i') }}">
                @error('reservation_time')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option disabled selected>Select Status</option>
                    <option value="waiting" {{ $waiting_reservation->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                    <option value="canceled" {{ $waiting_reservation->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    <option value="done" {{ $waiting_reservation->status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
                @error('status')
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
