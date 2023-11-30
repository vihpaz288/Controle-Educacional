<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaFormRequest;
use App\Http\Requests\RespostaFormRequest;
use App\Models\activities;
use App\Models\activities_responses;
use App\Models\disciplines;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class activities_responsesController extends Controller
{
    public function create($id)
    {
        
        $atividade = activities::find($id);
        $aluno = students::find($id);
        return view('aluno.responde', compact('atividade', 'aluno'));
    }
    public function store($id, RespostaFormRequest $request)
    {
        $userId = Auth::guard('students')->user()->id;
        $envioAnterior = activities_responses::where('student_id', $userId)
            ->where('activity_id', $id)
            ->first();
        if ($envioAnterior) {
            return redirect()->back()->with('msg', 'Você pode responder apenas uma vez!');
        }

        $path = $request->file("filepath")->store('arquivos', 'public');
        $atividadeRes = activities_responses::create([
            'activity_id' => $id,
            'student_id' => Auth::guard('students')->user()->id,
            'check' => $request->check,
            'note' => $request->note,
            'description' => $request->description,
            'filepath' => $path,
        ]);
        return redirect()->route('aluno.responde', $id)->with('msg', 'Atividade respondida com successo!');
    }
    public function editNota( $id)
    {
        $nota = activities_responses::where('activity_id', '=', $id)->first();
        return view('professor.edit', compact('nota'));
    }
    public function update(NotaFormRequest $request, $id)
    {
        activities_responses::where('activity_id', '=', $id)->first()->update($request->all());
        return redirect()->route('edit.nota', $id)->with('msg', 'Nota enviada com sucesso!');
    }

    public function lista($id)
    {
        $listas = activities_responses::with('atividade', 'estudante')->whereRelation('atividade', 'discipline_id', '=', $id)->get();
        return view('professor.lista', compact('listas'));
    }
}
