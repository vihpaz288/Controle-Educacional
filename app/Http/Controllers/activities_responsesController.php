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
            return redirect()->route('aluno.edit', $envioAnterior->id);
        }

        if ($request->file("filepath") == null) {
            $request->merge([
                'student_id' => Auth::guard('students')->user()->id,
                'activity_id' => $id,
            ]); 
        }
        elseif($request->file("filepath") != null){
            $request->merge([
                'filepath' => $request->file("filepath")->store('arquivo', 'public'),
                'student_id' => Auth::guard('students')->user()->id,
                'activity_id' => $id,
            ]);    
        }
        
        // $path = $request->file("filepath")->store('arquivos', 'public');
        $atividadeRes = activities_responses::create($request->all());
        return redirect()->route('aluno.responde', $id)->with('msg', 'Atividade respondida com successo!');
    }

    public function editRes($id)
    {
        $atividade = activities_responses::find($id);
        // dd($atividade);
        return view('aluno.edit', compact('atividade'));

    }
    public function updateRes(Request $request, $id)
    {
        // dd($request->all());
        if($request->file("filepath") != null){
            $request->merge([
                'filepath' => $request->file("filepath")->store('arquivo', 'public'),
            ]);    
        }
        $atividadeRes = activities_responses::find($id)->update($request->all());
        
        return redirect()->route('aluno.atividade', $id)->with('msg', 'Atividade atualizada com sucesso!');

    }
    public function editNota( $id)
    {
        $nota = activities_responses::find($id);
        return view('professor.edit', compact('nota'));
    }
    public function update(NotaFormRequest $request, $id)
    {
         
        activities_responses::find($id)->update($request->all());
        return redirect()->route('edit.nota', $id)->with('msg', 'Nota enviada com sucesso!');
    }

    public function lista($id)
    {
        $listas = activities_responses::with('atividade', 'estudante')->whereRelation('atividade', 'discipline_id', '=', $id)->get();
        return view('professor.lista', compact('listas'));
    }
}
