<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oink;
use App\User;
use App\Comment;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( $user = Auth::user() ) {
          $user = Auth::user();
          return view('profile.index', compact('user'));
          }
          // Redirect by default.
          return redirect('/oinks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
    *public function create()
    *{
    *    //
    *}
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
    *public function store(Request $request)
    *{
    *    //
    *}
    */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
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
        if ($user = Auth::user()) {
            $user = User::findOrFail($id);

            return view('profile.edit', compact('user'));
        }

        return redirect('/oinks');
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
        if ( $user = Auth::user() ) {
            $validatedData = $request->validate(array(
                'name' => 'required'
            ));

            User::whereId($id)->update($validatedData);

            return redirect('/profile')->with('success', 'Profile has been updated.');
        }
        // Redirect by default.
        return redirect('/oinks');
    }
}
