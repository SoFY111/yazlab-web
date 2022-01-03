@include('layouts.header')
@include('layouts.sidebar')

<div class="flex-grow flex flex-col bg-whitesmoke overflow-auto" style="height: 100vh !important;">
    <div class="flex-grow overflow">
        @yield('content')
    </div>

@include('layouts.footer')
