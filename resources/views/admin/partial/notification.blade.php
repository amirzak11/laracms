@if(session('success'))
    <div class="alert alert-success" style="padding: 10px;">
        <p style="margin: 0px;">{{session('success')}}</p>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error" style="padding: 10px;">
        <p style="margin: 0px;">{{session('error')}}</p>
    </div>
@endif

