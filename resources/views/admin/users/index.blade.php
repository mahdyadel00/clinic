@extends('admin.inc.master')
@section('title' , 'Users')
@section('content')
<!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Uses</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>  Add User
                </a>
                @include('admin.inc._message')
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone</th>
                      <th class="text-center">Role</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->phone }}</td>
                            <td class="text-center">{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user ) }}" class="btn btn-success">
                                    <i class="far fa-edit"></i>
                                </a>

                                @if (!(auth()->user()->id == $user->id))
                                <form action="{{ route('admin.users.destroy', $user ) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">
                                      <i class="far fa-trash-alt"></i>
                                  </button>
                                </form>

                                @endif

                            </td>
                        </tr>
                    @empty
                        <p>there is no data</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{-- <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul> --}}
                {{ $users->links() }}
              </div>
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

