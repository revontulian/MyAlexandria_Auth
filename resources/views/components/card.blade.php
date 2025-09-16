@props(['highlight' => false, 'private' => false])

<div @class(['highlight' => $highlight, 'private' => $private, 'card'])>
    {{ $slot }}
    <a href="{{ $attributes->get('href') }}" class="btn">View Details</a>
</div>