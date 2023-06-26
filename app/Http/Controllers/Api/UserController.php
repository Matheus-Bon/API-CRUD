<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestValidateStore;
use App\Http\Requests\RequestValidateUpdate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        return response()->json(User::whereNull('role_id')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $this->authorize('create', User::class);

        $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])->save();
    
        return response()->json('User criado', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {   
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $this->authorize('update', User::class);

        $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore($id),],
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json('User att. !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {

        $this->authorize('delete', User::class);

        $user = User::findOrFail($id);
        $user->delete();
        return response()->json('User deletado!');

    }
}
