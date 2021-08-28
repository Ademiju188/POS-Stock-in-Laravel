@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
{{--
    <div class="alert text-white bg-danger" role="alert">
        <div class="iq-alert-icon">
           <i class="fa fa-times-circle-o"></i>
        </div>
        <div class="iq-alert-text">{{$error}}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="fa fa-close"></i>
        </button>
     </div> --}}


     <div class="panel panel-default">
        <div class="panel-body">


            <a class="btn btn-danger waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('error', 'top right', '{{$error}}')"></a>


        </div>
    </div>

    @endforeach
@endif

@if (session()->has('success'))
<div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
    <span class="sr-only">40% Complete (success) {{session('success')}}</span>
</div>
</div>

{{-- <div class="panel panel-default">
    <div class="panel-body">
        <div class="waves-effect waves-light">
            {{session('success')}}
        </div>


    </div>
</div> --}}

{{-- <div class="alert text-white bg-success" role="alert">
    <div class="iq-alert-icon">
       <i class="fa fa-check-circle"></i>
    </div>
    <div class="iq-alert-text">{{session('success')}}</div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="fa fa-close"></i>
    </button>
 </div> --}}


@endif

@if (session()->has('error'))


<div class="alert text-white bg-danger" role="alert">
    <div class="iq-alert-icon">
       <i class="fa fa-times-circle-o"></i>
    </div>
    <div class="iq-alert-text">{{session('error')}}</div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="fa fa-close"></i>
    </button>
 </div>


@endif
{{--
<div class="panel panel-default">
    <div class="panel-body">

        <a class="btn btn-success waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('success', 'top right', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Success</a>
        <a class="btn btn-warning waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('warning', 'top right', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Warning</a>
        <a class="btn btn-danger waves-effect waves-light" href="javascript:;" onclick="$.Notification.notify('error', 'top right', 'Sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')">Error</a>


    </div>
</div> --}}
