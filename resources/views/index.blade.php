@extends('layouts.app')
@section('content')
   
<div class="container">

<h2> Celebrações </h2>
  <br/>
  @if(Auth::check())
  <a href="{{ route('reserva.create') }}">
<button type="button" class="btn btn-success">Nova Celebração</button>
  </a>     
  @endif
<hr/> 
    
    @foreach ($celebrar as $celebracaos)       
          <div class="card">
          <div class="card-header">
            Celebração
          </div>
          <div class="card-body">
            
            <blockquote class="blockquote mb-0">
            {{  $celebracaos->igreja  }}  <br/> Horário: {{ $celebracaos->horario }} <br/> 
             @foreach ($pessoa as $pessoas) 

                @if ( ($pessoas->celebracao_id ) == ($celebracaos->id ))      
                  @if(($pessoas->celeb) >= ($celebracaos->quantidade))
                    <strong style="color: red"> Vagas Preenchidas </strong> 
                      @else
                    Vagas: {{ $pessoas->celeb }} / {{ $celebracaos->quantidade }} 
                  @endif                    
                @endif    
              @endforeach
              
              <br/><br/>
           
              @if(Auth::check())
              <a href="{{ url('reserva.edit', $celebracaos->id)}}" class="btn btn-outline-primary">Editar</a>
              <a href="{{url('reserva/delete',['id'=>$celebracaos->id])}}">  
                <button type="button" class="btn btn-outline-danger">Exclui</button> 
              </a>
              <button type="button" class="btn btn-outline-secondary">Listar Fiéis</button>   
                @endif
                
                @if(Auth::guest())  
                {{ $celebracaos->pessid }}              
                @foreach ($pessoa as $pessoas)          
                @if ( ($pessoas->celebracao_id ) == ($celebracaos->id ))  
                  @if(($pessoas->celeb) >= ($celebracaos->quantidade) )
                      <a class="nav-link disabled" style="float: right;"disabled >Vagas Preenchidas</a>
                      @elseif ($celebracaos->pessid == null)
                      <a href="{{ route('participante.edit', $celebracaos->id)}}"
                        class="btn btn-outline-success" style="float: right;">Reservar Lugar</a>
                  @endif     
                @endif                        
                @endforeach
                @endif   
            </blockquote>
          </div>
        </div>  
    @endforeach
</div>
</div>  
@endsection