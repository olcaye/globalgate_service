<div aria-live="polite" aria-atomic="true" class="position-relative" id="success-toast">
    <div class="toast-container position-absolute top-0 end-0 p-3"  style="z-index: 999;">
        <div class="@if(session('status')) active @endif toast align-items-center text-white border-0 bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    @if (session('status'))
                        {{ session('status') }}
                    @endif
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
