@extends('layouts.admin')

@section('content')

		@include('layouts.menu')
	    
	    <div class=" br-pagebody">
       <cursoss v-bind:titulos="['']"

      v-bind:itens="{{json_encode($listMeuscursos)}}"

      ver="formaform/"
      modal="modal"
      editar="update/"

       ></cursoss>
	       <modal nome="editar" titulo="Editar Curso">
          <formulario id="formEditar" action="{{ url('/update/.',  )}}" method="post" enctype="multipart/form-data" token="{{ csrf_token() }}">  
            {{ csrf_field() }}       

              <input type="text" name="" id="" v-model="$store.state.item.id">
              <div class="row">
                  <div class="col col-md-6">
                    <div class="form-group">
                      <label>Curso:</label>      
                    <input type="text" name="curso_nome" class="form-control has-feedback-left" v-model="$store.state.item.curso_nome">
                  </div>
                  </div> 
                  <div class="col col-md-6">
                    <div class="form-group">
                     <label>Preço:</label> 
                   <input type="text" class="form-control has-feedback-left" name="curso_preco" v-model="$store.state.item.curso_preco">
                    </div>
                  </div>
              </div>              
            
            <div class="row">
              <div class="col col-md-6">
                <div class="form-group">
                    <label for="titulo" class="control-label">Categoria</label>
                    <select  name="categoria_id" class="form-control">
                      @foreach($listaCategoria as $lista)
                      <option value="{{$lista->id}}">{{$lista->cat_nome}}</option>
                     @endforeach	
                              
                    </select>
            
                 </div>  
              </div>
              <div class="col col-md-4">
                <div class="form-group">
                  <label>Duração: </label>
                <input type="text" name="curso_duracao" class="form-control has-feedback-left" v-model="$store.state.item.curso_duracao">
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-8">
                <div class="form-group">
                  <label>Video Promo: </label>
                     <input type="text" name="curso_link" class="form-control has-feedback-left" v-model="$store.state.item.curso_link">                 
                </div>
              </div>                       
              
            </div>  
            <div class="row">
              <div class="col col-md-12">
                  <div class="form-group">
                    <label>Descrição</label>
                        <input type="text" v-model="$store.state.item.curso_descricao">                        
                        <ckeditor  name="curso_descricao"  id="curso_desci"  v-bind:config="{
                          toolbar: [
                            [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                          ],
                          height: 200
                        }" v-model="$store.state.item.curso_descricao"></ckeditor>
                  </div>
              </div>
            </div>

              <div class="row">
                <div class="col col-md-12 c-edit">
                        <div class="form-group">
                            <label for="specialidade" class="control-label">Fotografia: </label> 
                            <input type="file" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Design" id="curso_img" name="curso_img" v-model="$store.state.item.curso_img">
                          
                        </div>
                </div>
            
               
              </div>         
        </formulario>  
          <span slot="botoes">
            <input form="formEditar" type="submit" value="Enviar" class="btn btn-info" name="Cadatrar">            
          </span>

           </modal> 

          <p>@{{$store.state.item.id}}</p>
		<div class="row">
		     @foreach ($listMeuscursos as $curso)
		    
		    <div class="col-md-3">
		        <div class="card bd-0">
		            <a href=""><img class="card-img-top img-fluid" src="http://localhost/yetoafrica/storage/app/public/{{$curso->curso_img}}" alt="Image"></a>
		        </div>
		        <div class="card-body rounded-bottom bg-succ">
                  <h5 class="card-text tx-white text-center">{{$curso->curso_nome}}</h5>
                     
                  <div class="butttos text-center">
                      <form action="" method="post">     
                                            <input type="hidden"   name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="token"> 
                                                    
                                                <a href="/formaform/{{base64_encode($curso->id)}}"class="btn btn-info btn-with-icon">
                                                      <div class="ht-30">
                                                        <span class="icon wd-20"><i class="fa fa-eye"></i></span>
                                                        <span class="pd-x-15">Ver</span>
                                                      </div>
                                                    </a>
                                               <a href="/editar/{{base64_encode($curso->id)}}" class="btn btn-teal btn-with-icon"> 
                                                 <div class="ht-30">
                                                        <span class="icon wd-20"><i class="fa fa-edit"></i></span>
                                                        <span class="pd-x-15">Editar</span>
                                                      </div>
                                                      </a>
                                                    <modal_link nome="editar" titulo="Editar" tipo="button" item="item"></modal_link>       
                                               <a href="/deletar/{{$curso->id}}"  class="btn btn-danger btn-with-icon">
                                                   <div class="ht-30">
                                                        <span class="icon wd-20"><i class="fa fa-trash-alt"></i></span>
                                                        <span class="pd-x-12">Apagar</span>
                                                      </div></a>
                                            </form>
                  </div>
                     @if($curso->curso_status==0)
                        Em Análise
                     @endif
                </div>
                
		    </div>
		    
	
           
            
            
                @endforeach
          </div><!-- row -->
          <modal nome="editar">
            @{{$store.state.item.curso_nome}}
          </modal>
          
         </div>  
   

@endsection
