<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function index()
    {
        $usuarios = User::orderBy('name')->paginate(15);
        return view('usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        $tipos = ['Aluno','Administrador','Funcionario', 'Professor'];
        $niveis = ['Aluno','Administrador', 'Básico', 'Consultas','Coordenador(a)', 'Digitador(a)', 'Orientador(a)'];

        return view('usuarios.create',compact('niveis','tipos'));
    }

    public function store(UserRequest $request)
    {
        $tipos = ['Aluno','Administrador','Funcionario', 'Professor'];
        $niveis = ['Aluno','Administrador', 'Básico', 'Consultas','Coordenador(a)', 'Digitador(a)', 'Orientador(a)'];

        $request->validated();

        $file = $request->file('foto');
        $file->store('fotos','public');
        $data['foto']= $file->hashName();

        $user = new User();
        $user->codigo = $request->get('codigo');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->access_level = $request->get('access_level');
        $user->tipo = $request->get('tipo');
        $user->password = $request->get('password');
        $user->foto = $data['foto']= 'storage/fotos/' . $file->hashName();

        $user->save();
        session()->flash('success','Usuário gravado com sucesso');
        return redirect()->back();
    }

    public function destroy($usuario)
    {
        $data = User::find($usuario);
        $image_path = public_path($data->foto);

        if(file_exists($image_path))
        {
            unlink($data->foto);
            Storage::disk()->delete($data->foto);

        }

        User::findOrFail($usuario)->delete();

        return redirect()-> route('listar.usuarios')-> with('sucesso', 'Usuário excluído com sucesso');
    }

    public function edit($usuario)
    {
        $usuarioAlterar = User::find($usuario);

        $tipos = ['Aluno','Administrador','Funcionario', 'Professor'];
        $niveis = ['Aluno','Administrador', 'Básico', 'Consultas','Coordenador(a)', 'Digitador(a)', 'Orientador(a)'];

        return view('usuarios.edit', compact('tipos','niveis','usuarioAlterar'));
    }
}

