<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function showLoginView()
    {
        return response()->view('cms.auth.login');
    }

    public function login(Request $request)
    {
        // dd(111);
        $validator = Validator($request->all(),[
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean',
        ]);
        if(!$validator->fails()){
            $credintials = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
            if(Auth::guard('admin')->attempt($credintials, $request->input('remember'))){
                return response()->json([
                    'message'=>'Logged in Successfully',
                ], Response::HTTP_OK);
            }else{
                return response()->json([
                    'message' => 'Logged in Failed'
                ], Response::HTTP_BAD_REQUEST);
            }
        }else{
            return response()->json([
                'message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login');
    }
}
