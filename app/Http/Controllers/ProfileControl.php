<?php

namespace App\Http\Controllers;

use App\Article;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
    }

    public function index()
    {
        //
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        if (Auth::id() != $user->id) {

            return abort(401);

        } else {

            return view('profile.edit', compact('user'));


        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = Auth::user();
        if (Auth::id() != $user->id) {

            return abort(401);

        } else if(isset($request->new_password)) {

            $validateFields = [
                'current_password' => ['required', new MatchOldPassword()],
                'new_password' => ['required' , 'min:8'],
                'new_confirm_password' => ['same:new_password'],
            ];
            $this->validate($request, $validateFields);
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            $request->session()->flash('successMsg', __("Password has been Changed successfully"));
            return redirect()->to('profile');



        }else {


            $validateFields = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'current_password' => ['required', new MatchOldPassword()],
            ];
            $this->validate($request, $validateFields);
            $user->update($request->all());
            $request->session()->flash('successMsg', __("Profile has been modified successfully"));
            return redirect()->to('profile');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
