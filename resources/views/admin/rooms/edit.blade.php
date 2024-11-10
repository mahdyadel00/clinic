@extends('admin.inc.master')
@section('title', 'Edit Room')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edit Room</h3>
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

      <form action="{{ route('admin.rooms.update' , $room) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="name">Room Name</label>
                <input type="text" class="form-control" name="name" value="{{ $room->name }}">
              @error('name')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="type">Room Type</label>
              <select class="form-control" name="type">
                  <option disabled selected>Select Room Type</option>
                  <option value="General" {{ $room->type == 'General' ? 'selected' : '' }}>General</option>
                  <option value="VIP" {{ $room->type == 'VIP' ? 'selected' : '' }}>VIP</option>
                  <option value="ICU" {{ $room->type == 'ICU' ? 'selected' : '' }}>ICU</option>
                  <option value="OT" {{ $room->type == 'OT' ? 'selected' : '' }}>OT</option>
              </select>
              @error('type')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Room Status</label>
              <select class="form-control" name="status">
                  <option disabled selected>Select Room Status</option>
                  <option value="1" {{ $room->status == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ $room->status == 0 ? 'selected' : '' }}>Inactive</option>
              </select>
              @error('status')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description">{!! $room->description !!}</textarea>
              @error('description')
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
