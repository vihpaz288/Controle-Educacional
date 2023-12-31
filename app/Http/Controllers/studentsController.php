<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroAlunoFormRequest;
use App\Http\Requests\LoginAlunoFormRequest;
use App\Models\activities;
use App\Models\activities_responses;
use App\Models\disciplines;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class studentsController extends Controller
{
    public function create()
    {
        return view('aluno.cadastro');
    }
    public function store(CadastroAlunoFormRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        students::create($request->all());
        return redirect()->route('create.students')->with('msg', 'Aluno cadastrado com sucesso!');
    }
    public function login()
    {
        return view('aluno.login');
    }
    public function logar(LoginAlunoFormRequest $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credenciais['active'] = 1;

        if (Auth::guard('students')->attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->route('aluno.atividade');
        }
        return redirect()->back();
    }
    public function logout(Request $request)
    {
        Auth::guard('students')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.students');
    }
    public function atividade()
    {
        $materias = disciplines::get();
        return view('aluno.indexStudents', compact('materias'));
    }
    public function lista($id)
    {
        $respostasAluno = activities_responses::where('note', '!=', null)->where('student_id', Auth::guard('students')->user()->id)->get()->pluck('activity_id');
        $tarefas = activities::with(['discipline', 'atividadeRes'])->where('discipline_id', '=', $id)->whereNotIn('id', $respostasAluno)->get();
        return view('aluno.lista', compact('tarefas'));
    }
    public function respondida($id)
    {
        $listas = activities_responses::with('atividade', 'estudante')->whereRelation('atividade', 'discipline_id', '=', $id)->where('student_id', Auth::guard('students')->user()->id)->get();
        return view('aluno.respondida', compact('listas'));
    }

    public function update(Request $request, $id)
    {
        $update = students::find($id)->update($request->all());
        $response['msg'] = 'Atualizado com sucesso!';
        return response()->json($response, 200);
    }
    public function dados($id)
    {
        $dados = students::find($id);
        return view('aluno.dados', compact('dados'));
    }
    public function editarAluno($id)
    {
        $alunos = students::find($id);
        return view('aluno.editarAluno', compact('alunos'));
    }
    public function updateAluno(Request $request, $id)
    {
        $request['password'] = Hash::make($request->password);
        students::find($id)->update($request->all());
        return redirect()->route('aluno.atividade', $id);
    }
}
