@extends('layouts.app')

@section('title','Edit Artikel')

@section('content')


    <div class="jumbotron bg-white" style="margin-top: 100px;">
        <h2 class="text-center">Edit Artikel</h2>
        <hr id="asw">

        <form action="/artikel/{{$artikel->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-input field="title" label="Judul" type="text" value="{{$artikel->title}}"/>
            <x-textarea field="subject" label="Subject" value="{{$artikel->subject}}"/>
            @if ($artikel->thumbnail)
            <img src="/images/{{$artikel->thumbnail}}" width="150" alt="Thumbnail Artikel">
            @else <p>Kamu belum mengupload Thumbnail.</p>
            @endif
            <x-inputfile label="Edit Thumbnail"/>
            <hr>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
            <a href="/artikel/{{$artikel->slug}}" class="btn btn-danger btn-sm mr-2">Cancel</a>
        </form>
    </div>

@endsection 