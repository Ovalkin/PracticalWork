@if(session('alert'))
<div class="alert alert-info position-fixed ms-3 w-25 fixed-bottom" role="alert">
    {{session('alert')}}
</div>
@endif
