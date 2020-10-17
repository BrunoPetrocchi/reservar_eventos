@extends('layouts.app')
@section('content')
<div class="container">
  <br/>
<h2>Editar de Celebração </h2>
<hr/>
  <form name="frmreserva" id="frmreserva" action="{{ route('reserva.update', $celebracao->id)}}" method="POST">
    @csrf
    @method('PUT')
  <div class="row">
    <div class="col-6">
        <label for="igreja">Data e Local Celebração</label>
        <input type="text" class="form-control" name="igreja" id="igreja" value="{{ $celebracao->igreja }}">
    </div>
   
    <div class="col-6">
        <label for="horario">Horário</label>
        <input type="text" class="form-control" name="horario" id="horario" value="{{ $celebracao->horario }}">
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <label for="quantidade">Quantidade de Lugares</label>
      <input type="number" class="form-control" name="quantidade" id="quantidade" value="{{ $celebracao->quantidade }}">
    </div>    
  </div>
  <br/>
  <button type="submit" class="btn btn-primary">Alterar</button>
  </form>

  </div>