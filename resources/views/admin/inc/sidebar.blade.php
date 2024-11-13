<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('AdminAssets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VCare</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!--Roles-->
                @can('roles')
                    <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}"
                       class="nav-link {{ (request()->is('admin/roles*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>Roles</p>
                    </a>
                </li>
                @endcan

                <!--Patients-->
                @can('patients')
                    <li class="nav-item">
                    <a href="{{ route('admin.patients.index') }}"
                       class="nav-link {{ (request()->is('admin/patients*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>Patients</p>
                    </a>
                </li>
                @endcan

                <!--Doctors-->
                @can('doctors')
                    <li class="nav-item">
                    <a href="{{ route('admin.doctors.index') }}" class="nav-link {{ (request()->is('admin/doctors*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Doctors</p>
                    </a>
                </li>
                @endcan

                <!--appointments-->
                @can('appointments')
                    <li class="nav-item">
                    <a href="{{ route('admin.appointments.index') }}"
                       class="nav-link {{ (request()->is('admin/appointments*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Appointments</p>
                    </a>
                </li>
                @endcan
                <!--Doctor Schedule & Shifts-->
                @can('doctor_schedule_shifts')
                    <li class="nav-item">
                    <a href="{{ route('admin.doctor-schedule-shifts.index') }}"
                       class="nav-link {{ (request()->is('admin/doctor-schedule-shifts*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Doctor Schedule & Shifts</p>
                    </a>
                </li>
                @endcan

                <!--User Schedules-->
                @can('user_schedules')
                    <li class="nav-item">
                    <a href="{{ route('admin.user-schedules.index') }}"
                       class="nav-link {{ (request()->is('admin/user-schedules*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>User Schedules</p>
                    </a>
                </li>
                @endcan

                <!--Rooms-->
                @can('rooms')
                    <li class="nav-item">
                    <a href="{{ route('admin.rooms.index') }}"
                       class="nav-link {{ (request()->is('admin/rooms*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Rooms</p>
                    </a>
                </li>
                @endcan

                <!--Waiting Reservations-->
                @can('waiting_reservations')
                    <li class="nav-item">
                    <a href="{{ route('admin.waiting_reservations.index') }}"
                       class="nav-link {{ (request()->is('admin/waiting-reservation*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Reservation</p>
                    </a>
                </li>
                @endcan

                <!-- Complaints -->
                @can('complaints')
                    <li class="nav-item">
                    <a href="{{ route('admin.complaints.index') }}"
                       class="nav-link {{ (request()->is('admin/complaints*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>Complaints</p>
                    </a>
                </li>
                @endcan

                <!-- price list -->
                @can('price_lists')
                    <li class="nav-item">
                    <a href="{{ route('admin.price_lists.index') }}"
                       class="nav-link {{ (request()->is('admin/price_lists*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Price List</p>
                    </a>
                </li>
                @endcan

                <!--Users-->
                @can('users')
                    <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                       class="nav-link {{ (request()->is('admin/users*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Users</p>
                    </a>
                </li>
                @endcan

                <!--Contacts-->
                @can('contacts')
                    <li class="nav-item">
                    <a href="{{ route('admin.contact.index') }}"
                       class="nav-link {{ (request()->is('admin/contacts*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Contacts</p>
                    </a>
                </li>
                @endcan

                <!--Settings-->
                @can('settings')
                    <li class="nav-item">
                    <a href="{{ route('admin.settings.edit') }}"
                       class="nav-link {{ (request()->is('admin/settings*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
