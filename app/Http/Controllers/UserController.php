<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\Rule;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    
    public function index()
    {
        // 2 same ways for response
        return response(
        
        [
            'users' => User::all(),
            'message' => 'List of all users',    
        
        ], 200);
        // return response()->json([
        //     'users' => User::all(),
        //     'message' => 'List of all users',
        // ]);        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);


        // go vrakame toj user koj sto sme go kreirale so 'user' => $user 
        return response(
            [
                'user' => $user,
                'message' => 'The user is sucessfully created',
            ], 201); // 201 means - something created in users table, within DB
    }

    /**
     * Display the specified resource.
     *   public function show(User $user) $user za da moze laravel avtomatski da go najde userot 
     */
    public function show(User $user)
    {
        // sakam da prikazam eden user
        
        return response([
            'user' => $user,
            'message' => 'Show single user',
        ], 200);

    }


    //koga sakame da editirame , da napravime update na nesto postoecko ili da smenime nes 
     public function update(UserRequest $request, User $user)
        {
         $data = $request->validated();

       // $user = $user->update($data);
       $user->update($data);

         return response([
             'user' => $user,
             'message' => 'The user is updated sucessfully',
         ], 200);

        }










 
    public function destroy(User $user)
    {
        $user->delete();

        return response([
            'message' => 'The user has been deleted',

        ], 200);
    }
}
