<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oink;
use App\User;
use App\Comment;
use App\Profile;
use App\like;
use Auth;

class OinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $oinks = Oink::query()
                    ->join( 'users', 'oinks.user_id', '=', 'users.id' )->paginate(5);

        Return view('oinks.index', compact('oinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
            if ($user)
              return view('oinks.create');
            else
              return redirect('/oinks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ( $user = Auth::user() ) {
            $validatedData = $request->validate(array(
                'message' => 'required|max:240'
            ));
            $oink = new Oink;
            $oink->user_id = $user->id;
            $oink->message = $validatedData['message'];
            if ( isset ($request->is_gif) && $request->is_gif === 'true') {
              $oink->is_gif = true;
            }
            $oink->save();

            return redirect('/oinks')->with('success', 'Oink has been saved.');
        }
        return redirect('/oinks');
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
        $oink = Oink::findOrFail($id);

        $oinkUser = $oink->user()->get()[0];
        return view( 'oinks.show', compact('oink'), compact('oinkUser') );
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
            $oink = Oink::findOrFail($id);

            return view('oinks.edit', compact('oink'));
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
                'message' => 'required|max:240'
            ));
            if ( isset ($request->is_gif) && $request->is_gif === 'true') {
              $oink->is_gif = true;
            }

            Oink::whereId($id)->update($validatedData);

            return redirect('/oinks')->with('success', 'Oink has been updated.');
        }
        // Redirect by default.
        return redirect('/oinks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if ($user = Auth::user()) {
        $oink = Oink::findOrFail($id);

        $oink->delete();

        return redirect('/oinks')->with('success', 'Oink has been deleted.');
      }
        return redirect('/oinks');
    }

    public function like(Post $oink) {
      $existing_like = Like::withTrashed()->wherePostId($oink->id)->whereUserId(Auth::id())->first();

      if (is_null($existing_like)) {
        Like::create([
          'oink_id' => $oink->id,
          'user_id' => Auth::id()
        ]);
      } else {
        if (is_null($existing_like->deleted_at)) {
          $existing_like->delete();
        } else {
        $existing_like->restore();
      }
    }
  }
}
