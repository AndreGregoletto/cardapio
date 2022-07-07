<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Collaborator\RequestCreate;
use App\Http\Requests\Collaborator\RequestUpdate;

class CollaboratorController extends Controller
{
    public function __construtct()
    {
        $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('roles', function($query) {
            $query->whereNotIn('name', ['Admin']);
        })->paginate(10);

        return view('admin.collaborator.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collaborator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RequestCreate $request
     * @return Reeirect
     */
    public function store(RequestCreate $request)
    {
        $data = $request->validated();
        
        $user = User::create($data);

        $user->roles()->attach(2);

        return back();
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
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.collaborator.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RequestUpdate  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        
        return redirect()->route('admin.collaborators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
