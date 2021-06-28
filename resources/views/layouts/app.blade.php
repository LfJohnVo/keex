<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Keex') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        //hamburguer menu
        <script>
            function dropdown() {
                return {
                    open: false,
                    show(){
                        if(this.open){
                            //se cierra el menu
                            this.open = false;
                            document.getElemntByTagName('html')[0].style.oveflow = 'auto';
                        }else{
                            //se abre
                            this.open = true;
                            document.getElemntByTagName('html')[0].style.oveflow = 'hidden';
                        }
                    },
                    close(){
                        this.open = false;
                            document.getElemntByTagName('html')[0].style.oveflow = 'auto';
                    }
                }
            }
        </script>

    </body>
</html>
