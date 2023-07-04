<div class="modal fade" id="cancel-booking-{{ $class->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-danger">
            <div class="modal-body">
                <button class="btn-close float-end shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>

                <h3 class="h4 mb-0">{{ $class->course->title }}</h3>
                <p class="mb-0"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;&nbsp;{{ date('M j, Y', strtotime($class->date)) }}</p>
                <p class="mb-0"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp{{ $class->start_time }}</p>
            </div>
            <div class="modal-footer border-0 jusify-content-center">
                <form action="{{ route('student.cancel-booking', $class->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-danger btn-sm">Cancel This Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>
