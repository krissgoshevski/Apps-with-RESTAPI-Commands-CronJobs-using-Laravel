<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class SearchController extends Controller
{
    //

    public function search(Request $request)
    {
        

        $value = $request->get('searchTerm'); // serachTerm is id for input search in index.blade.php file 

        if(!$value) // if value is empty
         {
            return response ([
                // gett all users
                'users' => User::all(),
                'message' => 'All users',

            ], 200);
        }

        // if value is not empty
        $users = User::where('email', 'LIKE', '%' . $value . '%')
        ->orWhere('name', 'LIKE', '%' . $value . '%')
        ->orWhere('address', 'LIKE', '%' . $value . '%')->get();


        return response([
            'users' => $users,
            'message' => 'All users are founded'


        ], 200);

    }
}
