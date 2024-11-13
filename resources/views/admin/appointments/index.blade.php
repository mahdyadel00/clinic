@extends('admin.inc.master')

@section('title', 'Appointments')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Patients Table Card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Appointments
                        </h3>
                    </div>

                    <!-- Add Patient Button and Messages -->
                    <div class="card-body">
                        @can('create_appointment')
                            <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i> Add Appointment
                            </a>
                        @endcan
                        @include('admin.inc._message')

                        <!-- Patients Table -->
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th style="width: 10px">#</th>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Appointment Date</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($appointments as $appointment)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $appointment->doctor->user->name }}</td>
                                <td>{{ $appointment->patient->user->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M, Y') }}</td>
                                <td>{{ $appointment->description }}</td>
                                <td>
                                    @if ($appointment->status == 'pending')
                                        <span class="badge badge-warning">{{ $appointment->status }}</span>
                                    @elseif ($appointment->status == 'approved')
                                        <span class="badge badge-success">{{ $appointment->status }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $appointment->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @can('edit_appointment')
                                        <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-success">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete_appointment')
                                        <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No Patients Found</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="card-footer clearfix">
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
