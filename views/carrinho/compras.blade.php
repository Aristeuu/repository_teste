@extends('layouts.admin')

@section('content')

@can('est')

@include('layouts.menu')
     
  

               <div class="rows cursos py-3">
                   
 @forelse ($compras as $pedido)

@foreach ($pedido->pedido_cursos_itens as $pedido_curso)


         <div class="col-3">
                <div class="caixa">
            
                                   
                                    <img  class="card-img-top img-fluid" src="http://producao.yetoafrica.com/storage/app/public/{{ $pedido_curso->curso->curso_img }}" style="	max-width: 100%;	width: 360px; height: 260px; object-fit: cover;" alt="a" >
                                <div class="del-curso">
                                         <p class="card-text">{{$pedido_curso->curso->curso_nome}}</p>
                                       
                                        <div class="progress mg-b-20">
                                        <div class="progress-bar wd-35p"
                                        role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35</div>
                                        </div>
                                        <a href="/cursoestudante/{{$pedido_curso->curso->id}}" class="btn btn-teal btn-with-icon">
                                        <div class="ht-30">
                                            <span class="icon wd-20"><i class="fa fa-send"></i></span>
                                            <span class="pd-x-12">Ver</span>
                                          </div>
                                          </a>
                                        @if($pedido_curso->status=='PE')
                                            
                                            <a href="/pagamento/{{$pedido_curso->curso_id}}"  class="btn btn-info btn-with-icon">                                       
                                            <div class="ht-30">
                                            <span class="icon wd-20"><i class="fa fa-send"></i></span>
                                            <span class="pd-x-12">Pagar</span>
                                          </div></a>
                                            
                                       
                                        @endif
                                        </div>
                                
                       </div> 
                </div>
                
 @endforeach

                    @empty
                    @if ($cancelados->count() > 0)
                        Neste momento não há nenhuma compra valida.
                    @else
                    <div class="row">
                        <div class="col-md-6" style="text-align:center">
                            <p>Você ainda não fez nenhuma compra.</p><br><br>
                        </div>
                    </div>    
                     
                        @foreach($listaCursos as $curso)
                            
                       
                      <div class="col-3">
                         <div class="caixa">
                                           
                              <a href="/detalhes/{{base64_encode($curso->id)}}">   <img src="http://producao.yetoafrica.com/storage/app/public/{{$curso->curso_img}}" class="card-img-top img-fluid" style="max-width: 100%;	width: 360px; height: 260px; object-fit: cover;" alt="a" /></a>
                                        
                                   
                                        <div class="del-curso">
                                            <h5>
                                            {{$curso->curso_nome}}</h5>
                                            <h5 class="price-text-color">
                                            {{ number_format($curso->curso_preco, 2, ',', '.') }} AKZ</h5>
                                        </div>
                                            <form method="POST" action="{{ route('carrinho.adicionar') }}">
                                                    {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $curso->id }}">
                                                <p class="btn-add">
                                                <button class="btn col-12 btn-primary px-4 py-3 mt-3" data-position="bottom" data-delay="50" data-tooltip="O curso será adicionado ao seu carrinho"><i class="fa fa-shopping-cart"> </i> Adicionar</button>   
                                                </p>
                                             </form>
                                                
                                                    
                                           <p class="btn-details">
                                   <a href="/detalhes/{{base64_encode($curso->id)}}" class="btn col-12 btn-primary px-4 py-3 mt-3"> <i class="fa fa-eye"></i> Descrição</a></p>
                                       
                               
                               </div>
                               
                               
                            
                                
                             </div>
                            
                        @endforeach
                        
                       
                        
                    @endif
                    @endforelse


        
        
        
        
       </div> 
                                
@endcan


@endsection