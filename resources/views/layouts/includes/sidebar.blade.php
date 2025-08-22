@if(auth()->check())
    @if(auth()->user()->role == 'admin')
        <ul class="nav flex-column bg-light p-3 rounded shadow-sm">
            <li class="nav-item mb-2">
                <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage all system users">
                    <i class="fas fa-users-cog fa-lg me-2 text-primary"></i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('classes.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage school classes">
                    <i class="fas fa-chalkboard fa-lg me-2 text-warning"></i>
                    <span>School Classes</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('sections.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage class sections">
                    <i class="fas fa-layer-group fa-lg me-2 text-success"></i>
                    <span>Class Sections</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('teachers.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage school teachers">
                    <i class="fas fa-chalkboard-teacher fa-lg me-2 text-danger"></i>
                    <span>Teachers</span>
                </a>
            </li>
         <li class="nav-item dropdown mb-2">
    <a class="nav-link dropdown-toggle d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
       href="#"
       id="coursesDropdown"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false"
       title="Manage school courses">
        <i class="fas fa-book-open fa-lg me-2 text-info"></i>
        <span>Courses</span>
    </a>
    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="coursesDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('courses.create') }}">
                <i class="fas fa-plus me-2"></i>Add Course
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('courses.index') }}">
                <i class="fas fa-list me-2"></i>Manage Courses
            </a>
        </li>
    </ul>
</li>

           <li class="nav-item dropdown mb-2">
    <a class="nav-link dropdown-toggle d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
       href="#"
       id="studentsDropdown"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false"
       title="Manage students and profiles">
        <i class="fas fa-user-graduate fa-lg me-2 text-secondary"></i>
        <span>Students</span>
    </a>
    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="studentsDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('students.create') }}">
                <i class="fas fa-user-plus me-2"></i>Admit Student
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('students.index') }}">
                <i class="fas fa-users me-2"></i>Manage Students
            </a>
        </li>
</ul>
            <li class="nav-item mb-2">
                <a href="{{ route('enrollments.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage student enrollments">
                    <i class="fas fa-user-plus fa-lg me-2 text-primary"></i>
                    <span>Enrollments</span>
                </a>
                   <li class="nav-item mb-2">
                <a href="{{ route('subjects.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Mark attendance">
                    <i class="fas fa-clipboard-check fa-lg me-2 text-success"></i>
                    <span>Subjects</span>
                </a>
            </li>
           
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('attendances.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage student attendance">
                    <i class="fas fa-clipboard-check fa-lg me-2 text-success"></i>
                    <span>Attendance</span>
                </a>
            </li>
            <li class="nav-item dropdown mb-2">
    <a class="nav-link dropdown-toggle d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
       href="#"
       id="gradesDropdown"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false"
       title="Manage school grades">
        <i class="fas fa-layer-group fa-lg me-2 text-warning"></i>
        <span>Grades</span>
    </a>
    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="gradesDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('grades.create') }}">
                <i class="fas fa-plus-circle me-2"></i>Add Grade
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('grades.index') }}">
                <i class="fas fa-th-list me-2"></i>Manage Grades
            </a>
        </li>
    </ul>
</li>

        </ul>

    @elseif(auth()->user()->role == 'teacher')
    

        <ul class="nav flex-column bg-light p-3 rounded shadow-sm">
            <li class="nav-item mb-2">
                <a href="{{ route('students.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="View students">
                    <i class="fas fa-user-graduate fa-lg me-2 text-secondary"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('attendances.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Mark attendance">
                    <i class="fas fa-clipboard-check fa-lg me-2 text-success"></i>
                    <span>Attendance</span>
                </a>
            </li>
            <li class="nav-item dropdown mb-2">
    <a class="nav-link dropdown-toggle d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
       href="#"
       id="gradesDropdown"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false"
       title="Manage school grades">
        <i class="fas fa-layer-group fa-lg me-2 text-warning"></i>
        <span>Grades</span>
    </a>
    <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="gradesDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('grades.create') }}">
                <i class="fas fa-plus-circle me-2"></i>Add Grade
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('grades.index') }}">
                <i class="fas fa-th-list me-2"></i>Manage Grades
            </a>
        </li>
    </ul>
</li>
            <!--  -->
        </ul>

    @elseif(auth()->user()->role == 'student')
        <ul class="nav flex-column bg-light p-3 rounded shadow-sm">
            <li class="nav-item mb-2">
                <a href="{{ route('student.profile') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                    <i class="fas fa-user fa-lg me-2 text-primary"></i>
                    <span>My Profile</span>
                </a>
            </li>
        </ul>
    @endif
@endif

<style>
.hover-bg-primary:hover {
    background-color: #f96d41 !important; /* school theme color */
    color: #fff !important;
    transition: all 0.3s ease;
}
.nav-link span {
    font-weight: 500;
}
</style>
