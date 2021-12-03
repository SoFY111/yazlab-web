@include('layouts.header')
@include('layouts.sidebar')

<div class="flex-grow flex flex-col">
    <div class="flex-grow">
        @yield('content')
    </div>

@include('layouts.footer')
