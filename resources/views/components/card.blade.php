@props(['highlight' => false, 'private' => false])

<div @class(['highlight' => $highlight, 'private' => $private, 'card'])>
    <div class="flex flex-col flex-1 text-left">
        {{ $slot }}
    </div>
    <a href="{{ $attributes->get('href') }}" class="btn self-end">View</a>
</div>