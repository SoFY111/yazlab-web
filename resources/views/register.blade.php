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
<div class="container flex flex-row justify-center items-center m-auto mt-6 md:mt-4">
    <div class="row w-full sm:w-4/5 lg:w-5/12 mx-3 md:mx-0 bg-white border solid rounded-xl shadow-xl ">
        <div class="pt-5 pl-6 items-start">
            <a href="{{route('login')}}">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center">
            <form class="w-2/3 m-0 p-4" method="post" action="{{route('signUp')}}">
                @csrf
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="studentNumber">Öğrenci No</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="studentNumber" name="studentNumber" type="text" placeholder="Öğrenci No">
                </div>
                <div class="mb-4 flex flex-row justify-center items-center gap-3">
                    <div>
                        <label class="block text-grey-darker text-sm mb-1" for="password">Şifre</label>
                        <input
                            class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-1 outline-none"
                            id="password" name="password" type="password" placeholder="******">
                    </div>
                    <div>
                        <label class="block text-grey-darker text-sm mb-1" for="passwordAgain">Şifre Tekrar</label>
                        <input
                            class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-1 outline-none"
                            id="passwordAgain" name="passwordAgain" type="password" placeholder="******">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="email">E-mail</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="email" name="email" type="email" placeholder="E-mail">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="nameSurname">Ad Soyad</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="nameSurname" name="nameSurname" type="text" placeholder="E-mail">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="phone">Telefon</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="phone" name="phone" type="text" placeholder="Telefon">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="identifierNumber">TC Kimlik No</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="identifierNumber" name="identifierNumber" type="text" placeholder="TC Kimlik No">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="adress">Adres</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="adress" name="adress" type="text" placeholder="adress">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="class">Sınıf</label>
                    <select id="class" name="class" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="university">Üniversite</label>
                    <select id="university" name="university" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="faculty">Fakülte</label>
                    <select id="faculty" name="faculty" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none">
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <button class="w-full bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition"
                        type="submit">
                    Üye ol
                </button>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>
</html>
