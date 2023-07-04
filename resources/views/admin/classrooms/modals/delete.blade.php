<div class="modal fade" id="delete-class-{{ $class->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-danger">
            <div class="modal-body">
                <div class="clearfix">
                    <button class="btn-close float-end shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <h3 class="h4 mb-0">{{ $class->course->title }}</h3>

                <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                <p class="mb-0"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</span>
                <p><i class="fa-solid fa-user-tie"></i>&nbsp;&nbsp;&nbsp;{{ $class->teacher->name }}</p>

                <p class="mb-0">
                    <span class="text-muted">student: </span><span class="fw-bold">{{$class->student->name}}</span>
                </p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <form action="{{ route('admin.classroom.destroy', $class->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-triangle-exxlamation me-2"></i> Delete Forever</button>
                </form>
            </div>
        </div>
    </div>
</div>
