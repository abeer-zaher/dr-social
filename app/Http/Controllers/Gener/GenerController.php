<?php

namespace App\Http\Controllers\Gener;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gener;
use App\Models\Film;
use Gate;
class GenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('geners')){
            return redirect(route('auth'));
        }
        $gener= Gener::all();
        return view('geners.index',compact('gener'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('geners.create')){
            return redirect(route('auth'));
        }
        return view('geners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('geners.store')){
            return redirect(route('auth'));
        }
        $request->validate([
            'name'=>'required',

            ]);
            $gener = Gener::create([
                'name'=> $request->name,
            ]);
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
        if(Gate::denies('geners.destroy')){
            return redirect(route('auth'));
        }
        $gener = Gener::find($id);
        $gener->delete();
        return redirect()->back();
    }
}
