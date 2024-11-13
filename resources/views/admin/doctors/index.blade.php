@extends('admin.inc.master')

@section('title', 'Doctors')

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
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Doctors
                        </h3>
                    </div>

                    <!-- Add Patient Button and Messages -->
                    <div class="card-body">
                        @can('create_doctor')
                            <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i> Add Doctor
                            </a>
                        @endcan
                        @include('admin.inc._message')
                        <!-- Patients Table -->
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Speciality</th>
                                <th>Address</th>
                                <th>Experience Years</th>
                                <th>Bio</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($doctors as $doctor)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $doctor->user->name }}</td>
                                <td>{{ $doctor->user->email }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->speciality }}</td>
                                <td>{{ $doctor->address }}</td>
                                <td>{{ $doctor->experience_years }}</td>
                                <td>
                                    <!-- When clicking on the bio, show the full bio -->
                                    <a href="#" data-toggle="modal" data-target="#bioModal{{ $doctor->id }}">
                                        {!! Str::limit($doctor->bio, 30) !!}
                                    </a>
                                    <!-- Bio Modal -->
                                    <div class="modal fade text-left" id="bioModal{{ $doctor->id }}" tabindex="-1" aria-labelledby="bioModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="bioModalLabel">Doctor Bio</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-justify">
                                                    {{ $doctor->bio }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="d-flex justify-content-center border-0" style="margin: 8px 0;">
                                    @can('edit_doctor')
                                        <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-success btn-sm mr-1">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete_doctor')
                                        <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
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
                        {{ $doctors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
