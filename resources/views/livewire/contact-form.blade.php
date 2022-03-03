<div>
    <section class="relative text-gray-600 body-font">
        <div class="absolute inset-0 bg-gray-300">
            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map"
                scrolling="no"
                src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=%C4%B0zmir+(My%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed"
                style=""></iframe>
        </div>
        <div class="container flex px-5 py-24 mx-auto">
            <div
                class="relative z-10 flex flex-col w-full p-8 mt-10 bg-white rounded-lg shadow-md lg:w-1/3 md:w-1/2 md:ml-auto md:mt-0">
                <h2 class="mb-1 text-lg font-medium text-gray-900 title-font " align="center">Contacto</h2>
                <p class="mb-5 leading-relaxed text-gray-600">¿Tienes alguna duda?</p>
                <p class="mb-2">Puedes contactarnos por alguno de estos medios:</p>
                <div class="relative mb-4">
                    <label for="nombre" class="text-sm leading-7 text-gray-600">Nombre</label>
                    <input type="nombre" id="nombre" name="nombre" wire:model.lazy="nombre" required
                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        <x-jet-input-error for="nombre" />
                </div>
                <div class="relative mb-4">
                    <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
                    <input type="email" id="email" name="email" wire:model.lazy="email" required
                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        <x-jet-input-error for="email" />
                </div>
                <div class="relative mb-4">
                    <label for="message" class="text-sm leading-7 text-gray-600">Mensaje</label>
                    <textarea id="message" name="message" wire:model.lazy="mensaje" required
                        class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"></textarea>
                        <x-jet-input-error for="mensaje" />
                </div>
                <button
                    class="px-6 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600" wire:click="enviar">Enviar</button>
                <p class="mt-3 text-xs text-gray-500">Chicharrones blog helvetica normcore iceland tousled brook viral
                    artisan.</p>
            </div>
        </div>
    </section>
</div>
