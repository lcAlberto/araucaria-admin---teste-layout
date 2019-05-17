<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\services\UploadServices;

class UserController extends Controller
{
    public function index(User $model)
    {
        $title = 'Users';
        return view('users.index', ['users' => $model->paginate(4)], compact('title'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request, UserRepository $repository, UploadServices $profile)
    {
        $createProfile = $profile->createProfile($request);
        $users = $repository->createUser($createProfile);
        $users->save();
        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Usuário cadastrado eh isso!!', 'alert-danger', 'Oops! não foi possível cadastrar!');
        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, UserRepository $repository, $id, UploadServices $profile)
    {
        $user = $repository->find($id);
        $updateProfile = $profile->updateProfile($id, $request);
        $user = $repository->updateUser($updateProfile, $id, $request);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Usuário atualizado!', 'alert-danger', 'Oops! não foi possível atualizar!');

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    public function search(UserRequest $request, User $user)
    {
        $title = 'search';
        $dataForm = $request->all();
        dd($dataForm);
        $users = $user->search($dataForm);
        return view('user.index', compact(['users'], 'title'));
//        return redirect()->route('flock.index')->with(['animals']);
    }
}