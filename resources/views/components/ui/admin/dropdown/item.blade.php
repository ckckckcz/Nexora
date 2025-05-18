@props(['icon' => null, 'danger' => false])

@php
$classes = $danger ? 'text-red-600 hover:bg-red-50' : 'text-gray-700 hover:bg-gray-100';
@endphp

<button {{ $attributes->merge(['class' => "flex w-full items-center px-4 py-2.5 text-sm transition-colors $classes"]) }}>
  @if ($icon)
    <x-dynamic-component :component="'icons.' . $icon" class="mr-2 text-gray-500" />
  @endif
  {{ $slot }}
</button>
