@props(['genres'])

@foreach ($genres as $genre )
    <span>
        {{ $genre['name'] }}@if (!$loop->last),@endif
    </span>
@endforeach