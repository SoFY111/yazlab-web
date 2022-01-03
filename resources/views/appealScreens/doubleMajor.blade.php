@extends('layouts.master')
@section('title') ÇAP Başvuru @endsection
@section('headerTitle') ÇAP Başvuru  @endsection
@section('content')
    <div class="container">
        <div class="flex flex-col justify-center items-center">
            <!-- fileX -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center" enctype="multipart/form-data">
                <div class="flex-grow flex flex-col" id="fileXInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">FileX</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none" id="fileX" name="fileX" type="file" placeholder="Öğrenci No">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">FileX</label>
                    <button type="reset" id="fileXResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileXUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>

            <!-- fileY -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center" enctype="multipart/form-data">
                <div class="flex-grow flex flex-col" id="fileYInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">FileY</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileY" name="fileY" type="file" placeholder="Öğrenci No">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">fileY</label>
                    <button type="reset" id="fileYResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileYUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>
            <!-- fileZ -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center">
                <div class="flex-grow flex flex-col" id="fileZInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">FileZ</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileZ" name="fileZ" type="file" placeholder="Öğrenci No">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">fileZ</label>
                    <button type="reset" id="fileZResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileZUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>

            <!-- fileQ -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center">
                <div class="flex-grow flex flex-col" id="fileQInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">FileQ</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileQ" name="fileQ" type="file" placeholder="Öğrenci No">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">fileQ</label>
                    <button type="reset" id="fileQResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileQUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>

            <!-- fileF -->
            <form class="w-2/3 m-0 p-4 flex flex-row items-center">
                <div class="flex-grow flex flex-col" id="fileFInputDiv">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">FileF</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileF" name="fileF" type="file" placeholder="Öğrenci No">
                </div>
                <div class="ml-2">
                    <label class="block opacity-0 text-sm mb-1">fileQ</label>
                    <button type="reset" id="fileFResetButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Sil</button>
                    <button type="submit" id="fileFUploadButton" class="bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition disabled:bg-gray-400 disabled:cursor-default">Yükle</button>
                </div>
            </form>
            <div class="w-2/3 pl-4 flex flex-col justify-start">
                <div class="flex flex-row items-center">
                    <input class="" id="trustCheck" name="trustCheck" type="checkbox" placeholder="TC Kimlik No">
                    <label class="block text-grey-darker text-sm pl-2" for="trustCheck">Evrakların bana ait olduğunu kabul ediyorum.</label>
                </div>
                <form class="">
                    <button type="submit" class="w-full bg-kou-normal hover:bg-kou-dark text-white mt-2 py-2 px-4 rounded-lg transition text-center disabled:bg-gray-400 disabled:cursor-default">Başvuru Yap</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {

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
            $('#fileFResetButton').attr('disabled', true)
            $('#fileFUploadButton').attr('disabled', true)

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
                    $('#fileZInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileYInputDivLabel">{{substr($data->files['fileZ'], 0, 60)}}...</label>');
                    $('#fileZResetButton').attr('disabled', false)
                @else
                    $('#fileZ').attr('hidden', false);
                @endif
                @if(isset($data->files['fileQ']))
                    $('#fileQInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileYInputDivLabel">{{substr($data->files['fileQ'], 0, 60)}}...</label>');
                    $('#fileQResetButton').attr('disabled', false)
                @else
                    $('#fileQ').attr('hidden', false);
                @endif
                @if(isset($data->files['fileF']))
                    $('#fileFInputDiv').append('<label class="w-full shadow appearance-none border rounded py-2 px-3 text-grey-darker outline-none" id="fileYInputDivLabel">{{substr($data->files['fileF'], 0, 60)}}...</label>');
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
            })
            //ENDOF fileQ
            //fileF
            $('#fileF').change(function(e) {
                let fileName = this.files[0].name;
                let isUpload = this.files.length;
                console.log('The fileF name is : "' + fileName);
                console.log(this.files.length);

                if(isUpload > 0) $('#fileFResetButton').attr('disabled', false);
                else $('#fileFResetButton').attr('disabled', true);
                if(isUpload > 0) $('#fileFUploadButton').attr('disabled', false);
                else $('#fileFUploadButton').attr('disabled', true)
            });

            $('#fileFResetButton').on('click', function() {
                $('#fileF').val("")
                $('#fileFResetButton').attr('disabled', true)
                $('#fileFUploadButton').attr('disabled', true)

                @if(isset($data->files['fileF']))
                    $('#fileFInputDivLabel').remove();
                    $('#fileF').attr('hidden', false);
                @endif
            })
            //ENDOF fileQ
        });
    </script>
@endsection
