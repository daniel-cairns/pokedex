<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// Added, make life easier
use App\User;
use App\Pokemon;
use App\Capture;

class PokecentreController extends Controller
{   

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        // Find out haw manty registered trainers there are
        $totalTrainers = User::all()->count();

        $totalTrainerCaptures   = Capture::where('user_id', \Auth::user()->id)->count();
        $totalGlobalCaptures    = Capture::all()->count();

        return view('pokecentre.index', compact('totalTrainers', 'totalTrainerCaptures', 'totalGlobalCaptures'));
    }

    public function capture()
    {
        // $allPokemon = Pokemon::all()->oderdBy('name');
        $allPokemon = \DB::table('pokemon')->orderBy('name')->get();

        return view('pokecentre.capture', compact('allPokemon'));
    }

    public function postCapture(Request $request)
    {

        $this->validate($request, [
            'pokemon'=>'required|exists:pokemon,id',
            'photo'=>'required|image'
        ]);

        // Capture a new instance of the capture model
        $capture = new Capture();

        $fileName = uniqid().'.'.$request->file('photo')->getClientOriginalExtension();
        
        \Image::make( $request->file('photo') )
                            ->resize( 320,null,function($constraint){$constraint->aspectRatio();})
                            ->save( 'img/captures/'.$fileName);

        $capture->photo = $fileName;

        $capture->user_id = \Auth::user()->id;
        $capture->pokemon_id = $request->pokemon;

        $capture->save();

        // Find out the name of the pokemon the user just captured
        $pokemon = Pokemon::findOrFail($request->pokemon);

        return redirect('pokedex/'.$pokemon->name);
    }

    public function getCaptures()
    {
        $captures = Capture::where('user_id', \Auth::user()->id)->get();

        return view('pokecentre.captures', compact('captures'));
    } 

    public function editCapture($id)
    {
        $capture = Capture::findOrFail($id);
        $allPokemon = Pokemon::orderBy('name')->get();

        return view('pokecentre.editCapture', compact('capture', 'allPokemon'));
    }

    public function updateCapture(Request $request, $id)
    {
        $this->validate($request,[
            'pokemon'=>'required|exists:pokemon,id',
            'photo'=>'image'
        ]);

       // Get info on the capture
        $capture = Capture::findOrFail($id);
            

        if($request->hasFile('photo'))
        {
            // Generate a new file name
            $fileName = uniqid().'.'.$request->file('photo')->getClientOriginalExtension();

            \Image::make( $request->file('photo') )
                            ->resize( 320,null,function($constraint){$constraint->aspectRatio();})
                            ->save( 'img/captures/'.$fileName);

            // Delete the old image
            \File::Delete('img/captures/'.$capture->photo);

            $capture->photo = $fileName;
        }

        $capture->save();

        return redirect('pokecentre/captures');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
