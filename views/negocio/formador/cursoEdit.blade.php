@extends('layouts.admin')

@section('content')


@include('layouts.menu')
      <div class="editar-cursos container">
          <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center shadow-base card-editar">
           
        <h2 class="titulo"><span class="case"><i class="fa fa-edit"></i>Editando o </span>{{$listaCurso->curso_nome}}</h2>
      </div>
      
      
      <form css="" action="{{ url('/update/.', base64_encode($listaCurso->id))}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
            {{ csrf_field() }}
            
            <div class="row">
            <div class="col col-md-12 c-edit">
                    <div class="form-group">
                        <label for="specialidade" class="control-label">Fotografia: </label> 
                        <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="curso_img" name="curso_img" value="teste">
                       
                    </div>
            </div>
        
           
            </div> 
            <div class="row">
          
           
                <div class="col col-md-6">
                    <div class="form-group">
                        <label for="name" class="control-label">Curso: </label> 
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Informática" name="curso_nome"  required value="{{$listaCurso->curso_nome}}">
                    
                    </div>
                </div>
                        
                <div class="col col-md-3">
                    <div class="form-group">
                        <label for="titulo" class="control-label">Categoria</label>
                        <select  name="categoria_id" class="form-control">
                        
                        @foreach($listaCategorias as $lista)
                         <option value="{{$lista->id}}">{{$lista->cat_nome}}</option>
                        @endforeach						
                        </select>
                
                </div>  
                </div>

                <div class="col col-md-3">
                    <div class="form-group">
                        <label for="name" class="control-label">Preço: </label> 
                        <input type="float" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Preço" name="curso_preco"  required value="{{$listaCurso->curso_preco}}">
                    
                    </div>
                </div>
        
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group">
                        <label for="name" class="control-label">Vídeo</label> 
                        <input type="float" class="form-control has-feedback-left" id="inputSuccess2" placeholder="link do Vídeo" name="curso_link"  required value="{{$listaCurso->curso_link}}">
                    
                    </div>
                </div>                
        
                <div class="col col-md-2">
                    <div class="form-group">
                        <label for="specialidade" class="control-label">Duração: </label> 
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="2 meses" id="curso_duracao" name="curso_duracao"  value="{{$listaCurso->curso_duracao}}">
                       
                    </div>
            </div> 
                </div>
           
            
              
    <div class="row">
     <div class="col col-lg-12">
            <div class="form-group"> 
                <label for="email" class="control-label">descricao</label>
                <ckeditor  name="curso_descricao"  id="curso_desci"  v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }"></ckeditor>
    
            </div>
        </div>
        <!--
        <div class="col col-md-6">
            <div class="form-group">
                <label for="specialidade" class="control-label">Adicionar video </label> 
                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Link do Vídeo" id="curso_link" name="curso_link"  >
               
            </div>
        </div>
    -->
     </div>
            <div class="row">
          
            <div class="col-lg-12">
            <input type="submit" value="Enviar" class="btn btn-info" name="Cadatrar">
            </div>
            </div>
            
        </form>
        <!--//////////////////////////////////Inicio//////////////////////////////////////////-->
      </div>





@endsection
