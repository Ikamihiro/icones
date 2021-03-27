<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create(array_merge($request->validated(), [
            'password' => Hash::make('password'),
            'is_admin' => $request->has('is_admin'),
        ]));

        return back()
            ->with('success', 'Usuário inserido com sucesso!');
    }

    public function show(User $user)
    {
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(array_merge($request->validated(), [
            'is_admin' => $request->has('is_admin'),
        ]));

        return back()
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return back()
                ->withErrors('Você não pode excluir a si mesmo!');
        }

        $user->delete();

        return back()
            ->with('success', 'Usuário excluído com sucesso!');
    }

    public function generateNewPassword(User $user)
    {
        $user->update([
            'password' => Hash::make('password'),
        ]);

        return back()
            ->with('success', 'Senha resetada para o padrão inicial!');
    }

    public function showChangePasswordForm()
    {
        return view('admin.users.change');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Senha alterada com sucesso!');
    }
}
