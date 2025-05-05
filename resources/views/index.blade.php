@include("subview.header")


<!-- add card icons -->
<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-start my-2">
     <a class="btn d-flex  flex-sm-row gap-2 align-items-center justify-content-start py-2 px-3 fs-3 text-secondary rounded add-hover"
          href="{{ route('addNote') }}">
          <i class="fa-solid fa-notes-medical" style="font-size:1.4em;"></i>
          <h5 class="mb-0 fs-3">Add Project</h5>
     </a>
</div>




<!-- server notification -->
@if(session('AddSuccess'))
     <x-notification type="success" :message="session('AddSuccess')" />

@endif

@if(session('updateSuccess'))
     <x-notification type="success" :message="session('updateSuccess')" />

@endif


@if(session('deleteSuccess'))
     <x-notification type="success" :message="session('deleteSuccess')" />

@endif


@if(session('deleteError'))
     <x-notification type="warning" :message="session('deleteError')" />

@endif


@if(session('techError'))
     <x-notification type="warning" :message="session('techError')" />

@endif


<!-- reading the notes -->
<div class="container  py-4 position-relative h-100 ">

     <!-- Notes Grid -->
     <div class="row grid row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  g-3">
          @forelse ($notes as $note)
                 <x-notes-card title="{{ $note->title }}" content="{{ $note->content }}"
                       date="{{ $note->created_at->format('d M, Y') }}"
                       tags="{{ collect($note->tags)->map(fn($tag) => '#' . $tag)->implode(' ') }}" id="{{ $note->id }}" />

            @empty
                 <div class="p-2 d-flex align-items-center justify-content-center" style="margin:auto;">
                       <img src="{{ asset('images/addNote.png') }}" alt="Add Note" class="img-fluid shadow-lg"
                              style="max-width: 100%; height: auto;">
                 </div>

            @endforelse
     </div>

</div>


@include("subview.footer")