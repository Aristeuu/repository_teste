@extends('layouts.admin')
@section('content')

		@include('layouts.menu')
		<div class="tab-content br-profile-body">
            <div class="tab-pane fade active show" id="posts">
                
                <div class="row">
                    <div class="col-lg-12">
                     <div class="media-list bg-white rounded shadow-base">
                         <div class="row">
                      <table class="table table-striped">
	                             <thead>
                                    <tr>
                                    <th>Curso</th>
                                    <th>Preço</th>
                                    <th>Data</th>
                                   
                                     </tr>
                                       </thead>
                                 <tbody>
                                       
                                    
                                    @foreach ($listCursos as $cursos) 
                                             <tr>
                                                                                                                    
                                            <td>{{$cursos->curso_nome}}</td>
                                            <td>{{$cursos->curso_preco}} kz</td>
                                            <td>{{$cursos->curso_data}}</td>
                                              </tr>
                                    @endforeach
                                   
                                              </tbody>
                                            
                                   
                                    
                                                          
                                            </table>
                                        </div>    
                                             
                                             @endsection
                                </div> 
                            </div>    
                            </div>   
                            
                    
            </div>
        </div>    
	
                        
                           
