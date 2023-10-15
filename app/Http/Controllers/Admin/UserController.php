<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {

        return view('admin.users.edite', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, User $user)
    {
        $data = $request->only(['name', 'email', 'is_admin', 'password']);
        if($request->has('is_admin')){
            $data['is_admin'] = true;
        }else{
            $data['is_admin'] = false;
        }

        if(Str::length($data['password'])===0){
            $data['password'] = $user['password'];
        };



        $user->fill($data);

        if ($user->save()) {
            return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно изменен');
        }

        return back()->with('error', 'Не удалось изменить пользователя');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function toggleAdmin(User $user){
        if ($user->id !=Auth::id()){
            $user->is_admin = !$user->is_admin;
            $user->save();

            return redirect()->route('admin.users.index')->with('success', 'Права изменены');
        }
        return redirect()->route('admin.users.index')->with('error', 'Нельзя снять админа с себя');
    }
}
