@extends('layouts.master')
@section('title') Yaz Okulu Başvuru @endsection
@section('headerTitle') Yaz Okulu Başvuru @endsection
@section('content')
    <div class="w-2/3 border-b py-2 m-auto flex flex-row items-center justify-center">
        <h2 class="font-medium" style="font-size: 22px;">Yaz Okulu Başvuru</h2>
    </div>
    <div class="container">
        <div class="flex flex-col justify-center items-center">
            <!-- fileX -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center" enctype="multipart/form-data" id="fileXForm">
                @csrf
                <div class="flex-grow flex flex-col" id="fileXInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">Yaz Okulu Ders Dilekçesi</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none" id="fileX" name="fileX" type="file">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">Yaz Dilekçesi</label>
                    <button type="reset" id="fileXResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileXUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>

            <!-- fileY -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center" enctype="multipart/form-data" id="fileYForm">
                <div class="flex-grow flex flex-col" id="fileYInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">Okul Taban Puanları</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileY" name="fileY" type="file">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">Okul Taban</label>
                    <button type="reset" id="fileYResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileYUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>
            <!-- fileZ -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center" id="fileZForm">
                <div class="flex-grow flex flex-col" id="fileZInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">Transkript</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileZ" name="fileZ" type="file">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">Transkript</label>
                    <button type="reset" id="fileZResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileZUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>

            <!-- fileQ -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center" id="fileQForm">
                <div class="flex-grow flex flex-col" id="fileQInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">Ders İçerikleri</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileQ" name="fileQ" type="file" >
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">Ders İçerikleri</label>
                    <button type="reset" id="fileQResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileQUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>

            <div class="w-2/3 pl-4 flex flex-col justify-start">
                <div class="flex flex-row items-center">
                    <input class="" id="trustCheck" name="trustCheck" type="checkbox">
                    <label class="block text-grey-darker text-sm pl-2" for="trustCheck">Evrakların bana ait olduğunu kabul ediyorum.</label>
                </div>
                <form>
                    <button type="submit" id="openAppealModalButton" class="w-full bg-kou-normal hover:bg-kou-dark text-white mt-2 py-2 px-4 rounded-lg transition text-center disabled:bg-gray-400 disabled:cursor-default">Başvuru Yap</button>
                </form>
            </div>
        </div>
    </div>

    <div
        class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
        id="appealModal"
    ></div>

    <div
        class="relative hidden top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white"
        style="position:absolute; top: 50%; right: 50%; transform: translate(50%,-50%);" id="appealModalCloseButton">
        <div class="mt-3 text-center">
            <div
                class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-2"
            >
                <svg
                    class="h-6 w-6 text-green-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    ></path>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Başvuruyu Bitir</h3>
            <div class="mt-2 px-7 py-3">
                <label class="text-sm text-gray-800 mt-3">Bütün belgelerin size ait olduğunu kabul ederek başvuruyu tamamlamak istiyor musunuz?</label>
            </div>
            <div class="items-center px-4 py-3">
                <button id="appealModalRealCloseButton" class="px-4 py-2 mb-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                    Vazgeç
                </button>
                <form action="{{route('storeAppeal')}}" method="POST">
                    @csrf
                    <input type="hidden" name="appealUUID" value="{{$data->appealUUID}}">
                    <button
                        id="appealModalOkButton"
                        class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                        Tamamla
                    </button>
                </form>

            </div>
        </div>
    </div>

    @if($data->firstOpening == 1)
        <div
            class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
            id="my-modal"
        ></div>

        <div
            class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white"
            style="position:absolute; top: 50%; right: 50%; transform: translate(50%,-50%);" id="modalCloseButton">
            <div class="mt-3 text-center">
                <div
                    class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100"
                >
                    <i class="fa-solid fa-book text-green-600" style="font-size: 20px"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Yaz Okulu Başvuru Sayfasına <br/>Hoş Geldiniz!</h3>
                <div class="mt-2 px-7 py-3">
                    <ul class="text-sm text-gray-500">
                        <li>Yaz Okulu Ders Dilekçesi</li>
                        <li>Okul Taban Puanları</li>
                        <li>Transkript</li>
                        <li>Ders İçerikleri</li>
                    </ul>
                    <p class="text-sm text-gray-800 mt-3">Başvuru yapmak için bu belgeleri yüklemeniz gerekmeketedir.</p>
                </div>
                <div class="items-center px-4 py-3">
                    <a href="{{route('dashboard')}}">
                        <button  class="px-4 py-2 mb-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                            Vazgeç
                        </button>
                    </a>
                    <button
                        id="ok-btn"
                        class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                        OK
                    </button>
                </div>
            </div>
        </div>
    @endif

@endsection


@section('js')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $('#appealModal').css('display', 'none');
            $('#appealModalCloseButton').css('display', 'none');

            $('#openAppealModalButton').on('click', (e) => {
                e.preventDefault();
                $('#appealModal').css('display', 'block');
                $('#appealModalCloseButton').css('display', 'block');
            })

            $('#appealModalRealCloseButton').on('click', () => {
                $('#appealModal').css('display', 'none');
                $('#appealModalCloseButton').css('display', 'none');
            })

            $('#my-modal').css('display', 'block');

            $('#ok-btn').click(function() {
                $('#my-modal').css('display', 'none');
                $('#modalCloseButton').css('display', 'none');

                $.ajax({
                    type:'post',
                    url: '{{route('appealOpeningChange')}}',
                    data: {appealUUID: "{{$data->appealUUID}}"},
                    dataType: 'json',
                    success:function(res){

                    },
                    error:function (res){
                        console.log('basarisiz');
                    }
                })

            })

            $('#fileX').attr('hidden', true)
            $('#fileY').attr('hidden', true)
            $('#fileZ').attr('hidden', true)
            $('#fileQ').attr('hidden', true)
            $('#fileF').attr('hidden', true)
            $('#fileXResetButton').attr('disabled', true)
            $('#fileXUploadButton').attr('disabled', true)
            $('#fileYResetButton').attr('disabled', true)
            $('#fileYUploadButton').attr('disabled', true)
            $('#fileZResetButton').attr('disabled', true)
            $('#fileZUploadButton').attr('disabled', true)
            $('#fileQResetButton').attr('disabled', true)
            $('#fileQUploadButton').attr('disabled', true)
            $('#openAppealModalButton').attr('disabled', true)

            @if(isset($data))
            @if(isset($data->files['fileX']))
            $('#fileXInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileXInputDivLabel">{{substr($data->files['fileX'], 0, 60)}}...</label>');
            $('#fileXResetButton').attr('disabled', false)
            @else
            $('#fileX').attr('hidden', false);
            @endif
            @if(isset($data->files['fileY']))
            $('#fileYInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileYInputDivLabel">{{substr($data->files['fileY'], 0, 60)}}...</label>');
            $('#fileYResetButton').attr('disabled', false)
            @else
            $('#fileY').attr('hidden', false);
            @endif
            @if(isset($data->files['fileZ']))
            $('#fileZInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileZInputDivLabel">{{substr($data->files['fileZ'], 0, 60)}}...</label>');
            $('#fileZResetButton').attr('disabled', false)
            @else
            $('#fileZ').attr('hidden', false);
            @endif
            @if(isset($data->files['fileQ']))
            $('#fileQInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileQInputDivLabel">{{substr($data->files['fileQ'], 0, 60)}}...</label>');
            $('#fileQResetButton').attr('disabled', false)
            @else
            $('#fileQ').attr('hidden', false);
            @endif
            @if(isset($data->files['fileF']))
            $('#fileFInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileFInputDivLabel">{{substr($data->files['fileF'], 0, 60)}}...</label>');
            $('#fileFResetButton').attr('disabled', false)
            @else
            $('#fileF').attr('hidden', false);
            @endif
            @endif
            console.log( "ready!" );


            //fileX
            $('#fileX').change(function(e) {
                let fileName = this.files[0].name;
                let isUpload = this.files.length;
                console.log('The fileX name is : "' + fileName);
                console.log(this.files.length);

                if(isUpload > 0) $('#fileXResetButton').attr('disabled', false);
                else $('#fileXResetButton').attr('disabled', true);
                if(isUpload > 0) $('#fileXUploadButton').attr('disabled', false);
                else $('#fileXUploadButton').attr('disabled', true)
            });

            $('#fileXResetButton').on('click', function() {
                $('#fileX').val("")
                $('#fileXResetButton').attr('disabled', true)
                $('#fileXUploadButton').attr('disabled', true)

                @if(isset($data->files['fileX']))
                $('#fileXInputDivLabel').remove();
                $('#fileX').attr('hidden', false);
                @endif

                $.ajax({
                    type:'get',
                    url: '{{route('appealDeleteFile', [$data->appealUUID, 'fileX'])}}',
                    dataType: 'json',
                    success:function(res){
                        console.log(res);
                        console.log('silindi');

                        $('#fileXInputDivLabel').remove();
                        $('#fileX').attr('hidden', false);
                    },
                    error:function (res){
                        console.log('silinmedi');
                    }
                })

            })

            $('#fileXForm').submit((e) => {
                e.preventDefault();
                console.log($('#fileX').val())

                let formData = new FormData();
                let file = $('#fileX')[0].files[0];
                formData.append('file', file);
                formData.append('fileType', 'fileX');
                formData.append('appealUUID', '{{$data->appealUUID}}');
                $.ajax({
                    type:'POST',
                    url: '{{route('appealUploadFile')}}',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        let xhr = $.ajaxSettings.xhr();
                        const divWidth = $('#container').width();
                        $('#indicator').removeClass('hidden');
                        xhr.upload.onprogress = function(e) {
                            let percent = (Math.floor(e.loaded / e.total *100));
                            let percentToPx = divWidth * (percent / 100)
                            console.log('percent' + percent)
                            console.log('ppx:' + percentToPx)
                            console.log(typeof(percentToPx))
                            $('#indicator').css({
                                width: percentToPx
                            });
                        };
                        return xhr;
                    },
                    success:function(res){
                        $('#fileX').attr('hidden', true)
                        $('#fileXInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileXInputDivLabel">' + res.substr(1, 60) + '...</label>');
                        $('#fileXResetButton').attr('disabled', false)
                        $('#fileXUploadButton').attr('disabled', true)
                        $('#indicator').addClass('hidden');
                    },
                    error:function (res){
                        console.log('yüklenmedi');
                    }
                })

            })
            //ENDOF fileX
            //fileY
            $('#fileY').change(function(e) {
                let fileName = this.files[0].name;
                let isUpload = this.files.length;
                console.log('The fileY name is : "' + fileName);
                console.log(this.files.length);

                if(isUpload > 0) $('#fileYResetButton').attr('disabled', false);
                else $('#fileYResetButton').attr('disabled', true);
                if(isUpload > 0) $('#fileYUploadButton').attr('disabled', false);
                else $('#fileYUploadButton').attr('disabled', true)
            });

            $('#fileYResetButton').on('click', function() {
                $('#fileY').val("")
                $('#fileYResetButton').attr('disabled', true)
                $('#fileYUploadButton').attr('disabled', true)

                @if(isset($data->files['fileY']))
                $('#fileYInputDivLabel').remove();
                $('#fileY').attr('hidden', false);
                @endif

                $.ajax({
                    type:'get',
                    url: '{{route('appealDeleteFile', [$data->appealUUID, 'fileY'])}}',
                    dataType: 'json',
                    success:function(res){
                        console.log(res);
                        console.log('silindi');
                        $('#fileYInputDivLabel').remove();
                        $('#fileY').attr('hidden', false);
                    },
                    error:function (res){
                        console.log('silinmedi');
                    }
                })

            })

            $('#fileYForm').submit((e) => {
                e.preventDefault();
                console.log($('#fileY').val())

                let formData = new FormData();
                let file = $('#fileY')[0].files[0];
                formData.append('file', file);
                formData.append('fileType', 'fileY');
                formData.append('appealUUID', '{{$data->appealUUID}}');
                $.ajax({
                    type:'POST',
                    url: '{{route('appealUploadFile')}}',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        let xhr = $.ajaxSettings.xhr();
                        const divWidth = $('#container').width();
                        $('#indicator').removeClass('hidden');
                        xhr.upload.onprogress = function(e) {
                            let percent = (Math.floor(e.loaded / e.total *100));
                            let percentToPx = divWidth * (percent / 100)
                            $('#indicator').css({
                                width: percentToPx
                            });
                        };
                        return xhr;
                    },
                    success:function(res){
                        $('#fileY').attr('hidden', true)
                        $('#fileYInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileYInputDivLabel">' + res.substr(1, 60) + '...</label>');
                        $('#fileYResetButton').attr('disabled', false)
                        $('#fileYUploadButton').attr('disabled', true)
                        $('#indicator').addClass('hidden');
                    },
                    error:function (res){
                        console.log('yüklenmedi');
                    }
                })

            })

            //ENDOF fileY
            //fileZ
            $('#fileZ').change(function(e) {
                let fileName = this.files[0].name;
                let isUpload = this.files.length;
                console.log('The fileZ name is : "' + fileName);
                console.log(this.files.length);

                if(isUpload > 0) $('#fileZResetButton').attr('disabled', false);
                else $('#fileZResetButton').attr('disabled', true);
                if(isUpload > 0) $('#fileZUploadButton').attr('disabled', false);
                else $('#fileZUploadButton').attr('disabled', true)
            });

            $('#fileZResetButton').on('click', function() {
                $('#fileZ').val("")
                $('#fileZResetButton').attr('disabled', true)
                $('#fileZUploadButton').attr('disabled', true)

                @if(isset($data->files['fileZ']))
                $('#fileZInputDivLabel').remove();
                $('#fileZ').attr('hidden', false);
                @endif

                $.ajax({
                    type:'get',
                    url: '{{route('appealDeleteFile', [$data->appealUUID, 'fileZ'])}}',
                    dataType: 'json',
                    success:function(res){
                        console.log(res);
                        console.log('silindi');

                        $('#fileZInputDivLabel').remove();
                        $('#fileZ').attr('hidden', false);
                    },
                    error:function (res){
                        console.log('silinmedi');
                    }
                })

            })

            $('#fileZForm').submit((e) => {
                e.preventDefault();
                console.log($('#fileZ').val())

                let formData = new FormData();
                let file = $('#fileZ')[0].files[0];
                formData.append('file', file);
                formData.append('fileType', 'fileZ');
                formData.append('appealUUID', '{{$data->appealUUID}}');
                $.ajax({
                    type:'POST',
                    url: '{{route('appealUploadFile')}}',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        let xhr = $.ajaxSettings.xhr();
                        const divWidth = $('#container').width();
                        $('#indicator').removeClass('hidden');
                        xhr.upload.onprogress = function(e) {
                            let percent = (Math.floor(e.loaded / e.total *100));
                            let percentToPx = divWidth * (percent / 100)
                            $('#indicator').css({
                                width: percentToPx
                            });
                        };
                        return xhr;
                    },
                    success:function(res){
                        $('#fileZ').attr('hidden', true)
                        $('#fileZInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileZInputDivLabel">' + res.substr(1, 60) + '...</label>');
                        $('#fileZResetButton').attr('disabled', false)
                        $('#fileZUploadButton').attr('disabled', true)
                        $('#indicator').addClass('hidden');
                    },
                    error:function (res){
                        console.log('yüklenmedi');
                    }
                })

            })

            //ENDOF fileZ
            //fileQ
            $('#fileQ').change(function(e) {
                let fileName = this.files[0].name;
                let isUpload = this.files.length;
                console.log('The fileQ name is : "' + fileName);
                console.log(this.files.length);

                if(isUpload > 0) $('#fileQResetButton').attr('disabled', false);
                else $('#fileQResetButton').attr('disabled', true);
                if(isUpload > 0) $('#fileQUploadButton').attr('disabled', false);
                else $('#fileQUploadButton').attr('disabled', true)
            });

            $('#fileQResetButton').on('click', function() {
                $('#fileQ').val("")
                $('#fileQResetButton').attr('disabled', true)
                $('#fileQUploadButton').attr('disabled', true)

                @if(isset($data->files['fileQ']))
                $('#fileQInputDivLabel').remove();
                $('#fileQ').attr('hidden', false);
                @endif

                $.ajax({
                    type:'get',
                    url: '{{route('appealDeleteFile', [$data->appealUUID, 'fileQ'])}}',
                    dataType: 'json',
                    success:function(res){
                        console.log(res);
                        console.log('silindi');
                        $('#fileQInputDivLabel').remove();
                        $('#fileQ').attr('hidden', false);
                    },
                    error:function (res){
                        console.log('silinmedi');
                    }
                })
            })

            $('#fileQForm').submit((e) => {
                e.preventDefault();
                console.log($('#fileQ').val())

                let formData = new FormData();
                let file = $('#fileQ')[0].files[0];
                formData.append('file', file);
                formData.append('fileType', 'fileQ');
                formData.append('appealUUID', '{{$data->appealUUID}}');
                $.ajax({
                    type:'POST',
                    url: '{{route('appealUploadFile')}}',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    xhr: function() {
                        let xhr = $.ajaxSettings.xhr();
                        const divWidth = $('#container').width();
                        $('#indicator').removeClass('hidden');
                        xhr.upload.onprogress = function(e) {
                            let percent = (Math.floor(e.loaded / e.total *100));
                            let percentToPx = divWidth * (percent / 100)
                            $('#indicator').css({
                                width: percentToPx
                            });
                        };
                        return xhr;
                    },
                    success:function(res){
                        $('#fileQ').attr('hidden', true)
                        $('#fileQInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileQInputDivLabel">' + res.substr(1, 60) + '...</label>');
                        $('#fileQResetButton').attr('disabled', false)
                        $('#fileQUploadButton').attr('disabled', true)
                        $('#indicator').addClass('hidden');
                    },
                    error:function (res){
                        console.log('yüklenmedi');
                    }
                })

            })
            //ENDOF fileQ

            $('#trustCheck').on('change', () => {
                if($("#trustCheck").is(':checked')) $('#openAppealModalButton').attr('disabled', false);  // checked
                else $('#openAppealModalButton').attr('disabled', true);
            })
        });
    </script>
@endsection
