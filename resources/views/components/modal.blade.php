<div id="modal" class="fixed inset-0 bg-gray-700 bg-opacity-75 flex justify-center items-center z-50 hidden">
    <div class="bg-gray-950 p-6 rounded-lg max-h-[600px] shadow-lg max-w-xl w-full overflow-y-auto">
        <h2 class="text-xl text-white font-semibold mb-4">Registrar nuevo usuario en el sistema</h2>
        {{ $slot }}
        <button id="closeModalBtn"
            class="border-red-500 border mt-2 text-red-500 hover:bg-red-500 hover:text-white w-full font-bold py-2 px-4 rounded">
            Cerrar Modal
        </button>
    </div>
</div>
