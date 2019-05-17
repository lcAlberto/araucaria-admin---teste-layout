<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Base\Repository;
use Illuminate\Http\Request;
use App\services\UploadServices;
use App\Repositories\FlockRepository;
use App\Bull;
use App\Cow;

class FlockController extends Controller
{
    private $paginate = 10  ;

    public function index()
    {
        $title = 'Flock';
        $animals = Animal::paginate($this->paginate);
//        dd($animals);
        return view('animals.flock.index', ['animals' => $animals], compact('title'));
    }

    public function create(Animal $animal)
    {
        $title = 'Create new Animal';
        $animals = $animal->all();
        return view('animals.flock.create', compact('animals', 'title'));
    }

    public function store(
        Request $request, UploadServices $profile,
        FlockRepository $repository, Bull $bull, cow $cow)
    {
        $father = $request->father;
        $mother = $request->mother;
        $sexo = $request->sexo;

        $createProfile = $profile->createAnimalProfile($request);
        $animals = $repository->createAnimal($createProfile);

        $animals->save();
        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Animal cadastrado!', 'alert-danger', 'Oops! não foi possível cadastrar!');
        return redirect()->route('flock.index');
    }

    public function edit(FlockRepository $repository, $id)
    {
//        dd($id);
        $animals = $repository->find($id);

        return view('animals.flock.edit', compact('animals'));
    }

    public function update(Request $request, UploadServices $profile, FlockRepository $repository, $id)
    {
        $animal = $repository->find($id);
//        dd($request);
        $updateProfile = $profile->updateAnimalProfile($id, $request);//
        $animal = $repository->updateAnimal($updateProfile, $id);
        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Animal atualizado!', 'alert-danger', 'Oops! não foi possível atualizar!');

        return redirect()->route('flock.index');
    }

    public function show(FlockRepository $repository, $id)
    {
        $animal = $repository->find($id);
        return view('animals.flock.show', compact('animal', 'id'));
    }

    public function destroy(FlockRepository $repository, Request $request, $id)
    {
        $repository->delete($id);
        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Animal Removido!', 'alert-danger', 'Oops! não foi possível excluir!');

        return redirect()->route('flock.index');
    }

    public function search(Request $request, Animal $animal)
    {
        $title = 'search';
        $dataForm = $request->all();
        $animals = $animal->search($dataForm);
        return view('animals.flock.index', compact(['animals'], 'title'));
//        return redirect()->route('flock.index')->with(['animals']);
    }

}
