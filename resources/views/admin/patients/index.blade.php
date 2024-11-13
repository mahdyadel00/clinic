@extends('admin.inc.master')

@section('title', 'Patients')

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
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a> / Patients
                        </h3>
                    </div>

                    <!-- Add Patient Button and Messages -->
                    <div class="card-body">
                        <a href="{{ route('admin.patients.create') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i> Add Patient
                        </a>
                        @include('admin.inc._message')

                        <!-- Patients Table -->
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Medical History</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($patients as $patient)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $patient->user->name }}</td>
                                <td>{{ $patient->user->email }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($patient->dob)->format('d-m-Y') }}</td>
                                <td>{{ $patient->medical_history }}</td>
                                <td>
                                            <span class="badge badge-{{ $patient->gender == 1 ? 'success' : 'primary' }}">
                                                {{ $patient->gender == 1 ? 'Male' : 'Female' }}
                                            </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.patients.edit', $patient) }}" class="btn btn-success">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.patients.destroy', $patient) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
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
                                <td colspan="8" class="text-center">No Patients Found</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="card-footer clearfix">
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
