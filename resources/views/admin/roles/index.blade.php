@extends('admin.inc.master')
@section('title' , 'Roles')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Roles
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @can('create_role')
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>  Add New Role
                    </a>
                @endcan
                @include('admin.inc._message')
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th class="text-center">Role Name</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">
                                @can('edit_role')
                                    <a href="{{ route('admin.roles.edit', $role ) }}" class="btn btn-success">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                                @can('delete_role')
                                    @if (!(auth()->user()->id == $role->id))
                                        <form action="{{ route('admin.roles.destroy', $role ) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">
                                              <i class="far fa-trash-alt"></i>
                                          </button>
                                        </form>
                                    @endif
                                @endcan

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
                {{ $roles->links() }}
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

