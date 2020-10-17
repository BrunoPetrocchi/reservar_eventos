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
    
    @foreach ($celebracao as $celebracaos)       
      
   
   
        <div class="card">
          <div class="card-header">
            Celebração
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              {{ $celebracaos->igreja }}  <br/> Horário: {{ $celebracaos->horario }} <br/> 

              @foreach ($pessoa as $pessoas)    
              
              
              @if ($pessoas->celebracao_id == $celebracaos->id)
                  {{ $pessoas->count }} == {{ $celebracaos->id}} <br/>                   
              @endif
                    
                
              @endforeach
            
                  <!-- <strong style="color: red"> Lotado</strong> -->
                    Vagas:  / {{ $celebracaos->quantidade }} 

              <br/><br/>
              @if(Auth::check())
              <a href="{{ route('reserva.edit', $celebracaos->id)}}" class="btn btn-outline-primary">Editar</a>
              <a href="{{url('reserva/delete',['id'=>$celebracaos->id])}}">  
                <button type="button" class="btn btn-outline-danger">Exclui</button> 
              </a>
              <button type="button" class="btn btn-outline-secondary">Listar Fiéis</button>   
                @endif
              @if(Auth::guest())
              <!--
                <a class="nav-link disabled" style="float: right;"disabled >Vagas Preenchidas</a>
              -->
              <a href="{{ route('participante.edit', $celebracaos->id)}}" class="btn btn-outline-success" style="float: right;">Reservar Lugar</a>
                
             
             @endif
            </blockquote>
          </div>
        </div>  
    @endforeach
</div>
@endsection