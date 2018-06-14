<?php

namespace App\Http\Controllers\API;

use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Repositories\API\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
     
     use RegistersUsers;
        
    public function register(Guard $auth, Request $request) 
    {
        $user = $this->userRepository->create($request->all());
        
        return response($user);
    }
    
    
    public function login(Request $request) 
    {
        auth()->shouldUse('api');
        // grab credentials from the request
        $credentials = $request->only('uuid', 'password');

        if (auth()->attempt($credentials)) {
            $result['token'] = auth()->issue();
            $result['user'] = $this->userRepository->findByUuid($credentials['uuid']);
           return response($result);
        }
    
        return response(['Invalid Credentials']);
    }
    
    public function tokenFromUser($id)
    {
        // generating a token from a given user.
        $user = User::find($id);
    
        auth()->shouldUse('api');
        // logs in the user
        auth()->login($user);
    
        // get and return a new token
        $token = auth()->issue();
    
        return $token;
    }
}
