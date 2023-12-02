<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Gener;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$film = Film::all();
        return view('webiste.index',compact('film')) ;*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         $geners = Gener::all();
        return view('dashbord.dashboard',compact('geners')); 
       // return view('dashbord.dashboard');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'date-show'=>'required',
            'director'=>'required',
            'prod-company'=>'required',
            'cast'=>'required',
            'photo'=>'required|image',
             'geners'=>'required'
             
            ]);
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('images',$newPhoto);

            $film = Film::create([
                 
                'name'=>$request->name,
                'description'=>$request->description,
                'date-show'=>$request->date_show,
                'director'=>$request->director,
                'prod-company'=>$request->prod_company,
                'cast'=>$request->cast,
                'photo'=>'images'.$newPhoto

             ]);


             $film->geners()->attach($request->geners);
             return redirect()->back();


 
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
