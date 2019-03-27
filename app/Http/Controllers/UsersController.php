<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $users = User::all()->sortBy('id');

       return view('users.users', ['users' => $users]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.edit_add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $attributes = request()->validate([
          'username' => ['required', 'min:3'],
          'password' => ['required', 'min:8'],
          'name' => ['required', 'min:3'],
          'surname' => ['required', 'min:3'],
          'email' => ['required', 'min:3'],
          'phone' => ['required', 'min:3']
        ]);

        User::create($attributes);


        return redirect('/users');
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
        $user = User::findOrFail($id);

        return view('users.edit_add', compact('user'));
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
      request()->validate([
        'username' => ['required', 'min:3'],
        'password' => ['required', 'min:8'],
        'name' => ['required', 'min:3'],
        'surname' => ['required', 'min:3'],
        'email' => ['required', 'min:3'],
        'phone' => ['required', 'min:3']
      ]);

      User::whereId($id)->update($request->except(['_method','_token']));

      return redirect('/users');
    }

    public function getList()
    {
       $users = User::all()->sortBy('id');
       return  response()->json(array('data' => $users));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request){
         $user = User::find($request->id);
         $user->delete();
         return response()->json(array('message'=>'Record deleted successfully!'));
     }
}
