<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Actions\Fortify\CreateNewUser;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\ValidationCreateRules;
use App\Http\Requests\ValidationUpdateRules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['header'] = 'All System Users';
        $data['users'] = User::paginate(10);

        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['header'] = 'Add New User';
        $data['roles'] = Role::all();

        return view('admin.user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationCreateRules $request)
    {
        //$newUser = new CreateNewUser();
        //$user = $newUser->create($request->only('name','email','password','password_confirmation'));


        $validatedData = $request->validated();

        $user = User::create($request->except(['_token','roles']));

        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'User successfully added to the system');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['roles'] = Role::all();
        $data['user']  = User::find($id);

        if ( ! $user)
        {
            $request->session()->flash('error', 'User does not exist');

            return redirect()->back();
        }

        return view('admin.user.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data['header'] = 'Edit User Info';

        $data['roles'] = Role::all();
        $data['user']  = User::find($id);

        if ( ! $data['user'])
        {
            $request->session()->flash('error', 'User does not exist');

            return redirect()->back();
        }

        return view('admin.user.edit',$data);
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
        $user = User::find($id);
        //dd($user);

        if ( ! $user)
        {
            $request->session()->flash('error', 'User does not exist');

            return redirect()->to('dashboard');
        }

        //dd($validatedData);

        if ($user)
        {
            $user->update($request->except(['_token', 'roles']));
            $user->roles()->sync($request->roles);

            $request->session()->flash('success', 'User info successfully updated');

            return redirect()->back();
        }
        else
        {
            $request->session()->flash('error', 'User does not exist');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('success', 'User successfully removed from the system');

        return redirect()->back();
    }
}
