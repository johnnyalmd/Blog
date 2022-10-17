<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conteudo;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ConteudoController extends Controller
{
    public function adicionarConteudo()
    {
        return view('blog.adicionarConteudo');
    }

    public function criarConteudo(Request $request)
    {
    $criarConteudo = $request->all();   
        if ($request->hasFile('file_path')) { 

            $request->validate([
                'file_path' => 'mimes:jpeg,bmp,png' 
            ]);
    
            $imageName = time().'.'.$request->file_path->extension();
            $request->file_path->move(public_path('imagens'), $imageName);
            $criarConteudo['file_path'] = $imageName;
            Conteudo::create($criarConteudo);
            }else{
                $criarConteudo = $request->all();
                Conteudo::create($criarConteudo);
            }
            return redirect('/menu/TodosConteudos');
    }

    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?: 6;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        if($buscar){
            $verTodos = DB::table('conteudo')->where('titulo', '=', $buscar)->orderBy('created_at', 'desc')->paginate($qtd);
        }else{
            $verTodos = DB::table('conteudo')->orderBy('created_at', 'desc')->paginate($qtd);
        }

        return view('admin.index', compact('verTodos'));
    }
    
}
