<?php

namespace App\services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlockController;
use App\Bull;


use App\User;

class UploadServices
{
    /* IMAGENS do usuario */
    public function createProfile($request)
    {
        $profile = $request->file('profile');
        $profileName = $request->name;
        request()->profile->move(public_path('profiles'), $profileName);
        $data = $request->all();
        $data['profile'] = $profileName;

        return $data;
    }

    public function updateProfile($id, $request)
    {
        $profile = $request->file('profile');
        $profileName = $request->name;
        request()->profile->move(public_path('profiles'), $profileName);
        $data = $request->all();
        $data['profile'] = $profileName;

        return $data;
    }


    public function createAnimalProfile(Request $request)
    {
        $profile = $request->file('profile');
        $profileName = time() . '-' . request()->profile->getClientOriginalName();
        request()->profile->move(public_path('animals'), $profileName);

        $data = $request->all();
        $data['profile'] = $profileName;


        return $data;
    }

    public function updateAnimalProfile($id, $request)
    {
        $profile = $request->file('profile');
//        $animalName = $request->name;

        $profileName = time() . '-' . request()->profile->getClientOriginalName();
//        $thumbnailName = time() . '-' . request()->thumbnail->getClientOriginalName();
        request()->profile->move(public_path('animals'), $profileName);

        $data = $request->all();
        $data['profile'] = $profileName;

        return $data;
    }
    /*
     $profile = $request->file('profile');
		$profileName = time() . '-' . request()->profile->getClientOriginalName();
		request()->profile->move(public_path('profiles'), $profileName);

		$data = $request->all();
		$data['profile'] = $profileName;

		return $data;
    */
}