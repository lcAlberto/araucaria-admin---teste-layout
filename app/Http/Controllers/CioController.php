<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cio;
use App\Cow;
use App\Bull;
use App\Animal;


class CioController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $title = 'Cio';
        $cios = Cio::paginate($this->paginate);
        return view('animals.flock.cios.index', ['cios' => $cios], compact('title'));
    }

    public function create(Cio $cio)
    {
        $title = 'Create new Animal';
        $animals = $cio->all();
        return view('animals.flock.create', compact('cio', 'title'));
    }
}
