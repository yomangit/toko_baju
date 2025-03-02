@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-[9px] text-error -mt-1 -mb-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
