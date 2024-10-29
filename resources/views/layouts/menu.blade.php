<li class="nav-label mg-t-25">Menu</li>

<li class="{{ Request::is('dashboard*') ? 'active' : '' }} nav-item">
    <a class="nav-link" href="{!! route('dashboard') !!}"><i data-feather="home"></i><span>Home</span>
</li>

@can('user-show')
    <li class="nav-label mg-t-25">User Management</li>

    <li class="{{ Request::is('roles*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('roles.index') !!}"><i data-feather="lock"></i><span>Roles</span></a>
    </li>

    <li class="{{ Request::is('users*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('users.index') !!}"><i data-feather="user-plus"></i><span>Users</span></a>
    </li>


    <li class="{{ Request::is('permissiongroups*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('permissiongroups.index') !!}"><i data-feather="user-check"></i><span>Permissions
                Group</span></a>
    </li>

    <li class="{{ Request::is('permissions*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('permissions.index') !!}"><i data-feather="user-check"></i><span>Permissions</span></a>
    </li>
@endcan



@can('prospectiveStudent-show')
    <li class="nav-label mg-t-25">PPDB</li>

    <li class="{{ Request::is('prospectiveStudents*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('prospectiveStudents.index') !!}"><i class="fa-solid fa-graduation-cap"
                style="width: 32px"></i><span>Calon
                Siswa Baru</span></a>
    </li>
@endcan

@can('registration-show')
    <li class="{{ Request::is('registrations*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('registrations.index') !!}"><i class="fas fa-id-card"
                style="width: 32px"></i><span>Pendaftaran Siswa Baru</span></a>
    </li>
    <li class="{{ Request::is('registration-success*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('registrations.success') !!}"><i class="fas fa-id-card"
                style="width: 32px"></i><span>Pendaftaran Siswa - Berhasil</span></a>
    </li>
@endcan

<li class="nav-label mg-t-25">Sekolah Management</li>

@can('user-show')
    <li class="{{ Request::is('teachers*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('teachers.index') !!}"><i class="fa-solid fa-user-tie"
                style="width: 32px"></i><span>Guru</span></a>
    </li>
@endcan

@can('user-show')
    <li class="{{ Request::is('staff_tus*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('staff_tus.index') !!}"><i class="fa-solid fa-user-tie"
                style="width: 32px"></i><span>Staff TU</span></a>
    </li>
@endcan

@can('student-show')
    <li class="{{ Request::is('students*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('students.index') !!}"><i class="fa-solid fa-graduation-cap"
                style="width: 32px"></i><span>Siswa</span></a>
    </li>
@endcan
@can('major-show')
    <li class="{{ Request::is('majors*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('majors.index') !!}"><i class="fas fa-book"
                style="width: 32px"></i><span>Jurusan</span></a>
    </li>
@endcan
@can('schoolClass-show')
    <li class="{{ Request::is('schoolClasses*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('schoolClasses.index') !!}"><i class="fa-solid fa-school"
                style="width: 32px"></i><span>Kelas</span></a>
    </li>
@endcan
@can('subject-show')
    <li class="{{ Request::is('subjects*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('subjects.index') !!}"><i class="fa-solid fa-book-open"
                style="width: 32px"></i><span>Mata Pelajaran</span></a>
    </li>
@endcan

@can('studentGrade-show')
    <li class="{{ Request::is('studentGrades*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('studentGrades.index') !!}"><i class="fa-solid fa-star" style="width: 32px"></i><span>Nilai
                SIswa</span></a>
    </li>
@endcan

<li class="nav-label mg-t-25">SPP Management</li>


@can('sppPayment-show')
    <li class="{{ Request::is('sppPayments*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('sppPayments.index') !!}"><i class="fa-solid fa-money-bill-wave"
                style="width: 32px"></i><span>Pembayaran Spp</span></a>
    </li>
@endcan

@can('paymentDetail-show')
    <li class="{{ Request::is('paymentDetails*') ? 'active' : '' }} nav-item">
        <a class="nav-link" href="{!! route('paymentDetails.index') !!}"><i class="fa-solid fa-money-check"
                style="width: 32px"></i><span>Detail Pembayaran</span></a>
    </li>
@endcan
