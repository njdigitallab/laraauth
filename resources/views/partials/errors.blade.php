@if ($errors->get($errorName))
    <ul class="text-sm text-red-600 space-y-1">
        @foreach ($errors->get($errorName) as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif