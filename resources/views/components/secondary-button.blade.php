<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex justify-center items-center text-center px-4 py-2 border border-red-500 rounded-md hover:bg-red-500 hover:text-white text-red-500 font-semibold tracking-widest']) }}
    @if ($attributes->get('back')) onclick="window.history.back();" @endif>
    {{ $slot }}
</button>
