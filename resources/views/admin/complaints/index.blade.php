@extends('admin.inc.master')
@section('title' , 'Compalints')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Compalints</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('admin.complaints.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>  Add New Compalint
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
                        <th class="text-center">Doctor Name</th>
                        <th class="text-center">Patient Name</th>
                        <th class="text-center">Complaint</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($complaints as $complaint)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $complaint->doctor->name }}</td>
                            <td class="text-center">{{ $complaint->patient->first_name . ' ' . $complaint->patient->last_name }}</td>
                            <td class="text-center">{{ $complaint->complaint }}</td>
                            <td class="text-center">
                                @if ($complaint->status == 'new')
                                    <span class="badge badge-primary">New</span>
                                @elseif ($complaint->status == 'in_progress')
                                    <span class="badge badge-warning">In Progress</span>
                                @elseif ($complaint->status == 'closed')
                                    <span class="badge badge-success">Closed</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.complaints.edit', $complaint) }}" class="btn btn-success">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.complaints.destroy', $complaint ) }}" method="POST" class="d-inline">
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
              <div class="card-footer clearfix">{{ $complaints->links() }}</div>
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

