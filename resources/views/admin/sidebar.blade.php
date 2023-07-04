<div class="list-group fw-bold">
    <a href="{{ route('admin.classroom') }}" class="list-group-item list-group-item-action {{ request()->is('admin/class/*') ? 'active': '' }}">
        Classes
    </a>
    <a href="{{ route('admin.teacher') }}" class="list-group-item list-group-item-action {{ request()->is('admin/teacher/*') ? 'active': '' }}">
        Teacher
    </a>
    <a href="{{ route('admin.student') }}" class="list-group-item list-group-item-action {{ request()->is('admin/student/*') ? 'active': '' }}">
        Students
    </a>
   {{--  <a href="{{ route('admin.course') }}" class="list-group-item list-group-item-action {{ request()->is('admin/course/*') ? 'active': '' }}">
        Courses
    </a>--}} 
</div>

