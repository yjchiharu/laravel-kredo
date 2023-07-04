<div class="modal fade" id="finish-class-{{ $class->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-success">
            <div class="modal-body">
                <button class="btn-close float-end shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>

                <h3 class="h4-mb-0">{{ $class->course->title }}</h3>

                <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                <p><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</p>
                <p class="mb-0"><span class="text-muted">Student: </span><span class="text-bold">
                {{ $class->student->name }}</span></p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <form action="{{ route('teacher.class.destroy', $class->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-success btn-sm px-5">Mark as Done</button>
                </form>
            </div>
        </div>
    </div>
</div>

