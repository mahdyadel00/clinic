@extends('admin.inc.master')
@section('title' , 'Price List')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Price List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('admin.price_lists.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>  Add New Price List
                </a>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th class="text-center">Service Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($price_lists as $price_list)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $price_list->service_name }}</td>
                            <td class="text-center">{{ $price_list->price }}</td>
                            <td class="text-center">{{ $price_list->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.price_lists.edit', $price_list) }}" class="btn btn-success">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.price_lists.destroy', $price_list ) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Doctor Schedule Shifts Found</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">{{ $price_lists->links() }}</div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

