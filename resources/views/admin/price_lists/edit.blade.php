@extends('admin.inc.master')
@section('title', 'Edit Price List')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Edit Price List</h3>
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

      <form action="{{ route('admin.price_lists.update' , $price_list) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="service_name">Service Name</label>
                <input class="form-control" type="text" name="service_name" value="{{ $price_list->service_name }}">
                @error('service_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="price">Price</label>
                <input class="form-control" type="text" name="price" value="{{ $price_list->price }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
                <textarea class="form-control" name="description">{{ $price_list->description }}</textarea>
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
