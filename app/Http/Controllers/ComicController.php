<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        // dump($comics);
        return view('comics.index', compact ('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //viene richiamata la vista contenete il form del create
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comic = $request->all();

        $new_comic = new Comic();
        // $new_comic->title = $data['title'];
        // $new_comic->image = $data['image'];
        // $new_comic->type = $data['type'];
        // $new_comic->slug = Str::slug($data['title'], '-');

        $new_comic->fill($comic);
        $new_comic->slug = Str::slug($comic['title']);
        $new_comic->save();



        //con "return redirect" reindirizzo alla show i nuovi elementi salvati
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view ('comics.show', compact('comic'));
        }
        // qui viene inserito "abort 404"
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);

        if($comic){
            return view('comics.edit', compact('comic'));
        }
        // qui viene inserito "abort 404"
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // i dati ricevuti li salvo in una variabile
        $data = $request->all();

        //creo lo slug
        // $data['slug'] =$this->getSlug($data['title']);

        // i nuovi data nel fumetto selezionato li sostituisco
        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

    //metodo di incremento dello slug non eseguito da me

    // private function checkSlug($string){
    //     $new_slug = Str::slug($string, '-');
    //     $findSlug = Comic::where('slug', $new_slug)->first();
    //     $i = 0;
    //     while($findSlug){
    //         $new_slug = Str::slug($string, '-') . $i;
    //         $i++;
    //         $findSlug = Comic::where('slug', $new_slug)->first();
    //     }
    //     return $new_slug;
    // }
}
