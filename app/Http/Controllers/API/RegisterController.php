<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password'


        ]) ;
        if($validator->fails()){
            return $this->sendError('Please validate error' , $validator->errors());
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::Create($input);
        $success['token'] = $user->createToken('Mohammad')->accessToken;
        $success['name'] = $user->name;
        return $this->sendResponse( $success , 'user registerd successfuly');
    }

    public function login(Request $request)
    {

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('Mohammad')->accessToken;
        $success['name'] = $user->name;
        return $this->sendResponse( $success , 'user registerd successfuly');

        }
        else {
            return $this->sendError('Please  chack your auth' ,['error'=>'Unauthorised']);
        }
       
 
}

}
