@extends('layouts.master')
@section('title') ÇAP Başvuru @endsection
@section('headerTitle') ÇAP Başvuru  @endsection
@section('content')
    <div class="container">
        <div class="flex flex-col justify-center items-center">
            <form class="w-2/3 m-0 p-4">
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="fileX">FileX</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileX" name="fileX" type="file" placeholder="Öğrenci No">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="fileY">FileY</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileY" name="fileY" type="file" placeholder="E-mail">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="fileZ">FileZ</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileZ" name="fileZ" type="file" placeholder="E-mail">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="fileQ">FileQ</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileQ" name="fileQ" type="file" placeholder="Telefon">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm mb-1" for="fileF">FileF</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-none"
                           id="fileF" name="fileF" type="file" placeholder="TC Kimlik No">
                </div>
                <div class="mb-4">
                    <input class="" id="trustCheck" name="trustCheck" type="checkbox" placeholder="TC Kimlik No">
                    <label class="block text-grey-darker text-sm mb-1" for="trustCheck">Evrakların bana ait olduğunu kabul ediyorum.</label>
                </div>
                <button class="w-full bg-kou-normal hover:bg-kou-dark text-white py-2 px-4 rounded-lg transition"
                        type="button">
                    Başvuru Yap
                </button>
            </form>
        </div>
    </div>
@endsection
