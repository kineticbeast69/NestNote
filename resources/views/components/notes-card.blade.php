<style>
    .notecard {
        transition: transform 0.2s ease-in-out, box-shadow 0.3s ease-in-out;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        border-top: none;
        border-bottom: none;
    }

    .notecard:hover {
        transform: scale(1.03);
        box-shadow: 0 1.5rem 3rem rgba(13, 110, 253, 0.3);
    }
</style>
<div class="card p-2 bg-white  rounded  notecard">
    <div class="d-flex justify-content-between align-items-start mb-2">
        <div>
            <h6 class="mb-1 fs-6 fw-medium">{{ $title }}</h6>
            <small class="text-muted">{{ $date }}</small>
        </div>

    </div>

    <p class="text-secondary small mb-2">
        {{ $content }}
    </p>

    <div class="d-flex justify-content-between align-items-center">
        <div class="text-muted small">
            {{ $tags }}
        </div>
        <div class="d-flex align-items-center gap-4">
            <!-- update button -->
            <a href="{{ route("updateNote", ["postID" => $id]) }}">
                <i class="bi bi-pencil-fill text-success"></i>
            </a>

            <!-- delete button -->
            <form action="{{ route('deleteNote', ['postID' => $id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn p-0 border-0 bg-transparent">
                    <i class="bi bi-trash-fill text-danger"></i>
                </button>
            </form>


            </form>
        </div>
    </div>
</div>