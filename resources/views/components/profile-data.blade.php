<!-- ProfileData Component -->
<div class="flex flex-row items-center justify-between mb-3">
    <div class="rounded-full bg-white">
        @if(isset($profilePhoto))         <img src="{{$profilePhoto}}" alt="{{$userName}}" class="rounded-full" style="width: 50px; height: 50px !important;"/> @endif
        <div class="rounded-full" style="width: 50px; height: 50px !important;"></div>
    </div>
    <div class="ml-2">
        <a href="#"><label class="mr-2 font-medium text-white">{{$userName}}</label></a>
        <a href="{{route('logOut')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>
</div>
