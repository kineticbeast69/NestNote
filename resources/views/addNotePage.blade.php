@include("subview.header");

<div class="mx-3  d-flex align-items-center">
    <button class="btn">
        <a href="{{ route("home") }}"
            class="d-flex align-items-center justify-content-center  text-decoration-none gap-2">
            <i class="fa-solid fa-arrow-left fs-4"></i>
            <h1 class="fs-3">Back</h1>
        </a>
    </button>

</div>

<!-- server notification -->
@if(session('techError'))
    <x-notification type="warning" :message="session('techError')" />

@endif



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="shadow-sm">
                <div class=" bg-white">
                    <h5 class="mb-0">Add Note</h5>
                </div>

                <form method="POST" action="/add_note">
                    @csrf
                    <div class="">
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="note-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="note-title" name="title"
                                placeholder="Enter the title">
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label for="note-content" class="form-label">Content</label>
                            <textarea class="form-control" id="note-content" name="content" rows="6"
                                placeholder="Content"></textarea>
                            @error('content')
                                <div class="text-danger small ">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tags -->
                        <div class="mb-3">
                            <label for="note-tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="note-tags" name="tags"
                                placeholder="#inspiration, #work">
                            @error('tags')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class=" d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary">Add Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include("subview.footer")