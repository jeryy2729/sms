@if(auth()->check())
    <div class="sidebar bg-white shadow-sm p-3 rounded">
        <ul class="nav flex-column">
            {{-- ADMIN MENU --}}
            @if(auth()->user()->role == 'admin')

                {{-- Users Dropdown --}}
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex justify-content-between align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
                       data-bs-toggle="collapse"
                       href="#usersMenu"
                       role="button"
                       aria-expanded="false"
                       aria-controls="usersMenu">
                        <span><i class="fas fa-users-cog me-2 text-primary"></i> User Management</span>
                        <i class="fas fa-chevron-down small"></i>
                    </a>
                    <div class="collapse ps-4" id="usersMenu">
                        <a href="{{ route('users.index') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-list me-2 text-muted"></i> All Users
                        </a>
                        <a href="{{ route('users.create') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-user-plus me-2 text-success"></i> Add New User
                        </a>
                    </div>
                </li>

                {{-- Classes --}}
                <li class="nav-item mb-2">
                    <a href="{{ route('classes.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage school classes">
                        <i class="fas fa-chalkboard text-warning me-2"></i> Class Management
                    </a>
                </li>

                {{-- Sections --}}
                <li class="nav-item mb-2">
                    <a href="{{ route('sections.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage class sections">
                        <i class="fas fa-layer-group text-success me-2"></i> Sections
                    </a>
                </li>

                {{-- Teachers --}}
                <li class="nav-item mb-2">
                    <a href="{{ route('teachers.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary" title="Manage school teachers">
                        <i class="fas fa-chalkboard-teacher text-danger me-2"></i> Teachers
                    </a>
                </li>

                {{-- Courses Dropdown --}}
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex justify-content-between align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
                       data-bs-toggle="collapse"
                       href="#coursesMenu"
                       aria-expanded="false"
                       aria-controls="coursesMenu">
                        <span><i class="fas fa-book-open text-info me-2"></i> Course Catalog</span>
                        <i class="fas fa-chevron-down small"></i>
                    </a>
                    <div class="collapse ps-4" id="coursesMenu">
                        <a href="{{ route('courses.create') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-plus-circle me-2 text-success"></i> Create New Course
                        </a>
                        <a href="{{ route('courses.index') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-th-list me-2 text-muted"></i> View All Courses
                        </a>
                    </div>
                </li>

                {{-- Students Dropdown --}}
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex justify-content-between align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
                       data-bs-toggle="collapse"
                       href="#studentsMenu"
                       aria-expanded="false"
                       aria-controls="studentsMenu">
                        <span><i class="fas fa-user-graduate text-secondary me-2"></i> Student Records</span>
                        <i class="fas fa-chevron-down small"></i>
                    </a>
                    <div class="collapse ps-4" id="studentsMenu">
                        <a href="{{ route('students.create') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-user-plus me-2 text-success"></i> Admit New Student
                        </a>
                        <a href="{{ route('students.index') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-users me-2 text-muted"></i> Manage Students
                        </a>
                    </div>
                </li>

                {{-- Enrollments --}}
                <li class="nav-item mb-2">
                    <a href="{{ route('enrollments.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-user-check text-primary me-2"></i> Student Enrollments
                    </a>
                </li>

                {{-- Subjects --}}
                <li class="nav-item mb-2">
                    <a href="{{ route('subjects.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-book text-success me-2"></i> Subject Management
                    </a>
                </li>

                {{-- Attendance --}}
                <li class="nav-item mb-2">
                    <a href="{{ route('attendances.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-clipboard-check text-info me-2"></i> Attendance Records
                    </a>
                </li>
   <li class="nav-item mb-2">
                    <a href="{{ route('addresses.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-clipboard-check text-info me-2"></i> Address Records
                    </a>
                </li>

                {{-- Grades Dropdown --}}
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex justify-content-between align-items-center text-dark rounded px-3 py-2 hover-bg-primary"
                       data-bs-toggle="collapse"
                       href="#gradesMenu"
                       aria-expanded="false"
                       aria-controls="gradesMenu">
                        <span><i class="fas fa-layer-group text-warning me-2"></i> Grading System</span>
                        <i class="fas fa-chevron-down small"></i>
                    </a>
                    <div class="collapse ps-4" id="gradesMenu">
                        <a href="{{ route('grades.create') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-plus me-2 text-success"></i> Add Grade Scale
                        </a>
                        <a href="{{ route('grades.index') }}" class="nav-link small text-dark py-1">
                            <i class="fas fa-list-ol me-2 text-muted"></i> Manage Grade Scales
                        </a>
                    </div>
                </li>

            {{-- TEACHER MENU --}}
            @elseif(auth()->user()->role == 'teacher')
                <li class="nav-item mb-2">
                    <a href="{{ route('students.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-user-graduate text-secondary me-2"></i> My Students
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('attendances.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-calendar-check text-success me-2"></i> Mark Attendance
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('grades.index') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-clipboard-list text-warning me-2"></i> Gradebook
                    </a>
                </li>

            {{-- STUDENT MENU --}}
            @elseif(auth()->user()->role == 'student')
                <li class="nav-item mb-2">
                    <a href="{{ route('student.profile') }}" class="nav-link d-flex align-items-center text-dark rounded px-3 py-2 hover-bg-primary">
                        <i class="fas fa-user text-primary me-2"></i> My Profile
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif

{{-- Sidebar Styles --}}
<style>
.sidebar {
    min-height: 100vh;
    font-size: 15px;
}
.hover-bg-primary:hover {
    background-color: #f96d41 !important; /* school theme */
    color: #fff !important;
    transition: all 0.3s ease;
}
.nav-link {
    font-weight: 500;
    cursor: pointer;
}
.nav-link i {
    width: 20px;
}
.collapse .nav-link {
    font-size: 14px;
    padding-left: 1.5rem;
}
</style>
