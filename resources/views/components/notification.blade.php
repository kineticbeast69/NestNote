<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div class="toast show align-items-center text-bg-{{ $type }} border-0 shadow-sm rounded-3" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center justify-content-center">
                <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                <strong>{{ $message }}</strong>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>