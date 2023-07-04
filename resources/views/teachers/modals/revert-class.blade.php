<div class="modal fade" id="revert-class-{{ $class->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-primary">
            <div class="modal-body">
                <button class="btn-close float-end shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>

                <h3 class="h4 mb-0">{{ $class->course->title }}</h3>

                <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                <p><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;{{ $class->start_time }}</p>
                <p><span class="text-muted">Student: </span> <span class="fw-bold">
                    {{ $class->student->name }}</span></p>

                    <p class="mb-0 fw-light bg-warning p-1">Once reverted, this class shall be removed from your History and move back your Bookings.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                    <form action="{{ route('teacher.revert', $class->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-primary btn-sm px-5">Revert This Class</button>
                    </form>
            </div>
        </div>
    </div>
</div>
