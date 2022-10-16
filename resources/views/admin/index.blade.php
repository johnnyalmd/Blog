@extends('admin.layout')
@section('content')
<form class=" row g-3 shadow-lg p-3  rounded mt-3 mb-4" enctype="multipart/form-data" method="post" action="/cadastrarConteudo">
        @csrf
        {{ method_field('POST') }}
            
            <h3 class="mb-3" style="text-align:center;">Criar conteudo</h3>

        <div class="col-md-12">
            <label f class="form-label">Titulo</label>
            <input type="text" class="form-control" required placeholder="Top 10 filmes de ação..." name="titulo">
        </div>

        <div class="col-md-12">
            <label for="" class="form-label">Tipo de conteudo:</label>
            <select required id="inputState" name="tipo_conteudo" class="form-select">
            <option >Principal</option>
            <option selected>Normal</option>
            </select>
        </div>

        <div class="col-md-12">
            <label for="formFile" class="form-label">Imagem de destaque:</label>
            <input  class="form-control"  type="file" multiple name="file_path">
        </div>



        <div class="form-floating">
        <textarea required class="form-control" placeholder="Resuma seu problema" id="floatingTextarea2" name="conteudo" style="height: 200px"></textarea>
        <label for="floatingTextarea2">Conteudo</label>
        </div>

        <div class="col-6" style="margin-top:50px;">
            <button type="button" href="{{ url()->previous() }}" class="button2">Voltar</button>
            <button type="submit" class="button1">Adicionar conteudo</button>    
        </div>

        </form>      
@endsection