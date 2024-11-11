@extends('admin.inc.master')
@section('title' , 'Add New Price List')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"> Add New Price List</h3>
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

            <form action="{{ route('admin.price_lists.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="service_name">Service Name</label>
                    <input class="form-control" type="text" name="service_name">
                    @error('service_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price">
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                    @error('description')
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
