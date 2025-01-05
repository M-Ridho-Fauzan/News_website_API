@if (request()->all())
    @foreach (request()->all() as $key => $value)
        @if (!in_array($key, ['_token', '_method', 'page']))
            @if (!request()->has($key))
                {{-- Check if the parameter already exists --}}
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endif
    @endforeach
@endif
