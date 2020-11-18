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
    @foreach ($val_celeb as $val_celebs)       
          <div class="card">
          <div class="card-header">
            Celebração
          </div>
          <div class="card-body">
            
            <blockquote class="blockquote mb-0">
            {{  $val_celebs->celeb_igreja  }}  <br/> Horário: {{ $val_celebs->celeb_horario }} <br/> 
            {{-- <?php
            echo '<pre>';
            print_r ($pessoa);
            echo '</pre>';
          ?>  --}}
             @foreach ($pessoa as $pessoas) 
                @if ( ($pessoas->celebracao_id ) == ($val_celebs->celeb_id ))      
                  @if(($pessoas->celeb) >= ($val_celebs->celeb_quantidade))
                    <strong style="color: red"> Vagas Preenchidas </strong> 
                      @else
                    Vagas: {{ $pessoas->celeb }} / {{ $val_celebs->celeb_quantidade }} 
                  @endif                    
                @endif    
              @endforeach 
              
              <br/><br/>
           
              @if(Auth::check())
              <a href="{{ route('reserva.edit', $val_celebs->celeb_id)}}" class="btn btn-outline-primary">Editar</a>
              <a href="{{ url('reserva/delete',['id'=>$val_celebs->celeb_id])}}">  
                <button type="button" class="btn btn-outline-danger">Exclui</button> 
              </a>
              <button type="button" class="btn btn-outline-secondary">Listar Fiéis</button>   
              @endif
            {{-- <?php
              echo '<pre>';
               print_r ($val_celebs);
              echo '</pre>';
            ?>         --}}
            @foreach ($pessoa as $pessoas)
             
            @endforeach
            </blockquote>
          </div>
        </div>  
    @endforeach
</div>
</div>  
@endsection