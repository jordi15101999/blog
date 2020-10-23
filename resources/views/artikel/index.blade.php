@extends('layouts.app')

@section('title','Dashboard')
    


@section('content')

    <div class="container-fluid mb-5" style="text-align:center;margin-top:100px;">
        <h1 class="text-white">Artikel Pocong Lari</h1>
    </div>
    

    @foreach ($articles->chunk(3) as $arChunk)

    <div class="row" id="myBody">
        @foreach ($arChunk as $artikel)
            
        <div class="col card mb-2 ml-2 mr-2">
        <img class="card-img-top mt-4" src="/images/{{$artikel->thumbnail}}" alt="Thumbnail Artikel">
            <div class="card-body">
                <p><strong>{{ ucfirst($artikel->title) }}</strong></p>
                <p>{{ ucfirst($artikel->subject) }}</p>
                <a href="/artikel/{{$artikel->slug}}" class="btn btn-secondary btn-sm stretched-link">Baca Selengkapnya...</a>

            </div>

        </div>


        @endforeach
    
    </div>
        
    @endforeach

    <div class="mb-3 mt-3">
        {{ $articles->links() }}
    </div>


@endsection