<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroProfFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Models\students;
use App\Models\teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class teachersController extends Controller
{
    public function create()
    {
        return view('professor.teacher');
    }
    public function store(CadastroProfFormRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        teachers::create($request->all());
        return view('professor.login');
    }
    public function login()
    {
        return view('professor.login');
    }
    public function logar(LoginFormRequest $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth::guard('web')->attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não existe'
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.teachers');
    }
    public function listagem()
    {
        $alunos = students::get();
        return view('professor.listagem', compact('alunos'));
    }
}
