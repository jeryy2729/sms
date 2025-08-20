<ul class="nav flex-column bg-light p-3 rounded shadow-sm">
    <li class="nav-item mb-2">
        <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage all system users">
            <i class="fas fa-user fa-lg me-2 text-primary"></i>
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
            <i class="fas fa-th-large fa-lg me-2 text-success"></i>
            <span>Class Sections</span>
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('teachers.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage school teachers">
            <i class="fas fa-chalkboard-teacher fa-lg me-2 text-danger"></i>
            <span>Teachers</span>
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('courses.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage school courses">
            <i class="fas fa-book fa-lg me-2 text-info"></i>
            <span>Courses</span>
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('students.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage students and profiles">
            <i class="fas fa-user-graduate fa-lg me-2 text-secondary"></i>
            <span>Students</span>
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('enrollments.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage student enrollments">
            <i class="fas fa-clipboard-list fa-lg me-2 text-muted"></i>
            <span>Enrollments</span>
        </a>
    </li>
</ul>

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
