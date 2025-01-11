<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(10);

        return view('users.index', ['users' => $users, 'menu' => "users"]);
    }

    public function store(UserCreateRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $requestImage = $request->file('image')->store('users', 'public');
            }

            $user = User::create([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'email' => $request->email,
                'fone' => $request->fone,
                'image' => $requestImage,
                'password' => $request->password
            ]);

            DB::commit();

            Log::info('Usuário cadastrado', ['id_user' => $user->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Usuário não cadastrado', ['error' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Usuário não cadastrado, entre em contato com o administrador!');
        }
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            //Se existir a imagem no request
            if ($request->hasFile('image')) {
                $requestImage = $request->file('image')->store('users', 'public');

                if ($user->image) {
                    Storage::disk('public')->delete($user->image);
                }
            }

            $user->update([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'email' => $request->email,
                'fone' => $request->fone,
                'image' => $request->hasFile('image') ? $requestImage : $user->image,
                'password' => $request->password ?? $user->password,
            ]);

            DB::commit();

            Log::info('Usuário editado', ['user_id' => $user->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Usuário não editado', ['error' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Usuário não atualizado, entre em contato com o administrador!');
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            // Deleta o usuário
            $user->delete();

            // Deleta a imagem do usuário se existir
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            DB::commit();

            Log::info('Usuário excluído', ['user_id1' => $user->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Usuário não excluído', ['error' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->with('error', 'Usuário não excluído, entre em contato com o administrador!');
        }
    }
}
