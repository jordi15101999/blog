@extends('layouts.app')

@section('title','Create Artikel')

@section('content')


    <div class="jumbotron bg-white" style="margin-top: 100px;">
        <h2 class="mt-3 text-center">Tambahkan Artikel Baru</h2>
        <hr id="asw">


        <form action="/artikel" method="POST" enctype="multipart/form-data">
            @csrf

            <x-input field="title" label="Judul" type="text"/>
            <x-textarea field="subject" label="Subject"/>
            <x-inputfile label="Upload Thumbnail"/>

            <hr>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            <a href="/artikel" class="btn btn-danger btn-sm mr-2">Cancel</a>
        </form>
    </div>

@endsection 