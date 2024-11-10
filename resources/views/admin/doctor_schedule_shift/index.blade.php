@extends('admin.inc.master')
@section('title' , 'Doctor Schedule Shifts')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Doctor Schedule Shifts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('admin.doctor-schedule-shifts.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>  Add New Doctor Schedule Shift
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
                        <th class="text-center">Shift Day</th>
                        <th class="text-center">Start Time</th>
                        <th class="text-center">End Time</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($doctorScheduleShifts as $doctorScheduleShift)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $doctorScheduleShift->doctor->name }}</td>
                            <td class="text-center">{{ $doctorScheduleShift->shift_day }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($doctorScheduleShift->start_time)->format('h:i A') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($doctorScheduleShift->end_time)->format('h:i A') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.doctor-schedule-shifts.edit', $doctorScheduleShift) }}" class="btn btn-success">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.doctor-schedule-shifts.destroy', $doctorScheduleShift ) }}" method="POST" class="d-inline">
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
              <div class="card-footer clearfix">{{ $doctorScheduleShifts->links() }}</div>
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

