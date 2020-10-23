<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ArtikelController extends Controller
{
    public function index()
    {   
        $articles = Artikel::orderBy('id','desc')->paginate(3);
        return view('artikel.index', compact('articles'));

    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if($artikel == null)
            abort(404);

        return view('artikel.detail', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {   


        $request->validate([
            'thumbnail' => 'mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required|min:10|max:255',
            'subject' => 'required|min:10',
        ]);
        
        $imgName = null;
        
        if($request->thumbnail){ 
        $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'), $imgName);
        }
        //$artikel = new Artikel;
        //$artikel->title = $request->title; //$request->title = name yang ada di Html nya.
        //$artikel->subject = $request->subject;
        //$artikel->save();

        Artikel::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]);


        return redirect('/artikel');


    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('artikel/edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|min:10|max:255',
            'subject' => 'required|min:10',
        ]);
        
        
        $imgName = null;

        if($request->thumbnail){ 
            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $imgName);
        }

        Artikel::find($id)->update([
            'title' => $request->title,
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]);

        return redirect('/artikel');
    }

    public function destroy($id){
        Artikel::find($id)->delete();

        return redirect('/artikel');
    }
}

