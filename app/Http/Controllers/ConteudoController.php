<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conteudo;

class ConteudoController extends Controller
{
    public function adicionarConteudo()
    {
        return view('blog.adicionarConteudo');
    }

    public function indexAdmin()
    {
        return view('admin.index');
    }

    public function criarConteudo(Request $request)
    {
    $criarConteudo = $request->all();
     //dd($criarConteudo);   

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
            return view('admin.index');
    }
    
}
