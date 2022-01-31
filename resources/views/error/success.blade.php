{{-- <div id="toastsContainerTopRight" class="toasts-top-right fixed">
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"><strong class="mr-auto text-success">Thành công</strong>
            <small class="text-muted">just now</small>
            <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">{{ Session::get('success') }}</div>
    </div>
</div> --}}
<div id="toastsContainerTopRight" class="toasts-top-right fixed">
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"><strong class="mr-auto text-primary">Thành công</strong><small>Just now</small><button
                data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span
                    aria-hidden="true">×</span></button></div>
        <div class="toast-body">{{ Session::get('success') }}</div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#toastsContainerTopRight').click(function() {
            $('.toast').toast('hide');
        });
    });
</script>
