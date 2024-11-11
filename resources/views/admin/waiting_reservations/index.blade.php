@extends('admin.inc.master')
@section('title' , 'Waiting Reservations')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Waiting Reservations</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('admin.waiting_reservations.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>  Add New Waiting Reservation
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
                        <th class="text-center">Patient Name</th>
                        <th class="text-center">Doctor Name</th>
                        <th class="text-center">Room Name</th>
                        <th class="text-center">Reservation Time</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($waiting_reservations as $waiting_reservation)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $waiting_reservation->patient->first_name . ' ' . $waiting_reservation->patient->last_name }}</td>
                            <td class="text-center">{{ $waiting_reservation->doctor->name }}</td>
                            <td class="text-center">{{ $waiting_reservation->room->name }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($waiting_reservation->reservation_time)->format('d-m-Y h:i A') }}</td>
                            <td class="text-center">
                                @if ($waiting_reservation->status == 'waiting')
                                    <span class="badge badge-warning">{{ $waiting_reservation->status }}</span>
                                @elseif ($waiting_reservation->status == 'cancelled')
                                    <span class="badge badge-danger">{{ $waiting_reservation->status }}</span>
                                @else
                                    <span class="badge badge-success">{{ $waiting_reservation->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.waiting_reservations.edit', $waiting_reservation) }}" class="btn btn-success">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.waiting_reservations.destroy', $waiting_reservation ) }}" method="POST" class="d-inline">
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
              <div class="card-footer clearfix">{{ $waiting_reservations->links() }}</div>
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

