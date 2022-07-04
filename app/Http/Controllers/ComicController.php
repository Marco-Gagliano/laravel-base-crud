<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest;
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
    public function store(ComicRequest $request)
    {
        $comic = $request->all();

        // METODO 2
        //$request->validate($this->validateRules(), $this->validateMessages());

        // METODO 1
        //
        // $request->validate(
        //     [
        //         'title' => 'required|min:4|max:75',
        //         'image' => 'required|min:10|max:255',
        //         'type' => 'required|min:4|max:30',
        //     ],
        //     [
        //         'title.required' => 'Il campo "Titolo" è obbligatorio. Inserire i dati.',
        //         'title.min' => 'Il campo "Titolo" deve contenere come minino :min caratteri',
        //         'title.max' => 'Il campo "Titolo" deve contenere al massimo :max caratteri',

        //         'image.required' => 'Il campo "Immagine Copertina" è obbligatorio. Inserire i dati.',
        //         'image.min' => 'Il campo "Immagine Copertina" deve contenere come minino :min caratteri',
        //         'image.max' => 'Il campo "Immagine Copertina" deve contenere al massimo :max caratteri',

        //         'type.required' => 'Il campo "Tipo" è obbligatorio. Inserire i dati.',
        //         'type.min' => 'Il campo "Tipo" deve contenere come minino :min caratteri',
        //         'type.max' => 'Il campo "Tipo" deve contenere al massimo :max caratteri',
        //     ]
        // );

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
    public function update(ComicRequest $request, Comic $comic)
    {
        // i dati ricevuti li salvo in una variabile
        $data = $request->all();

        //METODO 2
        // $request->validate($this->validateRules(), $this->validateMessages());

        //METODO 1
        // $request->validate(
        //     [
        //         'title' => 'required|min:4|max:75',
        //         'image' => 'required|min:10|max:255',
        //         'type' => 'required|min:4|max:30',
        //     ],
        //     [
        //         'title.required' => 'Il campo "Titolo" è obbligatorio. Inserire i dati.',
        //         'title.min' => 'Il campo "Titolo" deve contenere come minino :min caratteri',
        //         'title.max' => 'Il campo "Titolo" deve contenere al massimo :max caratteri',

        //         'image.required' => 'Il campo "Immagine Copertina" è obbligatorio. Inserire i dati.',
        //         'image.min' => 'Il campo "Immagine Copertina" deve contenere come minino :min caratteri',
        //         'image.max' => 'Il campo "Immagine Copertina" deve contenere al massimo :max caratteri',

        //         'type.required' => 'Il campo "Tipo" è obbligatorio. Inserire i dati.',
        //         'type.min' => 'Il campo "Tipo" deve contenere come minino :min caratteri',
        //         'type.max' => 'Il campo "Tipo" deve contenere al massimo :max caratteri',
        //     ]
        // );

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

    // FUNZIONI CREATE PER IL METODO 2
    //
    // private function validateRules(){
    //     return [
    //         'title' => 'required|min:4|max:75',
    //         'image' => 'required|min:10|max:255',
    //         'type' => 'required|min:4|max:30',
    //     ];
    // }

    // private function validateMessages(){
    //     return [
    //         'title.required' => 'Il campo "Titolo" è obbligatorio. Inserire i dati.',
    //         'title.min' => 'Il campo "Titolo" deve contenere come minino :min caratteri',
    //         'title.max' => 'Il campo "Titolo" deve contenere al massimo :max caratteri',

    //         'image.required' => 'Il campo "Immagine Copertina" è obbligatorio. Inserire i dati.',
    //         'image.min' => 'Il campo "Immagine Copertina" deve contenere come minino :min caratteri',
    //         'image.max' => 'Il campo "Immagine Copertina" deve contenere al massimo :max caratteri',

    //         'type.required' => 'Il campo "Tipo" è obbligatorio. Inserire i dati.',
    //         'type.min' => 'Il campo "Tipo" deve contenere come minino :min caratteri',
    //         'type.max' => 'Il campo "Tipo" deve contenere al massimo :max caratteri',
    //     ];
    // }
}
