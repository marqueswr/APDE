<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function index()
    {
        $usuarios = User::orderBy('name')->paginate(12);
        return view('usuarios.index',compact('usuarios'));
    }

    public function pesquisarPorNome(Request $request)
    {
        $parametro = $request->parametro;
        $usuarios = User::where('name', 'like','%' . $request->parametro . '%')->orderBy('name')->paginate(12);
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
        try{


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
    catch(Exception $e)
    {
        session()->flash('error','Copie esse erro e envie para o desenvolvedor' .$e);
        return redirect()->back();
    }
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


   /*  public function excluirFoto($id)
    {
        //excluir a foto
        $data = User::find($id);
        $image_path = public_path($data->foto);

        if(file_exists($image_path))
        {
            unlink($data->foto);
            Storage::disk()->delete($data->foto);
        }

        //inserir nova foto no local da excluida e atualizar o caminho no banco
        try
        {
        $file = $data->file('foto');
        $file->store('fotos','public');
        $caminho['foto']= $file->hashName();

        $data->update([
        $data->foto = $caminho['foto']= 'storage/fotos/' . $file->hashName()]);

        session()->flash('success','Foto do usuário atualizada com sucesso');
    }
    catch(Exception $e)
    {
        session()->flash('error','Copie esse erro e envie para o desenvolvedor' .$e);
    }
    return redirect()->back();
        // return redirect()-> route('trocarFoto.usuario',compact('data'))-> with('sucesso', 'Foto do usuário excluída');
    } */

    public function excluirFoto($id)
    {
        $usuario = User::find($id);

        return view('usuarios.excluirfoto',compact('usuario'));
    }

    public function trocarFoto(Request $request, $id)
    {

         //excluir a foto
         $data = User::find($id);

         $image_path = public_path($data->foto);

         if(file_exists($image_path))
         {
             unlink($data->foto);
             Storage::disk()->delete($data->foto);
         }

         //inserir nova foto no local da excluida e atualizar o caminho no banco
         try
         {
         $file = $request->file('foto');
    
         $file->store('fotos','public');
         $caminho['foto']= $file->hashName();



         $data->update([
         $data->foto = $caminho['foto']= 'storage/fotos/' . $file->hashName()]);

         session()->flash('success','Foto do usuário atualizada com sucesso');
     }
     catch(Exception $e)
     {
         session()->flash('error','Copie esse erro e envie para o desenvolvedor' .$e);
     }
     return redirect()->back();

        // return view('usuarios.excluirfoto',compact('id'));
    }

    public function edit($usuario)
    {
        $usuario = User::find($usuario);

        $tipos = ['Aluno','Administrador','Funcionario', 'Professor'];
        $niveis = ['Aluno','Administrador', 'Básico', 'Consultas','Coordenador(a)', 'Digitador(a)', 'Orientador(a)'];

        return view('usuarios.edit', compact('tipos','niveis','usuario'));
    }

    public function show($id)
    {
        $usuario=User::find($id);
        return view('usuarios.show',compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        try {
            $usuario->update([
                'codigo' => $request->codigo,
                'name' => $request->name,
                'email' => $request->email,
                'tipo' => $request ->tipo,
                'access_level' => $request->access_level,
                // 'foto' => $usuario->foto,
                // 'password' =>  $usuario->senha,
                // 'password' =>   Hash::make('idiota'),
            ]);

            session()->flash('success','Usuário alterado com sucesso');
            return redirect()->route('listar.usuarios');

        } catch (Exception $e) {
            session()->flash('error','Usuário não foi alterado' . $e);
            return back()->withInput();
        }
    }

    public function formAlterarSenha( $id)
    {
        return view('usuarios.alterarsenha',compact('id'));
    }

    public function formAlterarSenhaSelf()
    {
        return view('usuarios.alterarsenhaself');
    }


    public function alterarSenha(Request $request)
    {
        $id = Auth()->id();

        $usuario = User::find($id);

        try {
            if($request->password === $request->newpassword)
            {
                $usuario->update([
                    'password' => Hash::make($request->password)
                ]);

                session()->flash('success','Senha do usuário alterada com sucesso');
                return redirect()->route('listar.usuarios');
            }
            else
            {
                session()->flash('warning','As senhas digitadas não conferem. Tente novamente');
                return back()->withInput();
            }

    }
    catch(Exception $e)
    {
        session()->flash('error','A senha não foi alterada' . $e);
    }
        return view('usuarios.alterarsenha',compact('id'));
    }

    public function alterarSenhaSelf(Request $request)
    {
        $id = Auth()->id();
        $usuario = User::find($id);

        try {
            if($request->password === $request->newpassword)
            {
                $usuario->update([
                    'password' => Hash::make($request->password)
                ]);

                session()->flash('success','Senha do usuário alterada com sucesso');
                return redirect()->route('listar.usuarios');
            }
            else
            {
                session()->flash('warning','As senhas digitadas não conferem. Tente novamente');
                return back()->withInput();
            }

    }
    catch(Exception $e)
    {
        session()->flash('error','A senha não foi alterada' . $e);
    }
        return view('usuarios.alterarsenhaself');
    }
}

