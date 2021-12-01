<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Giriş Yap</title>
    </head>
    <body class="bg-whitesmoke">
        <div class="container h-2/3 flex flex-row justify-center items-center m-auto mt-6 md:mt-0">
            <div class="row w-2/3 bg-white flex flex-col md:flex-row py-8 border solid rounded-xl shadow-xl">
                <div class="left-image-area w-auto md:w-1/2 flex justify-center items-center py-5 pl-2 border-r">
                    <img src="{{asset('images')}}/kou-logo.png" alt="KOU Logo" width="256" height="256">
                </div>
                <div class="right-content-area w-auto md:w-1/2 flex flex-col items-center justify-center">
                    <form class="w-3/4 m-0" action="{{route('loginPost')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm mb-1" for="email">E-mail</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none" id="email" type="email" placeholder="E-mail">
                        </div>
                        <div class="mb-6">
                            <label class="block text-grey-darker text-sm mb-1" for="password">Şifre</label>
                            <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-1 outline-none" id="password" type="password" placeholder="******************">
                            <div class="flex flex-row items-center justify-between">
                                <p class="text-red-500 text-xs italic opacity-0">Please choose a password.</p>
                                <a class="inline-block align-baseline text-sm text-blue hover:text-blue-darker" href="#">Şifremi Unuttum</a>
                            </div>

                        </div>
                        <button class="w-full bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition" type="submit">
                            Giriş Yap
                        </button>
                    </form>
                    <div class="mt-4">
                        <small class="uppercase text-gray-500">Hesabın yok mu? <a href="{{route('register')}}" class="text-black font-medium">Hemen Aç!</a></small>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
