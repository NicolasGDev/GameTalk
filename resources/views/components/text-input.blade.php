@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => ' border-none focus:border-main focus:ring-main text-white bg-gray-700  rounded-md shadow-sm py-2',
]) !!}>
