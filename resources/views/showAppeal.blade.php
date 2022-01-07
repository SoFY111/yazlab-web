@extends('layouts.master')
@section('title') Başvuru Detayı - {{$userData['name']}} @endsection
@section('headerTitle') Başvuru Detayı - {{$userData['name']}} @endsection
@section('content')
    <div class="flex flex-col justify-center items-center">
        <label class="font-medium py-4 border-b border-gray-300 w-full text-center " style="font-size: 22px">Öğrenci Bilgileri</label>
        <div class="flex flex-row mt-4">
            @if(isset($profilePhotoURL)) <img src="{{$profilePhotoURL}}" style="height: 125px !important; width: 125px !important;" class="rounded-full shadow-lg " alt="{{$userData['name']}}"/>
            @else
                <div style="height: 125px !important; width: 125px !important;" class="rounded-full shadow-lg "></div>
            @endif

            <div class="flex flex-col ml-2 ">
                <label>{{$userData['name']}}</label>
                <label>{{$userData['studentNumber']}}</label>
                <label>{{$userData['countryIdentifier']}}</label>
                <label>{{$userData['phoneNumber']['phoneInputValue']}}</label>
                <label>{{$userData['ogrSinif']}}. Sınıf</label>
                <label>{{$userData['email']}}</label>
                <label>{{$userData['adres']}}</label>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center ">
            <label class="font-medium py-4 border-b border-gray-300 w-full text-center " style="font-size: 22px">Başvuru Detayı</label>
            <div class="flex flex-col  ">

                <?php
                    $fileNames = [
                        0 => [
                            'fileX' => 'Transkript',
                            'fileY' => 'Anadal Başarı Sıralaması',
                            'fileZ' => 'ÖSYM Belgesi',
                            'fileQ' => 'Yabancı Dil Belgesi',
                            'fileF' => 'Çap Başvuru Dilekçesi'
                        ],
                        1 => [
                            'fileX' => 'DGS Yerleştirme Sonuç Belgesi',
                            'fileY' => 'Önlisans Transkript',
                            'fileZ' => 'Ders İçerikleri',
                            'fileQ' => 'Ders Planı Müfredatı',
                            'fileF' => 'Mezuniyet Belgesi'
                        ],
                        2 => [
                            'fileX' => 'Ders İçerikleri',
                            'fileY' => 'Ders Planı/Müfredatı',
                            'fileZ' => 'Transkript',
                            'fileQ' => 'ÖSYM Sonuç Belgesi',
                        ],
                        3 => [
                            'fileX' => 'Yaz Okulu Ders Dilekçesi',
                            'fileY' => 'Okul Taban Puanları',
                            'fileZ' => 'Transkript',
                            'fileQ' => 'Ders İçerikleri',
                        ],
                        4 => [
                            'fileX' => 'Transkript',
                            'fileY' => 'Ders İçeriği',
                            'fileZ' => 'Ders Planı',
                            'fileQ' => 'Muafiyet Dilekçesi',
                        ],

                    ]
                ?>

                @if(isset($appeal['files']['fileX']))
                    <div class="flex flex-row">
                        <label>{{$fileNames[$appeal['appealType']]['fileX']}} Dosyası: </label>
                        <a href="{{$downloadURLs['fileXDownloadURL']}}" class="ml-2 text-blue-700 underline"> {{substr($appeal['files']['fileX'], 0, 40)}}...</a>
                    </div>
                @endif
                @if(isset($appeal['files']['fileY']))
                    <div class="flex flex-row">
                        <label>{{$fileNames[$appeal['appealType']]['fileY']}} Dosyası:</label>
                        <a href="{{$downloadURLs['fileYDownloadURL']}}" class="ml-2 text-blue-700 underline"> {{substr($appeal['files']['fileY'], 0, 40)}}...</a>
                    </div>
                @endif
                @if(isset($appeal['files']['fileZ']))
                    <div class="flex flex-row">
                        <label>{{$fileNames[$appeal['appealType']]['fileZ']}} Dosyası:</label>
                        <a href="{{$downloadURLs['fileZDownloadURL']}}" class="ml-2 text-blue-700 underline"> {{substr($appeal['files']['fileZ'], 0, 40)}}...</a>
                    </div>
                @endif
                @if(isset($appeal['files']['fileQ']))
                    <div class="flex flex-row">
                        <label>{{$fileNames[$appeal['appealType']]['fileQ']}} Dosyası:</label>
                        <a href="{{$downloadURLs['fileQDownloadURL']}}" class="ml-2 text-blue-700 underline"> {{substr($appeal['files']['fileQ'], 0, 40)}}...</a>
                    </div>
                @endif
                @if(isset($appeal['files']['fileF']))
                    <div class="flex flex-row">
                        <label>{{$fileNames[$appeal['appealType']]['fileF']}} Dosyası:</label>
                        <a href="{{$downloadURLs['fileFDownloadURL']}}" class="ml-2 text-blue-700 underline"> {{substr($appeal['files']['fileF'], 0, 40)}}...</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-3">
            <button class="p-3 bg-red-500 text-white rounded-md" id="ignoredButton">BAŞVURUYU REDDET</button>
            <button class="p-3 bg-kou-normal text-white rounded-md " id="approvedButton">BAŞVURUYU ONAYLA</button>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $('#ignoredButton').on('click', function (){
                $.ajax({
                    type:'post',
                    url: '{{route('answerAppeal')}}',
                    data: {appealUUID: "{{$appeal['appealUUID']}}", type: 0, userId: "{{$userId}}"},
                    dataType: 'json',
                    success:function(res){
                        document.location.href="/"
                    },
                    error:function (res){
                        console.log('basarisiz');
                    }
                })
            });
            $('#approvedButton').on('click', function (){
                $.ajax({
                    type:'post',
                    url: '{{route('answerAppeal')}}',
                    data: {appealUUID: "{{$appeal['appealUUID']}}", type: 1, userId: "{{$userId}}"},
                    dataType: 'json',
                    success:function(res){
                        document.location.href="/"
                    },
                    error:function (res){
                        console.log('basarisiz');
                    }
                })
            });
        })
    </script>
@endsection
