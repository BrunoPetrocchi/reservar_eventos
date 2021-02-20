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
            Celebração >>> {{ $val_celebs->celeb_id }}
          </div>
          <div class="card-body">

            <blockquote class="mb-0 blockquote">
          {{--   <?php
            echo '<pre>';   print_r ($val_celebs);     echo '</pre>';
          ?>  --}}
          <p>
          <strong>Dia e Local: </strong> {{ $val_celebs->celeb_igreja }}
          </p>
          <p>
            <strong>Horário: </strong> {{ $val_celebs->celeb_horario }}

          </p>

          @foreach ($pessoa as $pessoas)

          @if ( ($pessoas->celebracao_id ) == ($val_celebs->celeb_id ))
                  @if(($pessoas->celeb) >= ($val_celebs->celeb_quantidade))
                    <strong style="color: red"> Vagas Preenchidas </strong>
                      @else
                   <strong> Vagas: </strong>{{ $pessoas->celeb }} / {{ $val_celebs->celeb_quantidade }}
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


               @if ($val_celebs->pess_id == null)
               <a href="{{ route('participante.edit', $val_celebs->celeb_id)}}"
                class="btn btn-outline-success" style="float: right;">Reservar Lugar</a>
               @endif
                @foreach ($pessoa as $pessoas)
                @if($pessoas->celebracao_id == $val_celebs->celeb_id)
                  @if($pessoas->celeb >= $val_celebs->celeb_quantidade)
                    <a class="nav-link disabled" style="float: right;"disabled >Vagas Preenchidas</a>
                  @else
                    <a href="{{ route('participante.edit', $val_celebs->celeb_id)}}"
                    class="btn btn-outline-success" style="float: right;">Reservar Lugar</a>
                  @endif
                @endif
                @endforeach

            </blockquote>
          </div>
        </div>
    @endforeach
</div>
</div>
@endsection

{{-- <a href="{{ route('participante.edit', $val_celebs->celeb_id)}}"
  class="btn btn-outline-success" style="float: right;">Reservar Lugar</a>
  <a class="nav-link disabled" style="float: right;"disabled >Vagas Preenchidas</a>    --}}
