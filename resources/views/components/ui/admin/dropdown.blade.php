@props(['align' => 'left', 'width' => '220px'])

@php
$alignmentClasses = $align === 'right' ? 'right-0' : 'left-0';
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false">
  <div @click="open = !open" class="cursor-pointer">
    {{ $trigger }}
  </div>

  <div
    x-show="open"
    x-transition
    class="absolute z-50 mt-2 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none {{ $alignmentClasses }}"
    style="display: none; width: {{ $width }};"
  >
    {{ $slot }}
  </div>
</div>
