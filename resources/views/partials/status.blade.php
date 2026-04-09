@if (Session::has('status'))
    <div class="pb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif