@extends('admin.inc.master')
@section('title', 'User Schedules')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edit User Schedule</h3>
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

      <form action="{{ route('admin.user-schedules.update' , $user_schedule) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="user_id">User Name</label>
                <select class="form-control" name="user_id">
                    <option disabled selected>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user_schedule->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="shift_day">Shift Day</label>
                <select class="form-control" name="shift_day">
                    <option disabled selected>Select Shift Day</option>
                    <option value="Saturday" {{ $user_schedule->shift_day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ $user_schedule->shift_day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                    <option value="Monday" {{ $user_schedule->shift_day == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $user_schedule->shift_day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $user_schedule->shift_day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ $user_schedule->shift_day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $user_schedule->shift_day == 'Friday' ? 'selected' : '' }}>Friday</option>
                </select>
                @error('shift_day')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" class="form-control" name="start_time" value="{{ $user_schedule->start_time }}">
                @error('start_time')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" class="form-control" name="end_time" value="{{ $user_schedule->end_time }}">
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
