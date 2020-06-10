@if(session('success'))
    <div class="alert alert-success" style="font-size: 20px; font-weight: bold;text-align: center; padding-top: 30px ">
        <p>{{session('success')}}</p>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error" style="text-align: center; padding-top: 30px ">
        <p>{{session('error')}}</p>
    </div>
@endif

