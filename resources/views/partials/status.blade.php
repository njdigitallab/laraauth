@if (Session::has('status'))
    <div class="laraauth-status">
        {{ session('status') }}
    </div>
@endif