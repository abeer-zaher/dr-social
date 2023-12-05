<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\AuthController;
use App\Models\Film;
use validator;
use App\Http\Resources\Film as filmResource;
use Illuminate\Http\Request;

class FilmController extends BaseController
{
    public function index()
    {
        $films = Film::all();
        return $this->sendResponse(filmResource::collection($films),'All films sent');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'name'=>'required',
            'description'=>'required',
            'dateshow'=>'required',
            'director'=>'required',
            'prodcompany'=>'required',
            'cast'=>'required',
            'photo'=>'required|image',
            'geners'=>'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Please validate error' , $validator->errors());
        }
        $film = Film::create($input);
        return $this->sendResponse( new productResource($product) , 'Product created successfuly');


    }


}
