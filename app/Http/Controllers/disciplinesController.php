<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroDiscFormRequest;
use App\Models\disciplines;

class disciplinesController extends Controller
{
    public function create()
    {
        return view('disciplina.create');
    }
    public function store(CadastroDiscFormRequest $request)
    {
        $disciplina = disciplines::create($request->all());
        return redirect()->route('create.disciplines')->with('msg', 'Disciplina cadastrada com sucesso!');
    }
    public function index()
    {
        $disciplinas = disciplines::get();
        return view('professor.indexTeacher', compact('disciplinas'));
    }
}
