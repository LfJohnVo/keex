<div>
    <section class="relative text-gray-600 body-font">
        <div class="absolute inset-0 bg-gray-300">
            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" zoom="200" title="map"
                scrolling="no"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30111.463759179904!2d-99.16545115431326!3d19.372054853484293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fe4c28a397f3%3A0xde6ce6638e289c1b!2sPa&#39;l%20Perro%20(Matriz)!5e0!3m2!1sen!2smx!4v1646704172254!5m2!1sen!2smx&z=100"
                style=""
                ></iframe>
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
