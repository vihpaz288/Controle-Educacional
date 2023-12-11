<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroAtividadeFormRequest;
use App\Models\activities;
use App\Models\disciplines;
use App\Models\activities_responses;

class activitiesController extends Controller
{
    public function create($id)
    {
        $discipline = disciplines::find($id);
        return view('disciplina.atividade', compact('discipline'));
    }
    public function store(CadastroAtividadeFormRequest $request, $id)
    {
        if ($request->file("filepath") == null) {
            $request->merge([
                'teatcher_id' => auth()->user()->id,
                'discipline_id' => $id,
            ]); 
        }
        elseif($request->file("filepath") != null){
            $request->merge([
                'filepath' => $request->file("filepath")->store('arquivo', 'public'),
                'teatcher_id' => auth()->user()->id,
                'discipline_id' => $id,
            ]);    
        }
        $request['discipline_id'] = $id;
        $atividade = activities::create($request->all());
        return redirect()->route('index')->with('msg', 'Atividade criada com sucesso!');
    }

    public function lista()
    {
        $listas = activities_responses::get();
        return view('professor.lista', compact('listas'));
    }

    public function ativi($id)
    {
        $ativis = activities::with('discipline')->where('discipline_id', '=', $id)->get();
        return view('professor.atividade', compact('ativis'));
    }
}
