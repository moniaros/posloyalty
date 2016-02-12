<div class="modal fade" id="{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{$title}}</h4>
            </div>
            <div class="modal-body">
                <p>{!! $body !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{$closeButton or "Close"}}</button>
                @if ($positiveButton)
                <button type="{{$positiveButtonType or "button"}}" id="{{$positiveButtonId or "action-modal"}}" class="btn btn-primary">{{$positiveButton}}</button>
                @endif
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->