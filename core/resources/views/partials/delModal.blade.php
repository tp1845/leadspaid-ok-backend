<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form action="" method="POST">
                <div class="modal-body text-center">
                    @csrf
                    <i class="las la-exclamation-circle text-danger f-size--100  mb-15"></i>
                    <h3 class="text--secondary mb-15">@lang('Are You Sure Want to Delete This?')</h3>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('close')</button>
                    <button type="submit" class="btn btn--danger del">@lang('Delete')</button>
                </div>
            </form>

        </div>
    </div>
</div>
