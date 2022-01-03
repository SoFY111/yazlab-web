@include('layouts.header')
@include('layouts.sidebar')

<div class="flex-grow flex flex-col bg-whitesmoke overflow-auto" id="container" style="height: 100vh !important;">
    <div class="indicator w-full h-[3px]" >
        <div class="w-0 bg-kou-light h-full transition" id="indicator" style="transition: width ease-in-out .25s;"></div>
    </div>
    <div class="flex-grow overflow">
        @yield('content')
    </div>

@include('layouts.footer')
