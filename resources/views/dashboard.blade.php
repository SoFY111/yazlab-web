@extends('layouts.master')
@section('title') Ana Sayfa @endsection
@section('headerTitle') Ana Sayfa @endsection
@section('content')
    <div class=" p-3 ">
        <?php $appealTypes = ["ÇAP Başvurusu", 'DGS Başvurusu', 'Yatay Geçiş Başvurusu', 'Yaz Okulu Başvurusu', 'Ders İntibak Başvurusu'] ?>
            <div class="flex flex-row items-center border-b border-gray-300 pb-3 px-3">
                <label class=" w-[27%] text-left ml-3 uppercase font-semibold ">Başvuru Türü</label>
                @if($userData['type']) <label class=" w-[26%] text-left ml-3 uppercase font-semibold ">Başvuran Ad Soyad</label> @endif
                <label class=" w-[27%] uppercase font-semibold ">Başvurma Tarihi</label>
                <label class="w-[30%] uppercase font-semibold ">Başvuru Durumu</label>
                <div class="flex flex-row items-center relative">
                    <label class="ml-2 uppercase font-semibold ">İlerleme</label>
                </div>
                @if($userData['type']) <label class=" w-[7%] text-left ml-3 uppercase font-bold "></label> @endif

            </div>
    @foreach($appeals as $appeal)
            <div class="flex flex-row items-center border-b border-gray-300 p-3 ">
                @if($appeal['isStart'] == 2)
                    <label class="w-[12px] h-[8px] shadow bg-secondary rounded-full "></label>
                @elseif($appeal['isStart'] == 1)
                    @if($appeal['result']['status'] == 2)
                        <label class="w-[12px] h-[8px] shadow bg-blue-700 rounded-full "></label>
                    @elseif($appeal['result']['status'] == 0)
                        <label class="w-[12px] h-[8px] shadow bg-red-700 rounded-full "></label>
                    @elseif($appeal['result']['status'] == 1)
                        <label class="w-[12px] h-[8px] shadow bg-green-700 rounded-full "></label>
                    @endif
                @endif

                <label class=" w-[30%] text-left ml-3 ">{{$appealTypes[$appeal['appealType']]}}</label>
                @if($userData['type']) <label class=" w-[30%] text-left ml-3 ">{{$userData['name']}}</label> @endif
                <?php
                    $time = date('j F l Y G:i', $appeal['createdAt']);
                    $source1=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                    $target1=array("Pazartesi","Salı","Çarşamba","Perşembe","Cuma","Cumartesi","Pazar");

                    $source2=array("January","February","March","April","May","June","July","August","September","October","November","December");
                    $target2=array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");

                    $time=str_replace($source1,$target1,$time);
                    $time=str_replace($source2,$target2,$time);
                ?>
                <label class=" w-[30%] ">{{$time}}</label>
                <label class="w-[30%]">
                    @if($appeal['isStart'] == 2)
                        Başvuru Devam Ediyor
                    @elseif($appeal['isStart'] == 1)
                        @if($appeal['result']['status'] == 2)
                            Kontrol Aşamasında
                        @elseif($appeal['result']['status'] == 0)
                            Reddedildi
                        @elseif($appeal['result']['status'] == 1)
                            Kabul Edildi
                        @endif
                    @endif
                </label>
                <div class="flex flex-row items-center relative">
                    <div class=" w-[150px] h-[3px] bg-gray-200 border-r relative rounded-full ">
                        <div class="h-[3px] bg-blue-600 absolute top-0 left-0 rounded-full" style="width: {{$appeal['percent']}}%;"></div>
                    </div>
                    <label class="ml-2">@if($appeal['percent'] < 10 ) %0{{$appeal['percent']}} @else %{{$appeal['percent']}} @endif</label>
                </div>
                @if($userData['type']) <label class="text-left ml-3 uppercase font-bold ">
                    <a href="{{route('showAppeal', $appeal['appealUUID'])}}">
                        <button class=" p-2 text-white bg-kou-normal rounded-md "><i class="fa-solid fa-right-to-bracket"></i></button>
                    </a>
                </label> @endif

            </div>
    @endforeach


    </div>
@endsection
