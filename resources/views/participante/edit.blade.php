@extends('layouts.app')
@section('content')
<div class="container">
  <br/>
<h2>Reservar : <small>{{ $celebracao->igreja }} -  {{ $celebracao->horario }} hr</small> </h2>
<hr/>


<form name="frmreserva" id="frmreserva" action="{{ url('participante')}}" method="POST">
    @csrf
  <div class="row">

    <input type="text" class="form-control" name="celebracao_id" id="celebracao_id"  value="{{  $celebracao->id}}">
    <div class="col-4">
      <label for="quantidade">Local Celebração</label>
      <input type="text" class="form-control" name="igreja" id="igreja" value="{{  $celebracao->igreja }}" readonly>
    </div>

    <div class="col-2">
      <label for="quantidade">Horário</label>
        <input type="text" class="form-control" name="horario" id="horario" value="{{  $celebracao->horario }}" readonly>
    </div>


    <div class="col-2">
      <label for="vagas">Quantidade de Lugares</label>
    <input type="text" class="form-control" name="vagas" id="vagas"  value="{{ '1'  }}" readonly>
    </div>

  <div class="col-4">
    <label for="local">Lugares Disponíveis </label>
     <select class="form-control" id="local" name="local">
      <option>Selecione o Assento</option>

           @for ($i = 1; $i <= $val; $i++)
           @foreach($ocupados as $ocupado)
           @if ($ocupado->local == $i)
            <option value="{{ $i }}">N.º: {{ $i }}x  </option>
            @else
            <option value="{{ $i }}">N.º: {{ $i }}  </option>
            @endif
            @endforeach
          @endfor
    </select>
  </div>
</div>
  <br/>
  <div class="row">
    <div class="col-3">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" >
    </div>

    <div class="col-4">
      <label for="sobrenome">Sobrenome</label>
        <input type="text" class="form-control" name="sobrenome" id="sobrenome" >
    </div>

    <div class="col-3">
      <label for="email">E-mail</label>
    <input type="text" class="form-control" name="email" id="email"  >
    </div>

    <div class="col-2">
      <label for="telefone">Telefone</label>
    <input type="text" class="form-control" name="telefone" id="telefone"  >
    </div>
  </div>
  <br/>
  <button type="submit" class="btn btn-primary">Reservar</button>

  </form>

  </div>
