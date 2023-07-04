<div class="modal fade" id="destroy-student-{{ $student->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="clearfix">
                    <button class="btn-close float-end shadow-none clearfix" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                @if ($student->avatar)
                    <img src="#" alt="#" class="avatar-md">
                @else
                    <i class="fa-solid fa-user-tie d-block text-center icon-md"></i>
                @endif

                <div class="text-center mt-2">
                    <p class="fw-bold mb-0">{{ $student->name }}</p>
                    <p class="text-center">{{ $student->email }}</p>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <form action="{{ route('admin.student.destroy',$student->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm text-center">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>