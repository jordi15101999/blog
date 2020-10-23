@extends('layouts.app')

@section('title','Artikel Pocong')

@section('content')

    
    <div class="jumbotron bg-white" style="margin-top: 100px;">

        <h2 class="text-center">{{ $artikel->title }}</h2>
        <hr id="asw">
        <p>
            {{ $artikel->subject }}
        </p>
        <hr>
        <div class="row mb-1 container">
        <a href="/artikel/{{$artikel->id}}/edit" class="btn btn-info btn-sm mr-2">Edit</a>
        <form action="/artikel/{{$artikel->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
        </div>


        <a href="/artikel" class="btn btn-sm btn-secondary"> << </a>


    </div>

@endsection