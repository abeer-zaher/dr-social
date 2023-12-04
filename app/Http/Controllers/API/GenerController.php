<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Gener;
use App\Http\Resources\Gener as generResource;
use validator;

use Illuminate\Http\Request;

class GenerController extends Controller
{
    public function index()
    {
        $geners = Gener::all();
        return $this->sendResponse(filmResource::collection($geners),'All geners sent');
    }
    
}
