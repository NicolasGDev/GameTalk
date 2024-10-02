<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center text-center px-4 py-2  border border-transparent rounded-md bg-main  text-black  tracking-widest hover:bg-mainClaro  focus:outline-none focus:ring-2']) }}>
    {{ $slot }}
</button>
